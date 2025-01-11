<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class CheckOutController extends Controller
{
    public function showCheckoutForm()
    {
        $billing = session('billing');  // Get the billing information from the session
        $cart = session('cart');  // Get the cart items from the session
        return view('checkout.form', compact('billing', 'cart'));  // Pass data to the checkout view
    }

    // Process the checkout form submission
    public function processCheckout(Request $request)
    {
        // Save the billing information to the session or database
        session(['billing' => $request->all()]);  // Save billing info to the session

        // Redirect to the payment step
        return redirect()->route('checkout.payment');
    }

    // Show the payment form where the user will be redirected for payment
    public function showPaymentForm()
    {
        $billing = session('billing');
        $cart = session('cart');
        return view('checkout.payment', compact('billing', 'cart'));
    }

    // Process the payment by creating a Stripe session
    public function processPayment(Request $request)
    {
        Stripe::setApiKey(config('stripe.sk'));  // Set the Stripe API key

        $cart = session('cart');  // Get the cart items from the session
        $lineItems = [];  // Initialize the line items for the Stripe session

        // Add each item from the cart to the line items array
        foreach ($cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'product_data' => ['name' => $item['product_name']],  // Set the product name
                    'currency' => 'usd',  // Set the currency to USD
                    'unit_amount' => $item['price'] * 100,  // Convert the price to cents for Stripe
                ],
                'quantity' => $item['quantity'],  // Set the quantity for the item
            ];
        }

        // Create a Stripe Checkout session
        $session = Session::create([
            'payment_method_types' => ['card'],  // Allow card payments
            'line_items' => $lineItems,  // Set the line items
            'mode' => 'payment',  // Set the payment mode
            'success_url' => route('checkout.success'),  // Success URL after payment
            'cancel_url' => route('checkout.cancel'),  // Cancel URL if payment fails
        ]);

        // Redirect to Stripe Checkout page
        return redirect()->away($session->url);
    }

    // Handle successful payment
    public function success()
    {
        return view('checkout.success');  // Show success page after payment
    }

    // Handle canceled payment
    public function cancel()
    {
        return view('checkout.cancel');  // Show cancel page if payment is canceled
    }
}
