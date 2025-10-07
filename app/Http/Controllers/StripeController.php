<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\PaymentIntent;
use App\Models\Order;

class StripeController extends Controller
{
    //







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

 

    public function cancel()
    {
        return view('frontend.cancel');
    }

    public function payment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $amount = 1999; // Amount in cents (e.g. $19.99)
        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $amount,
                'currency' => 'usd',
                'payment_method' => $request->payment_method, // frontend se aa raha ID
                'confirmation_method' => 'manual',
                'confirm' => true,
            ]);

            if ($paymentIntent->status === 'succeeded') {
                return response()->json(['success' => true, 'paymentIntent' => $paymentIntent]);
            } else {
                return response()->json(['success' => false, 'status' => $paymentIntent->status]);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
