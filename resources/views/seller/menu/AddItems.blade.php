@extends('layouts.seller')

@section('title', 'Menu')

@section('content')

    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Add Items</h1>
            <a href={{ route('menu.index') }} class="bg-blue-500 text-white px-4 py-2 rounded">Back</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Items List (Left Side) -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-blue-600 mb-4">Items List</h2>
                <input type="text" placeholder="Search" class="w-full p-2 border rounded mb-4">

                <div id="available-items" class="space-y-4">
                    @foreach ($addOnItems as $item)
                        <div class="flex items-center justify-between bg-gray-50 p-3 rounded" id="item-{{ $item->id }}">
                            <div class="flex items-center space-x-3">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                    class="w-12 h-12 rounded-full">
                                <div>
                                    <h3 class="font-semibold text-blue-600">{{ $item->name }}</h3>
                                    <p class="text-gray-600">${{ $item->price }}</p>
                                </div>
                            </div>
                            <button class="bg-blue-500 text-white p-2 rounded-full add-item" data-id="{{ $item->id }}"
                                data-name="{{ $item->name }}" data-price="{{ $item->price }}">
                                +
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Added Items (Right Side) -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-blue-600 mb-4">Added Items</h2>
                <div id="added-items" class="space-y-4">
                    <!-- This will be populated dynamically -->
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle adding items
            document.querySelectorAll('.add-item').forEach(button => {
                button.addEventListener('click', function() {
                    const itemId = this.getAttribute('data-id');
                    const itemName = this.getAttribute('data-name');
                    const itemPrice = this.getAttribute('data-price');

                    // Remove from left list
                    document.getElementById(`item-${itemId}`).remove();

                    // Add to right list
                    const addedItems = document.getElementById('added-items');
                    const newItem = document.createElement('div');
                    newItem.classList.add('flex', 'items-center', 'justify-between', 'bg-gray-50',
                        'p-3', 'rounded');
                    newItem.innerHTML = `
                <div class="flex items-center space-x-3">
                    <div>
                        <h3 class="font-semibold text-blue-600">${itemName}</h3>
                        <p class="text-gray-600">$${itemPrice}</p>
                    </div>
                </div>
                <button class="bg-red-500 text-white p-2 rounded-full remove-item" data-id="${itemId}">
                    Remove
                </button>
            `;
                    addedItems.appendChild(newItem);

                    // Attach event listener for removing items
                    newItem.querySelector('.remove-item').addEventListener('click', function() {
                        const id = this.getAttribute('data-id');
                        newItem.remove(); // Remove from right list
                        // Optionally, re-add the item back to the left list
                        document.getElementById('available-items').appendChild(document
                            .getElementById(`item-${id}`));
                    });
                });
            });
        });
    </script>

@endsection
