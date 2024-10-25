@extends('layouts.seller')

@section('title', 'Add Items')

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Page Heading -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Add Items</h1>
            <a href="{{ route('menu.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back</a>
        </div>

        <!-- Displaying Menu ID -->
        <p class="text-xl">Menu ID: {{ $menuId }}</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Items List Section -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-blue-600 mb-4">Items List</h2>

                <!-- Search Form -->
                <form method="GET" action="{{ route('menu.addItems') }}" class="flex gap-2 mb-4">
                    <input type="text" name="search" placeholder="Search" aria-label="Search items"
                        class="w-full p-2 border rounded mb-4">
                    <button type="submit"
                        class="bg-blue-500 flex justify-center items-center text-sm text-white h-10 w-28  rounded">Search</button>
                </form>

                <!-- Items List -->
                <div class="space-y-4">
                    @forelse ($addOnItems as $item)
                        <div class="flex items-center justify-between bg-gray-50 p-3 rounded">
                            <div class="flex items-center space-x-3">
                                <!-- Item Image -->
                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }} image"
                                    class="w-12 h-12 rounded-full">
                                <!-- Item Details -->
                                <div>
                                    <h3 class="font-semibold text-blue-600">{{ $item->name }}</h3>
                                    <p class="text-gray-600">${{ number_format($item->price, 2) }}</p>
                                </div>
                            </div>
                            <!-- Add Button -->
                            <form action="{{ route('menu.addItem', $item->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="menu_id" value="{{ $menuId }}">
                                <button type="submit" aria-label="Add item"
                                    class="bg-blue-500 text-white p-2 h-8 w-8 rounded flex justify-center">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-gray-600">No items available to add.</p>
                    @endforelse
                </div>
            </div>

            <!-- Added Items Section -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-blue-600 mb-4">Added Items</h2>

                <div class="space-y-4">
                    @forelse ($addedItems as $addedItem)
                        <div class="flex items-center justify-between bg-gray-50 p-3 rounded">
                            <div class="flex items-center space-x-3">
                                <!-- Added Item Image -->
                                <img src="{{ Storage::url($addedItem->item->image) }}"
                                    alt="{{ $addedItem->item->name }} image" class="w-12 h-12 rounded-full">
                                <!-- Added Item Details -->
                                <div>
                                    <h3 class="font-semibold text-blue-600">{{ $addedItem->item->name }}</h3>
                                    <p class="text-gray-600">${{ number_format($addedItem->item->price, 2) }}</p>
                                </div>
                            </div>
                            <!-- Remove Button -->
                            <form action="{{ route('menu.removeItem', $addedItem->item->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="menu_id" value="{{ $menuId }}">
                                <button type="submit" aria-label="Remove item"
                                    class="bg-red-500 text-white p-2 h-8 w-8 rounded flex justify-center">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-gray-600">No items added yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
