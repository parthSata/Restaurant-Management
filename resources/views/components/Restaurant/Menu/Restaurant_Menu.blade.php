@extends('layouts.restaurant')

@section('title', $restaurant->name)

@section('content')
    <div class="">
        <main class="container mx-auto px-4 py-8">
            <h1 class="text-5xl font-bold text-center mb-12">Menu for {{ $restaurant->name }}</h1>

            <div class="flex flex-col md:flex-row gap-8">
                <!-- Sidebar -->
                <div class="md:w-1/4">
                    <div class="bg-white p-4 rounded-lg shadow-md mb-4">
                        <h2 class="text-lg font-semibold mb-2">Categories</h2>
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('restaurant', ['id' => $restaurant->id]) }}"
                                    class="text-orange-500 font-semibold">All</a>
                            </li>
                            <p>Restaurant ID {{ $restaurant->id }}</p>
                            @foreach ($categories as $category)
                                <li>
                                    <a href="#{{ $category->name }}"
                                        class="text-gray-600 hover:text-orange-500">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="md:w-2/4">
                    @foreach ($categories as $category)
                        <div class="bg-white p-4 rounded-lg shadow-md mb-4">
                            <h2 id="{{ $category->name }}" class="text-xl font-semibold mb-4">{{ $category->name }}</h2>
                            <div class="space-y-6">
                                @foreach ($category->addOnItems as $item)
                                    <div class="flex items-center">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                            class="w-24 h-24 object-cover rounded-lg mr-4">
                                        <div class="flex-grow">
                                            <h3 class="text-lg font-semibold">{{ $item->name }}</h3>
                                            <p class="text-gray-600">${{ $item->price }}</p>
                                        </div>
                                        <button
                                            class="bg-white text-orange-500 border border-orange-500 px-4 py-2 rounded hover:bg-orange-500 hover:text-white transition">+ADD</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Cart -->
                <div class="md:w-1/4">
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold mb-4">Cart</h2>
                        <p class="text-gray-500 mb-4">0 ITEMS</p>
                        <div class="border-t pt-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-semibold">Sub Total</span>
                                <span class="font-semibold">$ 0.00</span>
                            </div>
                            <p class="text-sm text-gray-500">Extra charges may apply</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
