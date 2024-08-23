<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoices</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom Styles -->
    <style>
        .navbar-nav .nav-link {
            color: #000 !important; /* Ensure text is black */
        }
        .navbar-nav .nav-link:hover {
            color: #333 !important; /* Slightly darker on hover */
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="/img/logo.svg" alt="Logo" style="block-size: 40px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('customers.index') }}">Customers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('invoices.index') }}">Invoices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('proposals.index') }}">Proposals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('transactions.index') }}">Transactions</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">Profile</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <header class="d-flex justify-content-between align-items-center mb-4">
            <h1>Invoices</h1>
            <a href="{{ route('invoices.create') }}" class="btn btn-primary">Create Invoice</a>
        </header>

        <main>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->id }}</td>
                            <td>${{ number_format($invoice->amount, 2) }}</td>
                            <td>
                                @if ($invoice->date)
                                    {{ $invoice->date->format('Y-m-d') }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-secondary btn-sm">View</a>
                                <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
