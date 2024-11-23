@extends('layouts.restaurant')

@section('title', $restaurants->name)

@section('content')
    <div class="container mx-auto px-4">
        <!-- Hero Section -->
        <section class="relative py-20 overflow-hidden">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 z-10">
                    <h1 class="text-4xl md:text-6xl font-bold text-orange-500 mb-2">Eat Today FOOD COMBO</h1>
                    <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-6">Live another day</h2>
                    <p class="text-gray-600 mb-8">Get a Meal and SAVE up to 25% on Sides & Drinks</p>
                    <button
                        class="bg-orange-500 text-white px-6 py-3 rounded-full hover:bg-orange-600 transition duration-300">Book
                        a Table</button>
                </div>
                <div class="md:w-1/3 relative">
                    <img src="https://restaurant-management.nyc3.digitaloceanspaces.com/image/742/hero-img1.png"
                        alt="Salad with Salmon"
                        class="rounded-full w-auto h-[400px] md:w-[600px] md:h-[400px] object-cover mx-auto">
                    <div class="semi-circle"></div>
                </div>
            </div>
        </section>

        <!-- Our Story Section -->
        <section class="py-20">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <img src="https://restaurant-management.nyc3.digitaloceanspaces.com/image/578/veg.png"
                        alt="Various Indian Dishes" class="rounded-lg w-full h-auto object-cover">
                </div>
                <div class="md:w-1/2 md:pl-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Story</h2>
                    <p class="text-gray-600">
                        Welcome to our FOOD COMBO, where culinary excellence meets warm hospitality. Our passion for
                        creating memorable dining experiences has been at the heart of our restaurant since its inception.
                        We take pride in sourcing the finest ingredients and crafting dishes that tantalize taste buds and
                        nourish the soul.
                    </p>
                </div>
            </div>
        </section>

        <!-- Food Categories -->
        <section class="py-20">
            <div class="grid grid-cols-3 md:grid-cols-6 gap-8">
                <div class="text-center">
                    <img src="/placeholder.svg?height=100&width=100" alt="Kimchi"
                        class="rounded-full w-24 h-24 object-cover mx-auto mb-2">
                    <p class="text-gray-800">Kimchi</p>
                </div>
                <div class="text-center">
                    <img src="/placeholder.svg?height=100&width=100" alt="Italian Pizza"
                        class="rounded-full w-24 h-24 object-cover mx-auto mb-2">
                    <p class="text-gray-800">Italian Pizza</p>
                </div>
                <div class="text-center">
                    <img src="/placeholder.svg?height=100&width=100" alt="Lasagna"
                        class="rounded-full w-24 h-24 object-cover mx-auto mb-2">
                    <p class="text-gray-800">Lasagna</p>
                </div>
                <div class="text-center">
                    <img src="/placeholder.svg?height=100&width=100" alt="Coffee"
                        class="rounded-full w-24 h-24 object-cover mx-auto mb-2">
                    <p class="text-gray-800">Coffee</p>
                </div>
                <div class="text-center">
                    <img src="/placeholder.svg?height=100&width=100" alt="Tea"
                        class="rounded-full w-24 h-24 object-cover mx-auto mb-2">
                    <p class="text-gray-800">Tea</p>
                </div>
                <div class="text-center">
                    <img src="/placeholder.svg?height=100&width=100" alt="Wine"
                        class="rounded-full w-24 h-24 object-cover mx-auto mb-2">
                    <p class="text-gray-800">Wine</p>
                </div>
            </div>
        </section>

        <!-- Special Menu -->
        <section class="py-20">
            <h2 class="text-3xl font-bold text-gray-800 mb-12 text-center">Special Menu</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($specialMenuItems as $item)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                            class="w-full  object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $item->name }}</h3>
                            <p class="text-gray-600 mb-4">{{ $item->description }}</p>
                            <p class="text-gray-800 font-bold">Price: ${{ $item->price }}</p>
                            <button
                                class="bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition duration-300">
                                Order Now
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="container mx-auto px-4 py-16">
                <section class="flex flex-col md:flex-row items-center justify-between">
                    <div class="md:w-1/2 mb-8 md:mb-0">
                        <h2 class="text-orange-500 text-xl font-semibold mb-2">DISCOVER</h2>
                        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Our Menu</h1>
                        <p class="text-gray-600 mb-6 max-w-md">
                            Welcome to our restaurant! Get ready to embark on a culinary journey through our thoughtfully
                            crafted menu, designed to delight your taste buds and satisfy your cravings.
                        </p>
                        <a href="{{ route('menu', ['id' => $restaurants->id ?? 1]) }}"
                            class="px-6 py-2 border-2 border-orange-500 text-orange-500 font-semibold rounded-full hover:bg-orange-500 hover:text-white transition duration-300">
                            View Full Menu
                        </a>
                    </div>
                    <div class="md:w-1/3 relative">
                        <div class="grid grid-cols-2 gap-4">
                            <img src="https://restaurant-management.nyc3.digitaloceanspaces.com/image_one/607/Frame-105.png"
                                alt="Grilled meat skewers" class="w-full h-48 object-cover rounded-lg">
                            <img src="https://restaurant-management.nyc3.digitaloceanspaces.com/image_two/608/Frame-107.png"
                                alt="Soup or curry dish" class="w-full h-48 object-cover rounded-lg">
                        </div>

                    </div>
                </section>
            </div>
        </section>
    </div>
@endsection
