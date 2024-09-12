<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Proposal</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 900px;
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
        .form-group .file-upload {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
        }
        .form-group .file-upload input {
            display: block;
            margin: 0;
        }
        .form-group .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
        }
        .form-group .btn-primary:hover {
            background-color: #0056b3;
        }
        .form-group .btn-secondary {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #007bff;
            background-color: #fff;
            border: 1px solid #007bff;
            border-radius: 4px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }
        .form-group .btn-secondary:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create New Proposal</h1>
        <form action="{{ route('proposals.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Proposal Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Proposal Description</label>
                <textarea id="description" name="description" class="form-control form-control-textarea" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label for="customer_id">Customer/Client</label>
                <select id="customer_id" name="customer_id" class="form-control" required>
                    <option value="" disabled selected>Select a customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="amount">Proposal Amount</label>
                <input type="number" id="amount" name="amount" class="form-control" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date/Deadline</label>
                <input type="date" id="end_date" name="end_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="priority">Priority</label>
                <select id="priority" name="priority" class="form-control">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>

            <div class="form-group">
                <label for="attachments">Attachments</label>
                <div class="file-upload">
                    <input type="file" id="attachments" name="attachments[]" multiple>
                </div>
            </div>

            <div class="form-group">
                <label for="status">Proposal Status</label>
                <select id="status" name="status" class="form-control">
                    <option value="draft">Draft</option>
                    <option value="submitted">Submitted</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>

            <div class="form-group">
                <label for="contact_info">Contact Information</label>
                <input type="text" id="contact_info" name="contact_info" class="form-control">
            </div>

            <div class="form-group">
                <label for="comments">Comments/Notes</label>
                <textarea id="comments" name="comments" class="form-control form-control-textarea" rows="3"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-primary">Submit Proposal</button>
                <a href="{{ route('proposals.index') }}" class="btn-secondary">Back to List</a>
            </div>
        </form>
    </div>
</body>
</html>
