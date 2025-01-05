@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div class="container mx-auto px-4 py-12 flex items-center">
        <div class="w-1/2 pr-8">
            <div class="inline-block bg-gray-200 px-4 py-2 rounded-full mb-4">
                <p class="text-gray-700 font-semibold">Order. Enjoy. Repeat.</p>
            </div>
            <h1 class="text-5xl font-bold text-gray-900 mb-6">Bringing Menus to Life: Explore, Order, Love</h1>
            <p class="text-gray-600 mb-8">Ready-made on-demand food delivery solution for restaurant and food outlets.
                Kick-start your food delivery business with our 100% white-labelled food delivery solutions.</p>
            <button class="bg-yellow-400 text-black px-8 py-3 rounded-full font-semibold text-lg">Try For Free</button>
        </div>
        <div class="w-1/2">
            <img src="image/BGImage.png" alt="Food Delivery Illustration" class="w-full">
        </div>
    </div>

    <div class="grid grid-cols-3 gap-8">
        <div class="text-center">
            <img src="image/register.png" alt="Register" class="mx-auto mb-4">
            <h3 class="text-xl font-semibold mb-2">Register</h3>
            <p class="text-gray-600">Register your restaurant as a merchant to expand your business. Obtain licenses, choose
                a payment processor, set up a merchant account, and explore.</p>
        </div>
        <div class="text-center">
            <img src="image/select-plan.png" alt="Select Plan" class="mx-auto mb-4">
            <h3 class="text-xl font-semibold mb-2">Select Plan</h3>
            <p class="text-gray-600">Subscription-based inventory management software can help track inventory levels,
                automate reordering, and manage ingredient costs.</p>
        </div>
        <div class="text-center">
            <img src="image/StartDeliver.png" alt="Start Delivering" class="mx-auto mb-4">
            <h3 class="text-xl font-semibold mb-2">Start Delivering</h3>
            <p class="text-gray-600">Decide on the geographic radius within which you are willing to offer delivery.
                Consider factors such as distance, logistics, and customer density.</p>
        </div>
    </div>

    <!-- Special Menu -->
    <section class="py-20">
        <div class="container mx-auto px-4 py-12">
            <h1 class="text-4xl font-bold text-center mb-12">Special Menu</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($specialMenuItems as $item)
                    <!-- Pizza Card -->
                    <div class=" bg-white rounded-2xl p-6 shadow-lg">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                            class="w-full h-48 object-cover rounded-xl mb-4">
                        <h2 class="text-2xl font-semibold mb-2">{{ $item->name }}</h2>
                        <p class="text-gray-500 mb-6 text-sm">{{ $item->description }}</p>
                        <p class="text-gray-800 font-bold">Price: {{ $item->price }}</p>
                        {{-- <button
                            class="w-full bg-orange-500 text-white py-3 px-6 rounded-lg hover:bg-orange-600 transition-colors">
                            Order Now
                        </button> --}}
                    </div>
                @endforeach
            </div>
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


    {{-- <div class="bg-gray-100">
        <div class="container mx-auto px-4 py-8">
            <div class="relative flex">
                <h2 class="text-3xl font-bold mb-6">Featured Restaurants</h2>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($restaurantss as $restaurant)
                    <a href="{{ route('restaurant.show', $restaurant->id) }}" class="block">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ asset('/storage/Uploaded_Images/' . $restaurant->feature_image) }}"
                                class="w-full h-48 object-cover" alt="Restaurant Logo" />

                            <div class="p-4">
                                <h3 class="text-xl font-semibold mb-2">{{ $restaurant->restaurant_name }}</h3>
                                <p class="text-gray-600 text-sm">{{ $restaurant->restaurant_type }}</p>
                                <p class="text-gray-600 text-sm">{{ $restaurant->service_type }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div> --}}
@endsection
