@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <h2 class="text-2xl font-semibold">Dashboard</h2>
        <nav class="my-4">
            <ul class="flex space-x-4">
                <li><a href="{{ route('customers.index') }}" class="nav-link">Customers</a></li>
                <li><a href="{{ route('proposals.index') }}" class="nav-link">Proposals</a></li>
                <li><a href="{{ route('invoices.index') }}" class="nav-link">Invoices</a></li>
                <li><a href="{{ route('transactions.index') }}" class="nav-link">Transactions</a></li>
                <li><a href="{{ route('profile.edit') }}" class="nav-link">Profile</a></li>
                <li><a href="{{ route('logout') }}" class="nav-link logout-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
            </ul>
        </nav>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
@endsection
