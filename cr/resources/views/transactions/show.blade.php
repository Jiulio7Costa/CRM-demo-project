<!-- resources/views/transactions/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Details</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Transaction Details</h1>
        <p>ID: {{ $transaction->id }}</p>
        <p>Amount: {{ $transaction->amount }}</p>
        <p>Date: {{ $transaction->date }}</p>
        <a href="{{ route('transactions.index') }}">Back to List</a>
    </div>
</body>
</html>
