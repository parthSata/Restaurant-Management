@extends('layouts.restaurant')

@section('title', $restaurants->name)

@section('content')
    <div class="container mx-auto px-4 py-12 w-full">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-8 md:mb-0">
                <h1 class="text-5xl font-bold text-orange-500 mb-4">
                    {{ $restaurants->name }}
                </h1>
                <p class="text-gray-600 mb-6">
                    {{ $restaurants->description }}
                </p>
                <button class="bg-orange-500 text-white px-6 py-3 rounded-md hover:bg-orange-600">
                    Book a Table
                </button>
            </div>
            <div class="md:w-1/2 relative">
                <div
                    class="w-full h-96 bg-orange-500 rounded-full absolute top-0 right-0 z-0 transform translate-x-1/4 -translate-y-1/4">
                </div>
                <img src="{{ asset('images/' . $restaurants->image) }}" alt="{{ $restaurants->name }}" class="rounded-full" />
            </div>
        </div>
    </div>
@endsection
