<!-- resources/views/invoices/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Invoice</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Create Invoice</h1>
        <form action="{{ route('invoices.store') }}" method="POST">
            @csrf
            <div>
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount">
            </div>
            <div>
                <label for="due_date">Due Date:</label>
                <input type="date" id="due_date" name="due_date">
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>
