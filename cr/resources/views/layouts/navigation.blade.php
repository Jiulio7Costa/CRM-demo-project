<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <div class="flex justify-between items-center h-16">
            <!-- Left side - Logo and Links -->
            <div class="flex items-center space-x-6">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <img class="h-10 w-10" src="/img/logo.svg" alt="Logo">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:space-x-6">
                    <a href="{{ route('dashboard') }}" class="text-black hover:text-gray-800 transition duration-200 ease-in-out text-lg font-medium">Dashboard</a>
                    <a href="{{ route('customers.index') }}" class="text-black hover:text-gray-800 transition duration-200 ease-in-out text-lg font-medium">Customers</a>
                    <a href="{{ route('invoices.index') }}" class="text-black hover:text-gray-800 transition duration-200 ease-in-out text-lg font-medium">Invoices</a>
                    <a href="{{ route('transactions.index') }}" class="text-black hover:text-gray-800 transition duration-200 ease-in-out text-lg font-medium">Transactions</a>
                    <a href="{{ route('proposals.index') }}" class="text-black hover:text-gray-800 transition duration-200 ease-in-out text-lg font-medium">Proposals</a>
                    <a href="{{ route('profile.edit') }}" class="text-black hover:text-gray-800 transition duration-200 ease-in-out text-lg font-medium">Profile</a>
                </div>
            </div>
        </div>
    </div>
</nav>
