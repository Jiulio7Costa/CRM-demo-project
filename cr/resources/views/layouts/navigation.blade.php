<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <img class="h-8 w-8" src="/img/logo.svg" alt="Logo">
                    </a>
                </div>
                <div class="hidden sm:-my-px sm:ml-10 sm:flex">
                    <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out">Dashboard</a>
                    <a href="{{ route('profile.edit') }}" class="ml-8 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out">Profile</a>
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <div class="relative">
                    <button class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:shadow-solid" id="user-menu" aria-label="User menu" aria-haspopup="true">
                        <img class="h-8 w-8 rounded-full" src="/img/user.jpg" alt="">
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
