<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    //
       public function checkout()
    {
        $subtotal = 0;
        $cart = session('cart', []);

        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        return view('frontend.checkout', compact('subtotal'));
    }






    public function createCheckoutSession(Request $request)
   
    {
        // dd("Controller hit hua!");
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Food Delivery Order',
                    ],
                    'unit_amount' => 28105, // yahan dynamic amount aayega cents me
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.cancel'),
        ]);

      return response()->json(['id' => $session->id]);
    }

    public function success()
    {
        return view('frontend.success');
    }

    public function cancel()
    {
        return view('frontend.cancel');
    }
}


