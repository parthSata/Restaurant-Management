<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if ($restaurants)
        <title>{{ $restaurants->restaurant_name }} Header</title>
    @else
        <title>Restaurant Header</title>
    @endif
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <div>
        <header class="bg-white shadow-lg sticky top-0 z-10 transition-all ease-in-out duration-300">
            <div class="container mx-auto px-4 py-4 flex items-center justify-between">
                <div class="flex items-center">
                    <img src="{{ asset('/storage/Uploaded_Images/' . $restaurants->logo) }}"
                        alt="{{ $restaurants->restaurant_name }}" class="inline-block h-10 w-10 rounded-full" />
                    <span class="text-2xl font-bold text-orange-500 ml-3">{{ $restaurants->restaurant_name }}</span>
                </div>

                <nav class="hidden lg:flex space-x-6">
                    <a href="{{ route('restaurant.show', ['slug' => $restaurants->restaurant_slug ?? 1]) }}"
                        class="text-gray-600 hover:text-orange-500">Home</a>
                    <a href="{{ route('reservation', ['id' => $restaurants->id ?? 1]) }}"
                        class="text-gray-600 hover:text-orange-500">Reservation</a>
                    <a href="{{ route('restaurant', ['slug' => $restaurants->restaurant_slug ?? 1]) }}"
                        class="text-gray-600 hover:text-orange-500">Menu</a>
                    <a href="{{ route('about', ['id' => $restaurants->id ?? 1]) }}"
                        class="text-gray-600 hover:text-orange-500">About Us</a>
                    <a href="{{ route('contact', ['id' => $restaurants->id ?? 1]) }}"
                        class="text-gray-600 hover:text-orange-500">Contact Us</a>
                </nav>
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('customer.dashboard') }}"
                            class="hidden lg:block bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600">Dashboard</a>
                    @else
                        <a href="/register"
                            class="hidden lg:block bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600">Register</a>
                        <a href="/login"
                            class="hidden lg:block bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600">Login</a>
                    @endauth
                </div>
                <button id="menuToggle"
                    class="lg:hidden p-2 bg-gray-100 rounded-md hover:bg-gray-200 transition-colors">
                    <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>

            </div>
        </header>

        <!-- Side Menu (Hidden by default) -->
        <div id="sideMenu"
            class="fixed inset-y-0 left-0 transform -translate-x-full transition-transform lg:hidden bg-white w-72 p-4 flex flex-col z-50 shadow-lg">
            <nav class="space-y-1">
                <a href="{{ route('restaurant.show', ['slug' => $restaurants->restaurant_slug ?? 1]) }}"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-100 hover:text-orange-500 rounded-lg transition-all duration-300">
                    Home </a>
                <a href="{{ route('reservation', ['id' => $restaurants->id ?? 1]) }}"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-100 hover:text-orange-500 rounded-lg transition-all duration-300">
                    Reservation </a>
                <a href="{{ route('restaurant', ['slug' => $restaurants->restaurant_slug ?? 1]) }}"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-100 hover:text-orange-500 rounded-lg transition-all duration-300">
                    Menu </a>
                <a href="{{ route('about', ['id' => $restaurants->id ?? 1]) }}"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-100 hover:text-orange-500 rounded-lg transition-all duration-300">
                    About Us </a>
                <a href="{{ route('contact', ['id' => $restaurants->id ?? 1]) }}"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-100 hover:text-orange-500 rounded-lg transition-all duration-300">
                    Contact Us </a>
                @auth
                    <a href="{{ route('customer.dashboard') }}"
                        class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-100 hover:text-orange-500 rounded-lg transition-all duration-300">
                        Dashboard </a>
                @else
                    <a href="/login"
                        class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-100 hover:text-orange-500 rounded-lg transition-all duration-300">
                        Login </a>
                    <a href="/register"
                        class="flex items-center px-4 py-3 text-gray-700 hover:bg-orange-100 hover:text-orange-500 rounded-lg transition-all duration-300">
                        Sign Up </a>
                @endauth
            </nav>
        </div>
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
