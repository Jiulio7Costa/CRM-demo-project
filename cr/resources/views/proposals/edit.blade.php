<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proposal</title>
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
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-control:focus {
            border-color: #007bff;
            outline: none;
        }
        .form-control-textarea {
            resize: vertical;
        }
        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #007bff;
            background-color: #fff;
            border: 1px solid #007bff;
            border-radius: 4px;
            text-align: center;
            text-decoration: none;
        }
        .btn-secondary:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Proposal</h1>
        <form action="{{ route('proposals.update', $proposal->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Proposal Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $proposal->title) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Proposal Description</label>
                <textarea id="description" name="description" class="form-control form-control-textarea" rows="5" required>{{ old('description', $proposal->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="customer_id">Customer/Client</label>
                <select id="customer_id" name="customer_id" class="form-control" required>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ $customer->id == $proposal->customer_id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="amount">Proposal Amount</label>
                <input type="number" id="amount" name="amount" class="form-control" step="0.01" value="{{ old('amount', $proposal->amount) }}" required>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date', $proposal->start_date) }}" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date/Deadline</label>
                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date', $proposal->end_date) }}" required>
            </div>

            <div class="form-group">
                <label for="priority">Priority</label>
                <select id="priority" name="priority" class="form-control" required>
                    <option value="low" {{ old('priority', $proposal->priority) == 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ old('priority', $proposal->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ old('priority', $proposal->priority) == 'high' ? 'selected' : '' }}>High</option>
                </select>
            </div>

            <div class="form-group">
                <label for="status">Proposal Status</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="draft" {{ old('status', $proposal->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="submitted" {{ old('status', $proposal->status) == 'submitted' ? 'selected' : '' }}>Submitted</option>
                    <option value="approved" {{ old('status', $proposal->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ old('status', $proposal->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <div class="form-group">
                <label for="contact_info">Contact Information</label>
                <input type="text" id="contact_info" name="contact_info" class="form-control" value="{{ old('contact_info', $proposal->contact_info) }}">
            </div>

            <div class="form-group">
                <label for="comments">Comments/Notes</label>
                <textarea id="comments" name="comments" class="form-control form-control-textarea" rows="3">{{ old('comments', $proposal->comments) }}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-primary">Update Proposal</button>
                <a href="{{ route('proposals.index') }}" class="btn-secondary">Back to List</a>
            </div>
        </form>
    </div>
</body>
</html>
