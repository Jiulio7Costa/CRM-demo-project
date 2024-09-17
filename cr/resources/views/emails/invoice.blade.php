<!DOCTYPE html>
<html>
<head>
    <title>Invoice Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-inline-size: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            border-block-end: 2px solid #007bff;
            padding-block-end: 10px;
            margin-block-end: 20px;
        }
        .header h1 {
            margin: 0;
            color: #007bff;
        }
        .content {
            line-height: 1.6;
        }
        .content p {
            margin: 10px 0;
        }
        .content .invoice-info {
            margin-block-start: 20px;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .content .invoice-info p {
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            margin-block-start: 20px;
            font-size: 14px;
            color: #888;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-block-start: 20px;
            background-color: #28a745;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Invoice #{{ $invoice->id }}</h1>
        </div>
        <div class="content">
            <p>Dear {{ $invoice->customer->name ?? 'Customer' }},</p>
            <p>Here are the details of your invoice:</p>
            <div class="invoice-info">
                <p><strong>Amount:</strong> ${{ number_format($invoice->amount, 2) }}</p>
                <p><strong>Status:</strong> {{ $invoice->status }}</p>
            </div>
            <p>To make a payment, click the button below:</p>
            <a href="{{ route('pay.invoice', ['invoice' => $invoice->id]) }}" class="button">Pay Invoice</a>
            <p>Thank you for your business!</p>
        </div>
        <div class="footer">
            <p>If you have any questions, feel free to contact us at support@example.com</p>
        </div>
    </div>
</body>
</html>
