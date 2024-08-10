<!-- resources/views/invoices/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Details</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Invoice Details</h1>
        <p>ID: {{ $invoice->id }}</p>
        <p>Amount: {{ $invoice->amount }}</p>
        <p>Due Date: {{ $invoice->due_date }}</p>
        <a href="{{ route('invoices.index') }}">Back to List</a>
    </div>
</body>
</html>
