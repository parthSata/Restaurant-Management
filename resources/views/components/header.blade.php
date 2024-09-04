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
                <ul class="flex items-center gap-10 ">
                    <li><a href="#"
                            class="text-gray-600 focus:text-black  focus:font-semibold hover:text-black  font-semibold">Home</a>
                    </li>
                    <li><a href="#"
                            class="text-gray-600 focus:text-black  focus:font-semibold hover:text-black  font-semibold">Restaurants</a>
                    </li>
                    <li><a href="#"
                            class="text-gray-600 focus:text-black  focus:font-semibold hover:text-black  font-semibold">Pricing</a>
                    </li>
                    <li><a href="#"
                            class="text-gray-600 focus:text-black  focus:font-semibold hover:text-black  font-semibold">Contact
                            us</a></li>
                    <button class="bg-yellow-400 text-black px-6 py-2 rounded-full font-semibold">Login</button>
                    <button class="border border-gray-300 text-gray-700 px-6 py-2 rounded-full font-semibold">Sign
                        Up</button>
                </ul>
            </nav>
        </div>
    </header>
</body>

</html>
