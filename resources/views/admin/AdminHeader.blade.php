<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Header</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header class="bg-gray-800 text-white py-4 shadow-md sticky top-0 z-10">
        <div class="container mx-auto flex justify-between items-center relative z-10">
            <!-- Logo Section -->
            <div class="flex items-center">
                <img src="{{ asset('image/Logo.png') }}" alt="Restaurant Logo" class="h-12 w-12 mr-3">
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex space-x-8">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-gray-400">Dashboard</a>
                <a href="{{ route('restaurants.index') }}" class="hover:text-gray-400">Restaurants</a>
                <a href="{{ route('customers.index') }}" class="hover:text-gray-400">Customers</a>
                <a href="{{ route('transactions.index') }}" class="hover:text-gray-400">Transactions</a>
                <a href="{{ route('coupons.index') }}" class="hover:text-gray-400">Coupon Codes</a>
            </nav>
            <!-- Mobile Menu Button -->
            <button id="menuToggle" class="lg:hidden p-2 bg-gray-100 rounded-md">
                <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>

            <!-- Logout Button (only visible on large screens) -->
            <form action="{{ route('logout') }}" class="hidden lg:flex gap-2 items-center" method="POST">
                @csrf
                <button type="submit"
                    class="bg-yellow-400 hover:bg-white hover:border-[#d4c332] border-2 hover:text-[#d4c332] text-black px-6 py-2 rounded-full font-semibold">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <!-- Mobile Navigation Menu -->
    <div id="sideMenu"
        class="fixed inset-y-0 left-0 transform -translate-x-full transition-transform lg:hidden bg-white w-72 p-4 flex flex-col z-50 shadow-lg">
        <nav class="space-y-1">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-4 py-3 text-gray-700 hover:bg-yellow-100 hover:text-yellow-500 rounded-lg">Dashboard</a>
            <a href="{{ route('restaurants.index') }}"
                class="flex items-center px-4 py-3 text-gray-700 hover:bg-yellow-100 hover:text-yellow-500 rounded-lg">Restaurants</a>
            <a href="{{ route('customers.index') }}"
                class="flex items-center px-4 py-3 text-gray-700 hover:bg-yellow-100 hover:text-yellow-500 rounded-lg">Customers</a>
            <a href="{{ route('transactions.index') }}"
                class="flex items-center px-4 py-3 text-gray-700 hover:bg-yellow-100 hover:text-yellow-500 rounded-lg">Transactions</a>
            <a href="{{ route('coupons.index') }}"
                class="flex items-center px-4 py-3 text-gray-700 hover:bg-yellow-100 hover:text-yellow-500 rounded-lg">Coupon
                Codes</a>
            <form action="{{ route('logout') }}" method="POST" class="w-full mt-4">
                @csrf
                <button type="submit"
                    class="w-full text-white bg-yellow-400 hover:bg-yellow-500 hover:text-black py-2 rounded-md">
                    Logout
                </button>
            </form>
        </nav>
    </div>

    <script>
        const menuToggle = document.getElementById('menuToggle');
        const sideMenu = document.getElementById('sideMenu');

        menuToggle.addEventListener('click', () => {
            sideMenu.classList.toggle('-translate-x-full');
        });
    </script>
</body>

</html>
