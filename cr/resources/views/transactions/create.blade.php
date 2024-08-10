<!-- resources/views/transactions/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Transaction</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Create Transaction</h1>
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf
            <div>
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount">
            </div>
            <div>
                <label for="date">Date:</label>
                <input type="date" id="date" name="date">
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>
