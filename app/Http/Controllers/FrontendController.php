<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
use  Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\BillingDetail;
use App\Models\ShippingDetail;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\PaymentIntent;

class FrontendController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('frontend.index', compact('categories'));
    }
    public function shop()
    {
        $products = Product::all();
        return view('frontend.shop', compact('products'));
    }
    public function details($id)
    {
        $product = Product::findOrFail($id);
        $tags = Tag::all();
        $reviews = $product->reviews()->where('status', 'approved')->get();

        return view('frontend.shop-details', compact('product', 'tags', 'reviews'));
    }

    public function cart()
    {
        // 1. Session se cart nikal raha hai
        $cart = session()->get('cart', []);
        // dd($cart);

        // 2. Subtotal calculate karne ke liye variable banaya
        $subtotal = 0;

        // 3. Cart ke andar jitne bhi products hain unke price × quantity ka total banaya
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        //   dd(session()->get('cart'));
        return view('frontend.cart', compact('cart', 'subtotal'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
            ];
        }

        session()->put('cart', $cart);


        return redirect()->route('frontend.cart')->with('success', 'Product added to cart!');
    }

    // app/Http/Controllers/FrontendController.php
    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // Agar request me quantity directly aayi hai to usko set karo
            if ($request->has('quantity')) {
                $cart[$id]['quantity'] = max(1, (int) $request->quantity);
            } else {
                // Agar old action wala system use ho raha ho
                if ($request->action == "increase") {
                    $cart[$id]['quantity']++;
                } elseif ($request->action == "decrease" && $cart[$id]['quantity'] > 1) {
                    $cart[$id]['quantity']--;
                }
            }
        }

        session()->put('cart', $cart);

        // Subtotal calculate
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        // Coupon discount (agar apply hua hai)
        $couponDiscount = session('coupon.discount') ?? 0;

        // Shipping method check karo
        $shippingMethod = session('shipping_method') ?? 'flat_rate';
        $shippingCost = $shippingMethod === 'flat_rate' ? 10 : 0;

        // Order total
        $orderTotal = $subtotal - $couponDiscount + $shippingCost;

        return response()->json([
            'success'         => true,
            'quantity'        => $cart[$id]['quantity'],
            'item_total'      => number_format($cart[$id]['price'] * $cart[$id]['quantity'], 2),
            'subtotal'        => number_format($subtotal, 2),
            'coupon_discount' => number_format($couponDiscount, 2),
            'shipping_cost'   => number_format($shippingCost, 2),
            'order_total'     => number_format($orderTotal, 2),
        ]);
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('frontend.cart')->with('success', 'Product removed from cart!');
    }



    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string'
        ]);

        $code = strtoupper(trim($request->coupon_code)); // Clean the input

        $coupon = Coupon::whereRaw('UPPER(code) = ?', [$code])
            ->where('status', 'active')
            ->whereDate('expires_at', '>=', now())
            ->first();

        if (!$coupon) {
            return back()->with('error', 'Invalid or expired coupon.');
        }

        // Example: check minimum cart amount
        $cart = session('cart', []);
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        if ($coupon->minimum_cart_amount && $subtotal < $coupon->minimum_cart_amount) {
            return back()->with('error', 'Minimum cart amount should be $' . $coupon->minimum_cart_amount);
        }

        // Save coupon in session
        session()->put('coupon', [
            'code' => $coupon->code,
            'discount' => $coupon->discount,
            'discount_type' => $coupon->discount_type,
        ]);

        return back()->with('success', 'Coupon applied successfully!');
    }


    public function store(Request $request)
    {
        // 🔹 Validate billing
        $validator = Validator::make($request->all(), [
            'country' => 'required|string|max:2',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'company_name' => 'nullable|string|max:255',
            'street_address' => 'required|string|max:255',
            'apartment_suite_unit' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'postcode_zip' => 'required|string|max:20',
            'email_address' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'payment_method' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // 🔹 Save billing
        $billing = BillingDetail::create($validator->validated());

        // 🔹 Save shipping (agar ticked hai)
        if ($request->has('ship_to_different_address')) {
            ShippingDetail::create([
                'order_id' => $billing->id,
                'first_name' => $request->shipping_first_name,
                'last_name' => $request->shipping_last_name,
                'company_name' => $request->shipping_company_name,
                'street_address' => $request->shipping_street_address,
                'apartment_suite_unit' => $request->shipping_apartment_suite_unit,
                'city' => $request->shipping_city,
                'country' => $request->shipping_country,
                'postcode_zip' => $request->shipping_postcode_zip,
                'email_address' => $request->shipping_email_address,
                'phone_number' => $request->shipping_phone_number,
            ]);
        }

        // 🔹 Agar Stripe select hai
        if ($request->payment_method === 'stripe') {
            Stripe::setApiKey(config('services.stripe.secret'));

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Order #' . $billing->id,
                        ],
                        'unit_amount' => 5000, // yahan amount cents me aayega (ex: $50 = 5000)
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('stripe.cancel'),
            ]);

            // ✅ Redirect Stripe hosted checkout page par
            // return redirect($session->url);
        }

        // 🔹 Agar PayPal ya dusra method hai
        return back()->with('success', 'Billing & Shipping details submitted successfully.');
    }

   public function createPaymentIntent(Request $request) 
{
    Stripe::setApiKey(config('services.stripe.secret')); // ✅ secret key (sk_test)

    $amount = $request->amount; // frontend se aya hua cents me amount

    $paymentIntent = PaymentIntent::create([
        'amount' => $amount,
        'currency' => 'usd',
        'automatic_payment_methods' => ['enabled' => true],
    ]);

    return response()->json([
        'clientSecret' => $paymentIntent->client_secret
    ]);
}

}

