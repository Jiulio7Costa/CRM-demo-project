<!-- resources/views/proposals/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposal Details</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Proposal Details</h1>
        <p>ID: {{ $proposal->id }}</p>
        <p>Title: {{ $proposal->title }}</p>
        <p>Details: {{ $proposal->details }}</p>
        <a href="{{ route('proposals.index') }}">Back to List</a>
    </div>
</body>
</html>
