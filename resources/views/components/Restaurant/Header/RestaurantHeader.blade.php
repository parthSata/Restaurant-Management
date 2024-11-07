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
</head>

<body>
    <div class="">
        <header class="bg-white shadow-sm">
            <div class="container mx-auto px-4 py-4 flex items-center justify-between">
                <div class="text-2xl font-bold text-orange-500">
                    <img src="{{ asset('/storage/Uploaded_Images/' . $restaurants->logo) }}"
                        alt="{{ $restaurants->restaurant_name }}" class="inline-block h-10 w-10 rounded-full" />
                    {{ $restaurants->restaurant_name }}
                </div>
                <nav class="hidden md:flex space-x-6">
                    <a href="{{ route('restaurant.show', ['id' => $restaurants->id ?? 1]) }}"
                        class="text-gray-600 hover:text-gray-900">Home</a>
                    <a href="{{ route('reservation', ['id' => $restaurants->id ?? 1]) }}"
                        class="text-gray-600 hover:text-gray-900">Reservation</a>
                    <a href="{{ route('restaurant', ['id' => $restaurants->id ?? 1]) }}"
                        class="text-gray-600 hover:text-gray-900">Menu</a>
                    <a href="{{ route('about', ['id' => $restaurants->id ?? 1]) }}"
                        class="text-gray-600 hover:text-gray-900">About Us</a>
                    <a href="{{ route('contact', ['id' => $restaurants->id ?? 1]) }}"
                        class="text-gray-600 hover:text-gray-900">Contact Us</a>
                </nav>
                <div class="flex items-center space-x-4">
                    <a href="/register" class="bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600">
                        Register
                    </a>
                    <a href="/login" class="bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600">
                        Login
                    </a>
                </div>
            </div>
        </header>
    </div>
</body>

</html>
