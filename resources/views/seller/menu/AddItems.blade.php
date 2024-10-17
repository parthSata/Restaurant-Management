@extends('layouts.seller')

@section('title', 'Menu')

@section('content')

    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Add Items</h1>
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Back</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Items List -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-blue-600 mb-4">Items List</h2>
                <input type="text" placeholder="Search" class="w-full p-2 border rounded mb-4">

                <div class="space-y-4">
                    <div class="flex items-center justify-between bg-gray-50 p-3 rounded">
                        <div class="flex items-center space-x-3">
                            <img src="/placeholder.svg?height=50&width=50" alt="Butter Milk" class="w-12 h-12 rounded-full">
                            <div>
                                <h3 class="font-semibold text-blue-600">Butter Milk</h3>
                                <p class="text-gray-600">$20.00</p>
                            </div>
                        </div>
                        <button class="bg-blue-500 text-white p-2 rounded-full">+</button>
                    </div>
                    <!-- More items would be added here, following the same structure -->
                </div>
            </div>

            <!-- Added Items -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-blue-600 mb-4">Added Items</h2>

                <div class="space-y-4">
                    <div class="flex items-center justify-between bg-gray-50 p-3 rounded">
                        <div class="flex items-center space-x-3">
                            <img src="/placeholder.svg?height=50&width=50" alt="Jalebi and Fafda"
                                class="w-12 h-12 rounded-full">
                            <div>
                                <h3 class="font-semibold text-blue-600">Jalebi and Fafda</h3>
                                <p class="text-gray-600">$160.00</p>
                            </div>
                        </div>
                        <button class="bg-red-500 text-white p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <!-- More added items would go here, following the same structure -->
                </div>
            </div>
        </div>
    </div>

@endsection
