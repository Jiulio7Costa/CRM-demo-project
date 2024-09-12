<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposal Details</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 1.1em;
            line-height: 1.6;
            margin: 0 0 15px;
        }
        p strong {
            font-weight: bold;
            color: #333;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            font-size: 1em;
            color: #007bff;
            text-decoration: none;
            border: 1px solid #007bff;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }
        a:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Proposal Details</h1>
        
        <p><strong>ID:</strong> {{ $proposal->id }}</p>
        <p><strong>Title:</strong> {{ $proposal->title }}</p>
        <p><strong>Description:</strong> {{ $proposal->description }}</p>
        <p><strong>Amount:</strong> ${{ number_format($proposal->amount, 2) }}</p>
        <p><strong>Created At:</strong> {{ \Carbon\Carbon::parse($proposal->created_at)->format('d M Y, H:i') }}</p>
        <p><strong>Updated At:</strong> {{ \Carbon\Carbon::parse($proposal->updated_at)->format('d M Y, H:i') }}</p>
        <p><strong>Customer ID:</strong> {{ $proposal->customer_id }}</p>
        
        <a href="{{ route('proposals.index') }}">Back to List</a>
    </div>
</body>
</html>
