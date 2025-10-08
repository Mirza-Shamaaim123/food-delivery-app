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
use App\Models\Order;
use App\Models\ShippingDetail;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Checkout\Session;
use Illuminate\Support\Facades\Log;


use Illuminate\Support\Facades\Auth;







class FrontendController extends Controller
{
    //
    public function index()
    {
        $categories = Category::withCount('products')->has('products')->get();


        $featuredProducts = Product::where('is_featured_on_homepage', 'Yes')->limit(4)->get();

        return view('frontend.index', compact('categories', 'featuredProducts'));
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


    public function checkout()
    {



        $subtotal = 0;
        $cart = session('cart', []);

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        return view('frontend.checkout', compact('subtotal', 'cart'));
    }

public function store(Request $request)
{
    try {
        // 🔹 Validate request
        $request->validate([
            // Billing
            'billing_first_name' => 'required',
            'billing_last_name'  => 'required',
            'billing_email_address' => 'required|email',
            'billing_phone_number'  => 'required',
            'billing_street_address' => 'required',
            'billing_city' => 'required',
            'billing_country' => 'required',
            'billing_postcode_zip' => 'required',

            // Shipping
            'shipping_first_name' => 'nullable|string',
            'shipping_last_name' => 'nullable|string',
            'shipping_street_address' => 'nullable|string',
            'shipping_city' => 'nullable|string',
            'shipping_country' => 'nullable|string',
            'shipping_postcode_zip' => 'nullable|string',

            // Payment
            'payment_method' => 'required|string',
        ]);

        // 🔹 1️⃣ Create Order
        $order = Order::create([
            'user_id' => Auth::id(),
            'billing_first_name' => $request->billing_first_name,
            'billing_last_name' => $request->billing_last_name,
            'billing_company_name' => $request->billing_company_name,
            'billing_street_address' => $request->billing_street_address,
            'billing_apartment_suite_unit' => $request->billing_apartment_suite_unit,
            'billing_city' => $request->billing_city,
            'billing_country' => $request->billing_country,
            'billing_postcode_zip' => $request->billing_postcode_zip,
            'billing_email_address' => $request->billing_email_address,
            'billing_phone_number' => $request->billing_phone_number,
            'shipping_first_name' => $request->shipping_first_name,
            'shipping_last_name' => $request->shipping_last_name,
            'shipping_company_name' => $request->shipping_company_name,
            'shipping_street_address' => $request->shipping_street_address,
            'shipping_apartment_suite_unit' => $request->shipping_apartment_suite_unit,
            'shipping_city' => $request->shipping_city,
            'shipping_country' => $request->shipping_country,
            'shipping_postcode_zip' => $request->shipping_postcode_zip,
            'shipping_email_address' => $request->shipping_email_address,
            'shipping_phone_number' => $request->shipping_phone_number,
            'payment_method' => $request->payment_method ?? 'cod',
            'status' => 'pending',
        ]);

        // 🔹 2️⃣ Save Billing & Shipping separately
        BillingDetail::create([
            'order_id' => $order->id,
            'first_name' => $request->billing_first_name,
            'last_name' => $request->billing_last_name,
            'company_name' => $request->billing_company_name,
            'street_address' => $request->billing_street_address,
            'apartment_suite_unit' => $request->billing_apartment_suite_unit,
            'city' => $request->billing_city,
            'country' => $request->billing_country,
            'postcode_zip' => $request->billing_postcode_zip,
            'email_address' => $request->billing_email_address,
            'phone_number' => $request->billing_phone_number,
        ]);

        ShippingDetail::create([
            'order_id' => $order->id,
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

        // 🔹 3️⃣ Return JSON success
        return response()->json([
            'success' => true,
            'order_id' => $order->id
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'success' => false,
            'errors' => $e->errors()
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}

    // public function store(Request $request)
    // {
    //     //    Log::info('Auth ID: ' . Auth::id());

    //     //  🔹 Validate billing
    //     $request->validate([
    //         // Billing
    //         'billing_first_name' => 'required',
    //         'billing_last_name'  => 'required',
    //         'billing_email_address' => 'required|email',
    //         'billing_phone_number'  => 'required',
    //         'billing_street_address' => 'required',
    //         'billing_city' => 'required',
    //         'billing_country' => 'required',
    //         'billing_postcode_zip' => 'required',

    //         // Shipping
    //         'shipping_first_name' => 'nullable|string',
    //         'shipping_last_name' => 'nullable|string',
    //         'shipping_street_address' => 'nullable|string',
    //         'shipping_city' => 'nullable|string',
    //         'shipping_country' => 'nullable|string',
    //         'shipping_postcode_zip' => 'nullable|string',

    //         // Payment
    //         'payment_method' => 'required|string',
    //     ]);


    //     // 🔹 1️⃣ Save order summary + full billing & shipping info
    //     $order = Order::create([
    //         'user_id' => Auth::id() ,
    //         // Billing
    //         'billing_first_name' => $request->billing_first_name,
    //         'billing_last_name' => $request->billing_last_name,
    //         'billing_company_name' => $request->billing_company_name,
    //         'billing_street_address' => $request->billing_street_address,
    //         'billing_apartment_suite_unit' => $request->billing_apartment_suite_unit,
    //         'billing_city' => $request->billing_city,
    //         'billing_country' => $request->billing_country,
    //         'billing_postcode_zip' => $request->billing_postcode_zip,
    //         'billing_email_address' => $request->billing_email_address,
    //         'billing_phone_number' => $request->billing_phone_number,

    //         // Shipping
    //         'shipping_first_name' => $request->shipping_first_name,
    //         'shipping_last_name' => $request->shipping_last_name,
    //         'shipping_company_name' => $request->shipping_company_name,
    //         'shipping_street_address' => $request->shipping_street_address,
    //         'shipping_apartment_suite_unit' => $request->shipping_apartment_suite_unit,
    //         'shipping_city' => $request->shipping_city,
    //         'shipping_country' => $request->shipping_country,
    //         'shipping_postcode_zip' => $request->shipping_postcode_zip,
    //         'shipping_email_address' => $request->shipping_email_address,
    //         'shipping_phone_number' => $request->shipping_phone_number,
    //         'payment_method' => $request->payment_method ?? 'cod',
    //         'status' => 'pending', // ab ye defined hai

    //     ]);
       
        

    //     // 🔹 2️⃣ Save billing table separately
    //     BillingDetail::create([
    //         'order_id' => $order->id,
    //         'first_name' => $request->billing_first_name,
    //         'last_name' => $request->billing_last_name,
    //         'company_name' => $request->billing_company_name,
    //         'street_address' => $request->billing_street_address,
    //         'apartment_suite_unit' => $request->billing_apartment_suite_unit,
    //         'city' => $request->billing_city,
    //         'country' => $request->billing_country,
    //         'postcode_zip' => $request->billing_postcode_zip,
    //         'email_address' => $request->billing_email_address,
    //         'phone_number' => $request->billing_phone_number,
    //     ]);

    //     // 🔹 3️⃣ Save shipping table separately


    //     ShippingDetail::create([
    //         'order_id' => $order->id,
    //         'first_name' => $request->shipping_first_name,
    //         'last_name' => $request->shipping_last_name,
    //         'company_name' => $request->shipping_company_name,
    //         'street_address' => $request->shipping_street_address,
    //         'apartment_suite_unit' => $request->shipping_apartment_suite_unit,
    //         'city' => $request->shipping_city,
    //         'country' => $request->shipping_country,
    //         'postcode_zip' => $request->shipping_postcode_zip,
    //         'email_address' => $request->shipping_email_address,
    //         'phone_number' => $request->shipping_phone_number,
    //     ]);
    //     //  🔹 Agar PayPal ya dusra method hai
    //     return response()->json([
    //         'success' => true,
    //         'order_id' => $order->id
    //     ]);
    
    // }

       public function success(Request $request)
    {
        // dd(Auth::user());
        
        $order = Order::find($request->order_id);
        if ($order) {
            $order->status = $request->status;
            $order->payment_intent_id = $request->payment_intent;
            $order->save();
        }

        return view('frontend.success');
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

    public function updateStatus(Request $request)
    {
        $order = Order::findOrFail($request->order_id);

        $order->update([
            'status' => $request->status,
            'payment_status' => $request->payment_status,
            'payment_intent_id' => $request->payment_intent_id
        ]);

        return response()->json(['success' => true]);
    }
}
