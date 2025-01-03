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

        <!-- Food Categories Slider -->
        <div class="container mx-auto px-4 py-8">
            <div class="swiper-container overflow-hidden">
                <div class="swiper-wrapper flex flex-row gap-5 items-center justify-center">
                    @foreach ($categories as $category)
                        <!-- Category Slide -->
                        <div class="swiper-slide flex flex-col items-center justify-center">
                            <div
                                class="w-24 h-24 md:w-32 md:h-32 rounded-full bg-white shadow-lg p-2 flex items-center justify-center">
                                <img src="{{ asset('storage/' . $category->image ?? 'placeholder.svg') }}"
                                    alt="{{ $category->name }}" class="w-full h-full rounded-full object-contain">
                            </div>
                            <h3 class="text-center text-sm md:text-md font-medium text-gray-800 mt-2">
                                {{ $category->name }}
                            </h3>
                        </div>
                    @endforeach
                </div>
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
                            <button
                                class="w-full bg-orange-500 text-white py-3 px-6 rounded-lg hover:bg-orange-600 transition-colors">
                                Order Now
                            </button>
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

        {{-- Reservation --}}
        {{-- <div class="min-h-screen flex items-center justify-center p-4">
            <div class="w-full max-w-6xl relative overflow-hidden rounded-2xl">
                <!-- Background Image -->
                <div class="absolute inset-0">
                    <img src="{{ asset('assets/reservation-bg.png') }}" alt="Restaurant Interior"
                        class="w-full h-full object-cover">
                </div>

                <!-- Orange Overlay with Rough Edge Effect -->
                <div class="relative flex flex-col md:flex-row">
                    <div class="bg-orange-500 p-8 md:p-12 lg:p-16 md:w-1/2 text-white relative">
                        <div class="max-w-md">
                            <h2 class="text-sm font-semibold tracking-wider mb-4">RESERVATION</h2>
                            <h1 class="text-4xl md:text-5xl font-bold mb-8">Book A Table For You</h1>

                            <form class="space-y-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Total Person Input -->
                                    <div class="relative">
                                        <input type="number"
                                            class="w-full bg-transparent border-b border-white/50 py-2 text-white placeholder-white/70 focus:outline-none focus:border-white"
                                            placeholder="Total Person">
                                    </div>

                                    <!-- Expected Date Input -->
                                    <div class="relative">
                                        <input type="date"
                                            class="w-full bg-transparent border-b border-white/50 py-2 text-white placeholder-white/70 focus:outline-none focus:border-white"
                                            placeholder="Expected Date">
                                    </div>
                                </div>

                                <!-- Expected Time Input -->
                                <div class="relative">
                                    <input type="time"
                                        class="w-full bg-transparent border-b border-white/50 py-2 text-white placeholder-white/70 focus:outline-none focus:border-white"
                                        placeholder="Expected Time">
                                </div>

                                <!-- Submit Button -->
                                <button type="submit"
                                    class="mt-8 bg-white text-orange-500 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                                    Book a Table
                                </button>
                            </form>
                        </div>

                        <!-- Decorative Edge -->
                        <div class="absolute -right-8 top-0 bottom-0 w-8 transform -skew-x-6 bg-orange-500"></div>
                    </div>

                    <!-- Right side spacer -->
                    <div class="md:w-1/2"></div>
                </div>
            </div>
        </div> --}}


        <div class="container mx-auto px-4 py-12">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8 lg:gap-12">
                <!-- Left Section -->
                <div class="lg:w-1/3">
                    <h2 class="text-3xl lg:text-4xl font-bold mb-4">
                        <span class="text-3xl lg:text-4xl font-bold mb-4">Outdoor Dining</span>
                    </h2>
                    <p class="text-gray-600 leading-relaxed">
                        Outdoor dining provides an opportunity to connect with nature. You can enjoy the beauty of
                        trees, flowers, or even a view of the cityscape or waterfront, depending on the location. This
                        connection to nature can enhance your overall dining experience and create a sense of
                        relaxation.
                    </p>
                </div>

                <!-- Center Image -->
                <div class="lg:w-1/3 flex  justify-center">
                    <div class="relative">
                        <div class="w-64 h-64 bg-orange-500 rounded-full"></div>
                        <img src="{{ asset('assets/delivery.png') }}" alt="Delivery Person"
                            class="absolute top-1/2 left-1/2 transform h-full -translate-x-1/2 -translate-y-1/2 w-56">
                    </div>
                </div>

                <!-- Right Section -->
                <div class="lg:w-1/3 text-right">
                    <h2 class="text-3xl lg:text-4xl font-bold mb-4">
                        Gluten-Free and Vegan Options
                    </h2>
                    <p class="text-gray-600 leading-relaxed">
                        Outdoor dining provides an opportunity to connect with nature. You can enjoy the beauty of
                        trees, flowers, or even a view of the cityscape or waterfront, depending on the location. This
                        connection to nature can enhance your overall dining experience and create a sense of
                        relaxation.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 5, // Number of items visible at once
                spaceBetween: 20, // Space between items
                loop: true, // Infinite loop
                autoplay: { // Automatic sliding
                    delay: 2000, // Delay in milliseconds (2 seconds)
                    disableOnInteraction: false, // Continue autoplay after manual interaction
                },
                speed: 2000, // Transition speed in milliseconds
                // grabCursor: true, // Show grab cursor on hover
                breakpoints: {
                    640: {
                        slidesPerView: 2
                    }, // Small screens
                    768: {
                        slidesPerView: 3
                    }, // Medium screens
                    1024: {
                        slidesPerView: 5
                    }, // Large screens
                }
            });
        });
    </script>



@endsection
