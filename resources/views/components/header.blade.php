<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Header</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header class="bg-white shadow-md sticky top-0">
        <div class="container mx-auto p-6 flex items-center justify-between">
            <div class="flex items-center">
                <img src="image/Logo.png" alt="Logo" class="h-16 w-16 mr-2">
            </div>
            <nav>
                <ul class="flex items-center gap-10">
                    <li><a href="/"
                            class="text-gray-600 focus:text-black focus:font-semibold hover:text-black font-semibold">Home</a>
                    </li>
                    <li><a href="/restaurants"
                            class="text-gray-600 focus:text-black focus:font-semibold hover:text-black font-semibold">Restaurants</a>
                    </li>
                    <li><a href="/contact"
                            class="text-gray-600 focus:text-black focus:font-semibold hover:text-black font-semibold">Contact
                            Us</a></li>

                    <!-- Conditionally display Dashboard and Logout if the user is logged in -->
                    @if (auth()->check())
                        <li>
                            <a href="{{ route('customer.dashboard') }}">
                                <button
                                    class="bg-yellow-400 hover:bg-white hover:border-[#d4c332] border-2 hover:text-[#d4c332] text-black px-6 py-2 rounded-full font-semibold">
                                    Dashboard
                                </button>
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('customer.logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-yellow-400 hover:bg-white hover:border-[#d4c332] border-2 hover:text-[#d4c332] text-black px-6 py-2 rounded-full font-semibold">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <!-- Show Login and Register buttons if the user is not logged in -->
                        <li><a href="/login"><button
                                    class="bg-yellow-400 hover:bg-white hover:border-[#d4c332] border-2 hover:text-[#d4c332] text-black px-6 py-2 rounded-full font-semibold">Login</button></a>
                        </li>
                        <li><a href="/register"><button
                                    class="border-gray-300 text-gray-700 px-6 py-2 hover:bg-[#231E41] hover:text-white border-2 rounded-full font-semibold">Sign
                                    Up</button></a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>
</body>

</html>
