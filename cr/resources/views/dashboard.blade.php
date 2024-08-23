@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-6">
        <h2 class="text-2xl font-semibold mb-4">Dashboard</h2>
        
        <!-- Navigation Bar -->
        <nav class="mb-6">
            <ul class="flex space-x-4">
                <li>
                    <a href="{{ route('customers.index') }}" class="nav-link px-4 py-2 rounded-md text-gray-700 hover:bg-gray-200 transition ease-in-out duration-150">Customers</a>
                </li>
                <li>
                    <a href="{{ route('proposals.index') }}" class="nav-link px-4 py-2 rounded-md text-gray-700 hover:bg-gray-200 transition ease-in-out duration-150">Proposals</a>
                </li>
                <li>
                    <a href="{{ route('invoices.index') }}" class="nav-link px-4 py-2 rounded-md text-gray-700 hover:bg-gray-200 transition ease-in-out duration-150">Invoices</a>
                </li>
                <li>
                    <a href="{{ route('transactions.index') }}" class="nav-link px-4 py-2 rounded-md text-gray-700 hover:bg-gray-200 transition ease-in-out duration-150">Transactions</a>
                </li>
                <li>
                    <a href="{{ route('profile.edit') }}" class="nav-link px-4 py-2 rounded-md text-gray-700 hover:bg-gray-200 transition ease-in-out duration-150">Profile</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="nav-link px-4 py-2 rounded-md text-red-600 hover:bg-red-100 transition ease-in-out duration-150" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
            </ul>
        </nav>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
@endsection
