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

        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse ($restaurants as $restaurant)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <a href="{{ route('restaurant.show', ['id' => $restaurant->id]) }}" class="block">
                        <img src="{{ asset('storage/Uploaded_Images/' . $restaurant->feature_image) }}"
                            alt="{{ $restaurant->restaurant_name }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2">{{ $restaurant->restaurant_name }}</h2>
                            <p class="text-gray-600 text-sm mb-4">{{ $restaurant->short_about }}</p>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-span-full text-center">
                    <p class="text-gray-600">No restaurants found.</p>
                </div>
            @endforelse
        </div>  
    </main>

@endsection
