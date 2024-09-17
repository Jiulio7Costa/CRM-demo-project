<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Summary</title>
    <style>
        /* Basic styles optimized for email */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        .invoice-container {
            background-color: #ffffff;
            padding: 20px;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .invoice-header {
            font-size: 24px;
            font-weight: 600;
            color: #333333;
            margin-bottom: 20px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        .invoice-details {
            text-align: left;
            font-size: 16px;
            color: #555555;
        }

        .invoice-details p {
            margin: 10px 0;
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .button-container {
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            text-decoration: none;
            color: #ffffff;
            background-color: #28a745;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #218838;
        }

        .pdf-button {
            background-color: #6c757d;
        }

        .pdf-button:hover {
            background-color: #5a6268;
        }

        .back-link {
            background-color: #007bff;
        }

        .back-link:hover {
            background-color: #0056b3;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #999999;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <!-- Header -->
        <div class="invoice-header">Invoice Summary</div>
        
        <!-- Invoice Details -->
        <div class="invoice-details">
            <p><strong>Customer Name:</strong> {{ $invoice->customer->name ?? 'N/A' }}</p>
            <p><strong>Invoice ID:</strong> {{ $invoice->id }}</p>
            <p><strong>Amount Due:</strong> ${{ number_format($invoice->amount, 2) }}</p>
            <p><strong>Due Date:</strong> {{ $invoice->due_date }}</p>
        </div>
        
        <!-- Action Buttons -->
        <div class="button-container">
            <a href="{{ route('payment.show', $invoice) }}" class="button">Pay Now</a>
            <a href="{{ route('invoice.pdf', $invoice) }}" class="button pdf-button">Download PDF</a>
            <a href="{{ route('invoices.index') }}" class="button back-link">Back to List</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            If you have any questions, feel free to contact our support team.
        </div>
    </div>
</body>
</html>
