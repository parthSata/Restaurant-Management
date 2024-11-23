<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Header</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

    <!-- Main Header -->
    <header class="bg-white shadow-md sticky top-0 z-10">
        <div class="container mx-auto p-6 flex items-center justify-between">
            <div class="flex items-center">
                <img src="image/Logo.png" alt="Logo" class="h-16 w-16 mr-2">
            </div>
            <button id="menuToggle" class="lg:hidden p-2 bg-gray-100 rounded-md">
                <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <nav class="hidden lg:flex">
                <ul class="flex items-center gap-10">
                    <li><a href="/" class="text-gray-600 hover:text-yellow-500 font-semibold">Home</a></li>
                    <li><a href="/restaurants" class="text-gray-600 hover:text-yellow-500 font-semibold">Restaurants</a>
                    </li>
                    <li><a href="/contact" class="text-gray-600 hover:text-yellow-500 font-semibold">Contact Us</a></li>
                    @if (auth()->check())
                        <li>
                            <a href="{{ route('customer.dashboard') }}">
                                <button
                                    class="bg-yellow-500 hover:bg-yellow-400 text-white px-6 py-2 rounded-full font-semibold">
                                    Dashboard
                                </button>
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('customer.logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-yellow-500 hover:bg-yellow-400 text-white px-6 py-2 rounded-full font-semibold">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="/login">
                                <button
                                    class="bg-yellow-500 hover:bg-yellow-400 text-white px-6 py-2 rounded-full font-semibold">
                                    Login
                                </button>
                            </a>
                        </li>
                        <li>
                            <a href="/register">
                                <button
                                    class="border-gray-300 text-gray-700 hover:bg-gray-100 hover:text-yellow-500 border-2 px-6 py-2 rounded-full font-semibold">
                                    Sign Up
                                </button>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <!-- Side Menu -->
    <div id="sideMenu"
        class="fixed inset-y-0 left-0 transform -translate-x-full transition-transform lg:hidden bg-white w-72 p-4 flex flex-col z-50 shadow-lg">
        <nav class="space-y-1">
            <a href="/"
                class="flex items-center px-4 py-3 text-gray-700 hover:bg-yellow-100 hover:text-yellow-500 rounded-lg">
                Home
            </a>
            <a href="/restaurants"
                class="flex items-center px-4 py-3 text-gray-700 hover:bg-yellow-100 hover:text-yellow-500 rounded-lg">
                Restaurants
            </a>
            <a href="/contact"
                class="flex items-center px-4 py-3 text-gray-700 hover:bg-yellow-100 hover:text-yellow-500 rounded-lg">
                Contact Us
            </a>
            @if (auth()->check())
                <a href="{{ route('customer.dashboard') }}"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-yellow-100 hover:text-yellow-500 rounded-lg">
                    Dashboard
                </a>
                <form action="{{ route('customer.logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit"
                        class="flex items-center px-4 py-3 w-full text-gray-700 hover:bg-yellow-100 hover:text-yellow-500 rounded-lg">
                        Logout
                    </button>
                </form>
            @else
                <a href="/login"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-yellow-100 hover:text-yellow-500 rounded-lg">
                    Login
                </a>
                <a href="/register"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-yellow-100 hover:text-yellow-500 rounded-lg">
                    Sign Up
                </a>
            @endif
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
