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

    <div class="bg-gray-100">
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Customer's Favourite Home</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Butter Milk -->
                <div class="bg-white rounded-t-[80px] rounded-b-lg w-[250px] shadow-md p-4 flex flex-col items-center">
                    <img src="image/Butte-milk.png" alt="Butter Milk" class="w-40 h-40 object-cover rounded-full mb-4">
                    <h3 class="text-xl font-semibold mb-1">Butter Milk</h3>
                    <p class="text-sm text-gray-500 mb-2">SPICE GARDEN RE...</p>
                    <p class="text-lg font-bold mb-4">$ 20</p>
                    <button
                        class="bg-yellow-400 text-gray-800 px-6 py-2 rounded-full font-semibold hover:bg-yellow-500 transition duration-300">Order
                        Now</button>
                </div>

                <!-- Veggie Delight -->
                <div class="bg-white rounded-t-[80px] rounded-b-lg w-[250px] shadow-md p-4 flex flex-col items-center">
                    <img src="image/Veggie-Delight.png" alt="Veggie Delight"
                        class="w-40 h-40 object-cover rounded-full mb-4">
                    <h3 class="text-xl font-semibold mb-1">Veggie Delight ...</h3>
                    <p class="text-sm text-gray-500 mb-2">Mr.Chef Fast Fo...</p>
                    <p class="text-lg font-bold mb-4">$ 250</p>
                    <button
                        class="bg-yellow-400 text-gray-800 px-6 py-2 rounded-full font-semibold hover:bg-yellow-500 transition duration-300">Order
                        Now</button>
                </div>

                <!-- Greek Salad -->
                <div class="bg-white rounded-t-[80px] rounded-b-lg w-[250px] shadow-md p-4 flex flex-col items-center">
                    <img src="image/greeksalad.png" alt="Greek Salad" class="w-40 h-40 object-cover rounded-full mb-4">
                    <h3 class="text-xl font-semibold mb-1">Greek Salad</h3>
                    <p class="text-sm text-gray-500 mb-2">Been House</p>
                    <p class="text-lg font-bold mb-4">$ 250</p>
                    <button
                        class="bg-yellow-400 text-gray-800 px-6 py-2 rounded-full font-semibold hover:bg-yellow-500 transition duration-300">Order
                        Now</button>
                </div>

                <!-- Chicken Curry -->
                <div class="bg-white rounded-t-[80px] rounded-b-lg w-[250px] shadow-md p-4 flex flex-col items-center">
                    <img src="image/CheeseBurger.png" alt="Chicken Curry" class="w-40 h-40 object-cover rounded-full mb-4">
                    <h3 class="text-xl font-semibold mb-1">Cheese Burger</h3>
                    <p class="text-sm text-gray-500 mb-2">Nibble Bites Ca...</p>
                    <p class="text-lg font-bold mb-4">$ 300</p>
                    <button
                        class="bg-yellow-400 text-gray-800 px-6 py-2 rounded-full font-semibold hover:bg-yellow-500 transition duration-300">Order
                        Now</button>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-100">
        <div class="container mx-auto px-4 py-8">
            <div class="relative flex">
                <h2 class="text-3xl font-bold mb-6">Featured Restaurants</h2>
            </div>
            {{-- 
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Static Restaurant 1 -->
                <a href="{{ route('restaurant.show', 1) }}" class="block">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="image/Har_Bhole_Restaurant.jpeg" alt="Har Bhole Restaurant" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-semibold mb-2">Har Bhole Restaurant</h3>
                            <p class="text-gray-600 text-sm">Authentic Indian food with a variety of tastes and a pleasant environment.</p>
                        </div>
                    </div>
                </a>

                <!-- Static Restaurant 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="image/Gajanan.jpeg" alt="Gajanan Resort" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">Gajanan Resort</h3>
                        <p class="text-gray-600 text-sm">A peaceful retreat with luxurious amenities and natural surroundings.</p>
                    </div>
                </div>

                <!-- Static Restaurant 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="image/UrbanRestro.jpg" alt="Tulsi Hotel" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">Tulsi Hotel</h3>
                        <p class="text-gray-600 text-sm">Offering quality ingredients and fast, friendly service.</p>
                    </div>
                </div>
            </div> --}}

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($restaurants as $restaurant)
                    <a href="{{ route('restaurant.show', $restaurant->id) }}" class="block">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ $restaurant->feature_image }}" alt="{{ $restaurant->restaurant_name }}"
                                class="w-full h-48 object-cover">
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
    </div>
@endsection
