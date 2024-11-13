@extends('layouts.restaurant')

@section('title', $restaurants->name)

@section('content')

    <div class="">
        <main class="container mx-auto px-4 py-8">
            <h1 class="text-5xl font-bold text-center mb-12">Menu for {{ $restaurants->restaurant_name }}</h1>

            <div class="flex flex-col md:flex-row gap-8">
                <!-- Sidebar -->
                <div class="md:w-1/4">
                    <div class="bg-white p-4 rounded-lg shadow-md mb-4">
                        <h2 class="text-lg font-semibold mb-2">Categories</h2>
                        <ul class="space-y-2">
                            <li>
                                <a href="javascript:void(0);" onclick="filterCategory('all')"
                                    class="text-orange-500 font-semibold">All</a>
                            </li>
                            @foreach ($categories as $category)
                                <li>
                                    <a href="javascript:void(0);" onclick="filterCategory('{{ $category->name }}')"
                                        class="text-gray-600 hover:text-orange-500">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- Main Content -->

                <div class="md:w-2/4">
                    @foreach ($categories as $category)
                        <div class="category-section" data-category="{{ $category->name }}" style="display: none;">
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
                                                onclick="addToCart({{ $item->id }}, '{{ $item->name }}', {{ $item->price }}, '{{ asset('storage/' . $item->image) }}')"
                                                class="bg-white text-orange-500 border border-orange-500 px-4 py-2 rounded hover:bg-orange-500 hover:text-white transition">
                                                +ADD
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Cart -->
                <div class="md:w-1/4">
                    <div class="bg-white p-6 rounded-lg shadow-md w-80">
                        <h1 class="text-2xl font-bold mb-1">Cart</h1>
                        <p id="itemCount" class="text-gray-500 text-sm mb-4">0 ITEMS</p>

                        <div id="cartItemsContainer"></div>

                        <div class="border-t pt-4">
                            <div class="flex justify-between mb-1">
                                <span class="font-semibold">Sub Total</span>
                                <span id="cartSubtotal" class="font-semibold">$ 0.00</span>
                            </div>
                            <p class="text-gray-500 text-xs mb-4">Extra charges may apply</p>
                        </div>

                        <button
                            onclick="window.location.href='{{ route('checkout', ['slug' => $restaurants->restaurant_slug]) }}'"
                            class="w-full bg-orange-500 text-white py-3 rounded-lg font-semibold hover:bg-orange-600 transition duration-300">
                            Checkout
                        </button>
                    </div>
                </div>
            </div>
        </main>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                filterCategory('all');
            });

            // Function to filter items by category
            function filterCategory(category) {
                const sections = document.querySelectorAll('.category-section');

                sections.forEach(section => {
                    if (category === 'all' || section.getAttribute('data-category') === category) {
                        section.style.display = 'block';
                    } else {
                        section.style.display = 'none';
                    }
                });
            }


            let cartItems = [];
            let cartSubtotal = 0;

            function addToCart(id, name, price, image) {
                let existingItem = cartItems.find(item => item.id === id);
                if (existingItem) {
                    existingItem.quantity++;
                } else {
                    cartItems.push({
                        id,
                        name,
                        price,
                        image,
                        quantity: 1
                    });
                }

                updateCart();
            }

            function updateCart() {
                const cartItemsContainer = document.getElementById('cartItemsContainer');
                cartItemsContainer.innerHTML = '';
                cartSubtotal = 0;

                cartItems.forEach(item => {
                    const itemTotal = item.price * item.quantity;
                    cartSubtotal += itemTotal;

                    const cartItem = document.createElement('div');
                    cartItem.classList.add('flex', 'items-center', 'mb-4');

                    cartItem.innerHTML = `
                        <img src="${item.image}" alt="${item.name}" class="w-12 h-12 rounded-full mr-4">
                        <div class="flex-grow">
                            <h2 class="font-semibold">${item.name}</h2>
                            <div class="flex items-center mt-1">
                                <button onclick="changeQuantity(${item.id}, -1)" class="bg-gray-200 text-gray-600 w-8 h-8 rounded-full flex items-center justify-center">-</button>
                                <span class="mx-2">${item.quantity}</span>
                                <button onclick="changeQuantity(${item.id}, 1)" class="bg-gray-200 text-gray-600 w-8 h-8 rounded-full flex items-center justify-center">+</button>
                            </div>
                        </div>
                        <span class="font-semibold">$ ${itemTotal.toFixed(2)}</span>
                    `;
                    cartItemsContainer.appendChild(cartItem);
                });

                // Update subtotal and item count
                document.getElementById('cartSubtotal').innerText = `$ ${cartSubtotal.toFixed(2)}`;
                document.getElementById('itemCount').innerText = `${cartItems.length} ITEM${cartItems.length !== 1 ? 'S' : ''}`;
            }

            function changeQuantity(id, change) {
                const item = cartItems.find(item => item.id === id);
                if (item) {
                    item.quantity += change;
                    if (item.quantity <= 0) {
                        cartItems = cartItems.filter(i => i.id !== id);
                    }
                    updateCart();
                }
            }
        </script>
    </div>
@endsection
