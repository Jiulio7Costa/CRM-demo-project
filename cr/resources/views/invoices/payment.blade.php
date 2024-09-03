<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Invoice</title>
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            block-size: 100vh;
        }

        .payment-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-inline-size: 600px;
            inline-size: 100%;
            text-align: center;
        }

        .payment-header {
            font-size: 32px;
            font-weight: 600;
            color: #333333;
            margin-block-end: 30px;
            border-block-end: 2px solid #007bff;
            padding-block-end: 10px;
        }

        .invoice-details {
            text-align: start;
            margin-block-end: 30px;
            font-size: 16px;
            color: #555555;
        }

        .invoice-details p {
            margin: 12px 0;
            padding: 12px;
            border-block-end: 1px solid #e0e0e0;
        }

        .invoice-details p:last-of-type {
            border-block-end: none;
        }

        .card-element {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 16px;
            margin: 20px 0;
            background-color: #f9f9f9;
        }

        .payment-button {
            display: inline-block;
            padding: 14px 24px;
            font-size: 18px;
            color: #ffffff;
            background-color: #28a745;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .payment-button:hover {
            background-color: #218838;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .cancel-link {
            display: inline-block;
            margin-block-start: 20px;
            font-size: 16px;
            color: #007bff;
            text-decoration: none;
        }

        .cancel-link:hover {
            text-decoration: underline;
        }

        .stripe-error {
            color: #dc3545;
            font-size: 14px;
            margin-block-start: 20px;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <div class="payment-header">Complete Your Payment</div>

        <div class="invoice-details">
            <p><strong>Customer Name:</strong> {{ $invoice->customer->name ?? 'N/A' }}</p>
            <p><strong>Invoice ID:</strong> {{ $invoice->id }}</p>
            <p><strong>Amount:</strong> ${{ number_format($invoice->amount, 2) }}</p>
            <p><strong>Due Date:</strong> {{ $invoice->due_date }}</p>
        </div>

        <form action="{{ route('payment.process', $invoice) }}" method="post" id="payment-form">
            @csrf
            <div id="card-element" class="card-element"></div>
            <div id="card-errors" class="stripe-error"></div>
            <button type="submit" class="payment-button">Pay Now</button>
        </form>

        <a href="{{ route('invoices.index') }}" class="cancel-link">Cancel and Return</a>

        <script>
            var stripe = Stripe('{{ env('STRIPE_KEY') }}');
            var elements = stripe.elements();
            var card = elements.create('card');
            card.mount('#card-element');

            var form = document.getElementById('payment-form');
            var cardErrors = document.getElementById('card-errors');

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        cardErrors.textContent = result.error.message;
                    } else {
                        var input = document.createElement('input');
                        input.setAttribute('type', 'hidden');
                        input.setAttribute('name', 'stripeToken');
                        input.setAttribute('value', result.token.id);
                        form.appendChild(input);
                        form.submit();
                    }
                });
            });
        </script>
    </div>
</body>
</html>
