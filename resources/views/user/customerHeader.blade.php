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
                <!-- Navigation Links -->
                <nav class="hidden md:flex space-x-6">
                    <a href="{{ route('customer.dashboard') }}" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                    <a href="{{ route('customer.orders', ['id' => $customer->id]) }}"
                        class="text-gray-600 hover:text-gray-900">Orders</a>
                </nav>

                <!-- Conditional Display for Authenticated User -->
                <div class="flex items-center space-x-4">
                    @if (auth()->check())
                        <!-- Logged-in User Dropdown -->
                        <div class="relative">
                            <button class="flex items-center space-x-2 focus:outline-none" onclick="toggleDropdown()">

                                <span class="text-gray-600 font-semibold">Hello, {{ $customer->name }}</span>
                            </button>
                            <!-- Dropdown Menu -->
                            <div id="dropdownMenu"
                                class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg overflow-hidden z-20">
                                <div class="p-4 text-center">
                                    <p class="text-gray-800 font-semibold mt-2">{{ auth()->user()->name }}</p>
                                    <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
                                </div>
                                <div class="border-t"></div>
                                <form action="{{ route('customer.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">
                                        Sign Out
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
            </div>
        </header>
    </div>

    <script>
        // Toggle Dropdown Menu
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('hidden');
        }

        // Close dropdown if clicked outside
        window.onclick = function(event) {
            if (!event.target.matches('.focus:outline-none')) {
                const dropdowns = document.getElementsByClassName("dropdown-content");
                for (let i = 0; i < dropdowns.length; i++) {
                    const openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('hidden')) {
                        openDropdown.classList.add('hidden');
                    }
                }
            }
        }
    </script>
</body>

</html>
