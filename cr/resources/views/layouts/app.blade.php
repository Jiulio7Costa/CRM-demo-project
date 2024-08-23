<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-900">
    <div class="min-h-screen">
        <!-- Navigation Bar -->
        <nav class="bg-white shadow-md rounded-lg p-4 mb-6">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <!-- Logo -->
                <a class="flex items-center" href="{{ route('dashboard') }}">
                    <img src="/img/logo.svg" alt="Logo" style="block-size: 40px;">
                </a>

                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-4">
                    <a href="{{ route('dashboard') }}" class="nav-link px-6 py-2 rounded-md {{ request()->routeIs('dashboard') ? 'bg-gray-200 text-gray-900' : 'text-gray-800 hover:bg-gray-200' }} transition duration-300 ease-in-out">Dashboard</a>
                    <a href="{{ route('customers.index') }}" class="nav-link px-6 py-2 rounded-md {{ request()->routeIs('customers.index') ? 'bg-gray-200 text-gray-900' : 'text-gray-800 hover:bg-gray-200' }} transition duration-300 ease-in-out">Customers</a>
                    <a href="{{ route('proposals.index') }}" class="nav-link px-6 py-2 rounded-md {{ request()->routeIs('proposals.index') ? 'bg-gray-200 text-gray-900' : 'text-gray-800 hover:bg-gray-200' }} transition duration-300 ease-in-out">Proposals</a>
                    <a href="{{ route('invoices.index') }}" class="nav-link px-6 py-2 rounded-md {{ request()->routeIs('invoices.index') ? 'bg-gray-200 text-gray-900' : 'text-gray-800 hover:bg-gray-200' }} transition duration-300 ease-in-out">Invoices</a>
                    <a href="{{ route('transactions.index') }}" class="nav-link px-6 py-2 rounded-md {{ request()->routeIs('transactions.index') ? 'bg-gray-200 text-gray-900' : 'text-gray-800 hover:bg-gray-200' }} transition duration-300 ease-in-out">Transactions</a>
                    <a href="{{ route('profile.edit') }}" class="nav-link px-6 py-2 rounded-md {{ request()->routeIs('profile.edit') ? 'bg-gray-200 text-gray-900' : 'text-gray-800 hover:bg-gray-200' }} transition duration-300 ease-in-out">Profile</a>
                    <a href="{{ route('logout') }}" class="nav-link px-6 py-2 rounded-md text-red-600 hover:bg-red-100 transition duration-300 ease-in-out" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden flex items-center text-gray-500 hover:text-gray-700 focus:outline-none" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars fa-lg"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div class="md:hidden collapse" id="navbarNav">
                <ul class="space-y-2 mt-4">
                    <li><a href="{{ route('dashboard') }}" class="block px-6 py-2 rounded-md {{ request()->routeIs('dashboard') ? 'bg-gray-200 text-gray-900' : 'text-gray-800 hover:bg-gray-200' }} transition duration-300 ease-in-out">Dashboard</a></li>
                    <li><a href="{{ route('customers.index') }}" class="block px-6 py-2 rounded-md {{ request()->routeIs('customers.index') ? 'bg-gray-200 text-gray-900' : 'text-gray-800 hover:bg-gray-200' }} transition duration-300 ease-in-out">Customers</a></li>
                    <li><a href="{{ route('proposals.index') }}" class="block px-6 py-2 rounded-md {{ request()->routeIs('proposals.index') ? 'bg-gray-200 text-gray-900' : 'text-gray-800 hover:bg-gray-200' }} transition duration-300 ease-in-out">Proposals</a></li>
                    <li><a href="{{ route('invoices.index') }}" class="block px-6 py-2 rounded-md {{ request()->routeIs('invoices.index') ? 'bg-gray-200 text-gray-900' : 'text-gray-800 hover:bg-gray-200' }} transition duration-300 ease-in-out">Invoices</a></li>
                    <li><a href="{{ route('transactions.index') }}" class="block px-6 py-2 rounded-md {{ request()->routeIs('transactions.index') ? 'bg-gray-200 text-gray-900' : 'text-gray-800 hover:bg-gray-200' }} transition duration-300 ease-in-out">Transactions</a></li>
                    <li><a href="{{ route('profile.edit') }}" class="block px-6 py-2 rounded-md {{ request()->routeIs('profile.edit') ? 'bg-gray-200 text-gray-900' : 'text-gray-800 hover:bg-gray-200' }} transition duration-300 ease-in-out">Profile</a></li>
                    <li><a href="{{ route('logout') }}" class="block px-6 py-2 rounded-md text-red-600 hover:bg-red-100 transition duration-300 ease-in-out" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                </ul>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="py-6 px-4 sm:px-6 lg:px-8">
            @yield('content')
        </main>
    </div>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <!-- Scripts -->
    @vite('resources/js/app.js')
</body>
</html>
