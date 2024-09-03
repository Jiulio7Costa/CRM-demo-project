<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Summary</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            block-size: 100vh;
        }

        .invoice-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            inline-size: min(100%, 600px);
            text-align: center;
        }

        .invoice-header {
            font-size: 28px;
            font-weight: 600;
            color: #333333;
            margin-block-end: 20px;
            border-block-end: 3px solid #007bff;
            padding-block-end: 10px;
        }

        .invoice-details {
            text-align: start;
            margin-block-end: 30px;
            font-size: 16px;
            color: #555555;
        }

        .invoice-details p {
            margin: 10px 0;
            padding: 10px;
            border-block-end: 1px solid #e0e0e0;
        }

        .invoice-details p:last-of-type {
            border-block-end: none;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-block-start: 20px;
        }

        .button {
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .payment-button {
            background-color: #28a745;
        }

        .payment-button:hover {
            background-color: #218838;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .back-link {
            background-color: #007bff;
        }

        .back-link:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .pdf-button {
            background-color: #6c757d;
        }

        .pdf-button:hover {
            background-color: #5a6268;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">Invoice Summary</div>
        
        <div class="invoice-details">
            <p><strong>Customer Name:</strong> {{ $invoice->customer->name ?? 'N/A' }}</p>
            <p><strong>ID:</strong> {{ $invoice->id }}</p>
            <p><strong>Amount:</strong> ${{ number_format($invoice->amount, 2) }}</p>
            <p><strong>Due Date:</strong> {{ $invoice->due_date }}</p>
        </div>
        
        <div class="button-container">
            <a href="{{ route('payment.show', $invoice) }}" class="button payment-button">Pay Now</a>
            <a href="{{ route('invoice.pdf', $invoice) }}" class="button pdf-button">Download PDF</a>
            <a href="{{ route('invoices.index') }}" class="button back-link">Back to List</a>
        </div>
    </div>
</body>
</html>
