<?php

// app/Http/Controllers/PaymentController.php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaymentController extends Controller
{
    public function payment(Invoice $invoice)
    {
        return view('payment', compact('invoice'));
    }

    public function processPayment(Request $request, Invoice $invoice)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $charge = Charge::create([
            'amount' => $invoice->amount * 100, // amount in cents
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => 'Payment for Invoice ' . $invoice->number,
        ]);

        $invoice->status = 'success';
        $invoice->save();

        return redirect()->route('invoices.index')->with('success', 'Payment successful!');
    }
}
