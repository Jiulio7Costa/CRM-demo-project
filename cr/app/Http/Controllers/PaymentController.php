<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

class PaymentController extends Controller
{
    public function payment(Invoice $invoice)
    {
        // Send the invoice email to the customer
        Mail::to($invoice->customer->email)->send(new InvoiceMail($invoice));

        // Return the payment view
        return view('invoices.payment', compact('invoice'));
    }

    public function processPayment(Request $request, Invoice $invoice)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Ensure 'stripeToken' is present in the request
        $request->validate([
            'stripeToken' => 'required|string',
        ]);

        try {
            $charge = Charge::create([
                'amount' => $invoice->amount * 100, // amount in cents
                'currency' => 'usd',
                'source' => $request->stripeToken, // This should be the token from Stripe.js
                'description' => 'Payment for Invoice ' . $invoice->id,
            ]);

            $invoice->status = 'paid'; // Update status
            $invoice->save();

            // Optionally, send an additional confirmation email here
            // \Mail::to($invoice->customer->email)->send(new \App\Mail\PaymentConfirmationMail($invoice));

            return redirect()->route('invoices.index')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }
}
