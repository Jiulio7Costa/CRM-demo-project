<!-- resources/views/proposals/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proposal</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Proposal</h1>
        <form action="{{ route('proposals.update', $proposal->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ $proposal->title }}">
            </div>
            <div>
                <label for="details">Details:</label>
                <textarea id="details" name="details">{{ $proposal->details }}</textarea>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
