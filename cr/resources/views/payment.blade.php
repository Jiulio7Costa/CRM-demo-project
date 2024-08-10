@extends('layouts.app')

@section('content')
    <h1>Pay Invoice</h1>
    <p><strong>Number:</strong> {{ $invoice->number }}</p>
    <p><strong>Amount:</strong> ${{ $invoice->amount }}</p>
    <form action="{{ route('processPayment', $invoice->id) }}" method="POST">
        @csrf
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{{ env('STRIPE_KEY') }}"
            data-amount="{{ $invoice->amount * 100 }}"
            data-name="Laravel Demo"
            data-description="Payment for Invoice {{ $invoice->number }}"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto">
        </script>
    </form>
@endsection
