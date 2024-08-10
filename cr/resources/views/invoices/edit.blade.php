<!-- resources/views/invoices/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Invoice</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Invoice</h1>
        <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" value="{{ $invoice->amount }}">
            </div>
            <div>
                <label for="due_date">Due Date:</label>
                <input type="date" id="due_date" name="due_date" value="{{ $invoice->due_date }}">
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
