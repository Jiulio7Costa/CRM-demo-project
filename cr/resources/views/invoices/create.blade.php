<!-- resources/views/invoices/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Invoice</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-inline-size: 900px; /* Changed from max-width to max-inline-size */
            margin: auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-block-end: 20px; /* Changed from margin-bottom to margin-block-end */
            color: #333;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        .form-group {
            margin-block-end: 15px; /* Changed from margin-bottom to margin-block-end */
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-block-end: 5px; /* Changed from margin-bottom to margin-block-end */
            color: #666;
        }
        .form-group input, .form-group select {
            inline-size: 100%; /* Changed from width to inline-size */
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input[type="number"] {
            -moz-appearance: textfield; /* For Firefox */
        }
        .form-group input[type="date"] {
            cursor: pointer;
        }
        .form-group select {
            cursor: pointer;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            inline-size: 200px; /* Changed from width to inline-size */
            margin: 0 auto;
            display: block;
        }
        button:hover {
            background-color: #0056b3;
        }
        .invoice-details {
            display: flex;
            justify-content: space-between;
        }
        .invoice-details .form-group {
            flex: 1;
            margin-inline-end: 10px; /* Changed from margin-right to margin-inline-end */
        }
        .invoice-details .form-group:last-child {
            margin-inline-end: 0; /* Changed from margin-right to margin-inline-end */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Invoice</h1>
        <form action="{{ route('invoices.store') }}" method="POST">
            @csrf

            <!-- Include customer_id if it exists -->
            @if(isset($customer_id))
                <input type="hidden" name="customer_id" value="{{ $customer_id }}">
            @endif

            <div class="form-group">
                <label for="customer_name">Customer Name:</label>
                <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
            </div>

            <div class="form-group">
                <label for="customer_email">Email Address:</label>
                <input type="email" id="customer_email" name="customer_email" value="{{ old('customer_email') }}" required>
            </div>

            <div class="invoice-details">
                <div class="form-group">
                    <label for="amount">Amount:</label>
                    <input type="number" id="amount" name="amount" step="0.01" value="{{ old('amount') }}" required>
                </div>
                <div class="form-group">
                    <label for="due_date">Due Date:</label>
                    <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}" required>
                </div>
            </div>

            <button type="submit">Create Invoice</button>
        </form>
    </div>
</body>
</html>
