<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class=" bg-gray-100">
        <header class="bg-white shadow-sm">
            <div class="container mx-auto px-4 py-4 flex items-center justify-between">
                <!-- Conditional Display for Authenticated User -->
                <div class="flex items-center space-x-4">
                    @if (auth()->check())
                        <!-- Logged-in User Dropdown -->
                        <div class="relative">
                            <button
                                class="flex items-center space-x-2 bg-gradient-to-r from-yellow-400 via-yellow-600 to-yellow-600 text-white px-6 py-3 rounded-full shadow-lg hover:scale-105 transform transition duration-300 focus:outline-none"
                                onclick="toggleDropdown()">
                                <span class="font-semibold">Hello, {{ $fullName }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" class="w-5 h-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div id="dropdownMenu"
                                class="hidden absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-xl overflow-hidden z-20 transition-all ease-in-out duration-300 opacity-0 scale-95">
                                <div class="p-4 text-center border-b">
                                    <p class="text-gray-800 font-semibold">{{ $fullName }}</p>
                                    <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                                </div>
                                <div class="border-t"></div>
                                <form action="{{ route('customer.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="flex items-center space-x-2 w-full px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-b-lg transition duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" class="w-5 h-5 text-gray-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 16l4-4m0 0l-4-4m4 4H3"></path>
                                        </svg>
                                        <span>LogOut</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- Register and Login Buttons for Guests -->
                        <a href="/register" class="bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600">
                            Register
                        </a>
                        <a href="/login" class="bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600">
                            Login
                        </a>
                    @endif
                </div>

                <!-- Navigation Links -->
                <nav class="hidden md:flex space-x-6">
                    <a href="{{ route('customer.dashboard') }}" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                    <a href="{{ route('customer.orders', ['id' => $customer->id]) }}"
                        class="text-gray-600 hover:text-gray-900">Orders</a>
                </nav>


            </div>
        </header>
    </div>

    <script>
        // Toggle Dropdown Menu
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
            dropdown.classList.toggle('opacity-0');
            dropdown.classList.toggle('scale-95');
            dropdown.classList.toggle('opacity-100');
            dropdown.classList.toggle('scale-100');
        }

        // Close dropdown if clicked outside
        window.onclick = function(event) {
            const dropdownMenu = document.getElementById("dropdownMenu");
            if (!event.target.closest('.relative') && !event.target.matches('.focus:outline-none')) {
                // Close dropdown if click is outside the dropdown area
                dropdownMenu.classList.add('hidden');
                dropdownMenu.classList.remove('opacity-100', 'scale-100');
                dropdownMenu.classList.add('opacity-0', 'scale-95');
            }
        }
    </script>

</body>

</html>
