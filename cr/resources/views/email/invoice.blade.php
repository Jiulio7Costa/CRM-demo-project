<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>
    <h1>Invoice</h1>
    <p><strong>Number:</strong> {{ $invoice->number }}</p>
    <p><strong>Amount:</strong> ${{ $invoice->amount }}</p>
    <p><strong>Status:</strong> {{ $invoice->status }}</p>
    <a href="{{ route('payment', $invoice->id) }}">Pay Invoice</a>
</body>
</html>