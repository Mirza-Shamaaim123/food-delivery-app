<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

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

        return response()->json([
            'status' => 'success',
            'message' => 'Product added to cart',
            'cart' => $cart
        ]);
    }

    // app/Http/Controllers/FrontendController.php
    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($request->action == "increase") {
                $cart[$id]['quantity']++;
            } elseif ($request->action == "decrease" && $cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            }
        }

        session()->put('cart', $cart);

        // subtotal calculate
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        return response()->json([
            'success' => true,
            'quantity' => $cart[$id]['quantity'],
            'item_total' => number_format($cart[$id]['price'] * $cart[$id]['quantity'], 2),
            'subtotal' => number_format($subtotal, 2),
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
        return view('frontend.checkout');
    }
}
