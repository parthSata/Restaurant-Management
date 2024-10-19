@extends('layouts.seller')

@section('title', 'Add Items')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Add Items</h1>
            <a href="{{ route('menu.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Back</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Items List -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-blue-600 mb-4">Items List</h2>
                <form method="GET" action="{{ route('menu.addItems') }}">
                    <input type="text" name="search" placeholder="Search" class="w-full p-2 border rounded mb-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
                </form>

                <div class="space-y-4">
                    @forelse ($addOnItems as $item)
                        <div class="flex items-center justify-between bg-gray-50 p-3 rounded">
                            <div class="flex items-center space-x-3">
                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}"
                                    class="w-12 h-12 rounded-full">
                                <div>
                                    <h3 class="font-semibold text-blue-600">{{ $item->name }}</h3>
                                    <p class="text-gray-600">${{ number_format($item->price, 2) }}</p>
                                </div>
                            </div>

                            <form action="{{ route('menu.addItem', $item->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="menu_id" value="{{ $menuId }}">
                                <!-- Pass menu_id in the form -->
                                <button type="submit"
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

            <!-- Added Items -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-blue-600 mb-4">Added Items</h2>

                <div class="space-y-4">
                    @forelse ($addedItems as $item)
                        <div class="flex items-center justify-between bg-gray-50 p-3 rounded">
                            <div class="flex items-center space-x-3">
                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}"
                                    class="w-12 h-12 rounded-full">
                                <div>
                                    <h3 class="font-semibold text-blue-600">{{ $item->name }}</h3>
                                    <p class="text-gray-600">${{ number_format($item->price, 2) }}</p>
                                </div>
                            </div>
                            <form action="{{ route('menu.removeItem', $item->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="menu_id" value="{{ $menuId }}">
                                <button type="submit"
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
