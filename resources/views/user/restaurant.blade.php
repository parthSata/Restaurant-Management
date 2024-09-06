<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Restaurant Page')

@section('content')

    <main class="container mx-auto px-4 py-8 ">
        <div class="">
            <h1 class="text-4xl font-bold font- text-center mb-8">Restaurants
            </h1>
        </div>

        <div class="flex justify-center mb-8">
            <div class="relative w-full max-w-xl">
                <input type="text" placeholder="Search here..."
                    class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                <button class="absolute right-0 top-0 mt-2 mr-3">
                    <i class="fas fa-search text-gray-400"></i>
                </button>
            </div>
            <button
                class="ml-4 px-4 py-2 bg-white border border-gray-300 rounded-full text-gray-700 hover:bg-gray-100 transition duration-300">
                <i class="fas fa-filter mr-2"></i>Filter
            </button>
            <button
                class="ml-4 px-4 py-2 bg-green-100 text-green-800 rounded-full hover:bg-green-200 transition duration-300">
                <i class="fas fa-leaf mr-2"></i>Pure Veg
            </button>
            {{-- <button class="ml-4 px-4 py-2 bg-red-100 text-red-800 rounded-full hover:bg-red-200 transition duration-300">
                <i class="fas fa-drumstick-bite mr-2"></i>Non Veg
            </button> --}}
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- SPICE GARDEN RESTAURANT -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="image/Har_Bhole_Restaurant.jpeg" alt="SPICE GARDEN RESTAURANT" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">Har Bhole Restaurant</h2>
                    <p class="text-gray-600 text-sm mb-4">
                        "Authentic Indian food with Variety of Taste and pleasure environment for peace of your mind. Health
                        watering food includes chaats, sandwich..."
                    </p>
                </div>
            </div>

            <!-- Tulsi Hotel -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="image/Gajanan.jpeg" alt="Tulsi Hotel" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">Gajanan Resort</h2>
                    <p class="text-gray-600 text-sm mb-4">
                        Located near a train station, Hotel Tulsi is a great choice for a stay in Surat. Free perks include
                        WiFi, self parking, and buffet breakfast daily bet...
                    </p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="image/UrbanRestro.jpg" alt="Cake Heaven Commune" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">Tulsi Hotel</h2>
                    <p class="text-gray-600 text-sm mb-4">
                        At Cake Heaven Commune, our cakes and desserts are more than just food: they're a source of joy,
                        celebration, and nostalgia. We pour our heart and s...
                    </p>
                </div>
            </div>
        </div>
    </main>

@endsection
