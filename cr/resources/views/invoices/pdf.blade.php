<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9eff1;
            margin: 0;
            padding: 0;
        }
        .invoice-container {
            max-inline-size: 900px;
            margin: 40px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            border: 1px solid #dcdcdc;
        }
        .invoice-header {
            border-block-end: 4px solid #007bff;
            padding-block-end: 20px;
            margin-block-end: 20px;
            font-size: 36px;
            font-weight: 700;
            color: #333333;
            text-align: center;
            letter-spacing: 1px;
        }
        .invoice-details {
            font-size: 16px;
            color: #333333;
            margin-block-end: 20px;
        }
        .invoice-details p {
            margin: 12px 0;
        }
        .invoice-details p strong {
            font-weight: 600;
        }
        .invoice-summary {
            border-block-start: 2px solid #007bff;
            padding-block-start: 15px;
            font-size: 18px;
            color: #333333;
            text-align: end;
        }
        .invoice-summary p {
            margin: 8px 0;
        }
        .invoice-footer {
            margin-block-start: 30px;
            text-align: center;
            font-size: 14px;
            color: #666666;
            border-block-start: 2px solid #dcdcdc;
            padding-block-start: 15px;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">Invoice</div>
        
        <div class="invoice-details">
            <p><strong>Customer Name:</strong> {{ $invoice->customer->name ?? 'N/A' }}</p>
            <p><strong>Invoice ID:</strong> {{ $invoice->id }}</p>
            <p><strong>Amount:</strong> ${{ number_format($invoice->amount, 2) }}</p>
            <p><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($invoice->due_date)->format('F j, Y') }}</p>
        </div>
        
        <div class="invoice-summary">
            <p><strong>Total Amount Due:</strong> ${{ number_format($invoice->amount, 2) }}</p>
        </div>
        
        <div class="invoice-footer">
            Thank you for your business!
        </div>
    </div>
</body>
</html>
