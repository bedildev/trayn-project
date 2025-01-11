<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function session(Request $request)
    {
        // Initialize the array that will hold product items for the session
        $productItems = [];

        // Set the API key for Stripe
        Stripe::setApiKey(config('stripe.sk'));

        // Check if there is a cart session and it is an array
        $cart = session('cart');
        if ($cart && is_array($cart)) {
            foreach ($cart as $id => $details) {
                // Get the necessary details from the cart
                $product_name = $details['product_name'];
                $total = $details['price'];
                $quantity = $details['quantity'];

                // Convert total to cents for Stripe
                $unit_amount = (int)($total * 100); // Convert to cents (unit_amount needs to be an integer)

                // Add product item to the productItems array
                $productItems[] = [
                    'price_data' => [
                        'product_data' => [
                            'name' => $product_name,
                        ],
                        'currency'     => 'USD',
                        'unit_amount'  => $unit_amount,
                    ],
                    'quantity' => $quantity
                ];
            }
        } else {
            // If the cart is empty or not set, redirect to an empty cart page (optional)
            return redirect()->route('cart.empty');
        }

        // Create a new Stripe checkout session
        try {
            $checkoutSession = Session::create([
                'line_items'            => $productItems,  // Pass product items directly
                'mode'                  => 'payment',
                'allow_promotion_codes' => true,
                'metadata'              => [
                    'user_id' => auth()->id() ?? 'guest'  // Dynamic user id from auth (or guest if not logged in)
                ],
                'customer_email' => auth()->user()->email ?? 'guest@example.com',  // Dynamic email for the user (or default)
                'success_url' => route('pembayaran.success'),
                'cancel_url'  => route('pembayaran.cancel'),
            ]);
        } catch (\Exception $e) {
            // Handle errors gracefully
            return redirect()->route('cart.empty')->withErrors('Something went wrong while processing your payment.');
        }

        // Redirect the user to Stripe's checkout page
        return redirect()->away($checkoutSession->url);
    }

    // Success page after payment
    public function success()
    {
        return "Thanks for your order! You have just completed your payment. The seller will reach out to you as soon as possible.";
    }

    // Cancel page if the user cancels the payment
    public function cancel()
    {
        return view('cancel');
    }
}
