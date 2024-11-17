@extends('layouts.restaurant')

@section('title', $restaurants->restaurant_name)

@section('content')

    <main class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-12">Checkout</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Checkout Steps -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Account Section -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="bg-[#ff5722] p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold">Account</h2>
                    </div>

                    @guest
                        <p class="text-gray-600 mb-4">To place your order now, log in to your existing account or sign up.</p>
                        <div class="flex space-x-4">
                            <a href="{{ route('login') }}"
                                class="border border-[#ff5722] text-[#ff5722] px-6 py-2 rounded-md hover:bg-[#ff5722] hover:text-white transition-colors">Log
                                In</a>
                            <span class="text-gray-500 flex items-center">or</span>
                            <a href="{{ route('register') }}"
                                class="bg-[#ff5722] text-white px-6 py-2 rounded-md hover:bg-[#f4511e]">Sign Up</a>
                        </div>
                    @else
                        <p class="text-gray-600">You're logged in as {{ $fullName }}.</p>
                    @endguest
                </div>

                <!-- Delivery Address Section -->
                @auth
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="bg-gray-200 p-2 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-semibold">Delivery Address</h2>
                        </div>
                        @forelse($addresses as $address)
                            <div class="bg-gray-50 p-4 rounded-lg flex justify-between items-center mb-4">
                                <div class="flex items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <div class="ml-3">
                                        <h3 class="font-semibold">Address</h3>
                                        <p class="text-gray-600 text-sm">{{ $address->address }}, {{ $address->city }},
                                            {{ $address->zip_code }}</p>
                                    </div>
                                </div>
                                <button class="bg-[#ff5722] text-white px-4 py-2 rounded-lg hover:bg-[#f4511e]">
                                    Deliver Here
                                </button>
                            </div>
                        @empty
                            <p class="text-gray-600">You have no saved addresses. Add one below.</p>
                        @endforelse


                        <!-- Address Form -->
                        <form method="POST" action="{{ route('delivery.store', ['slug' => $restaurants->restaurant_slug]) }}">
                            @csrf
                            <div class="space-y-4">
                                <input type="text" name="address" required placeholder="Enter your delivery address"
                                    class="w-full border border-gray-300 rounded-lg p-2">
                                <input type="text" name="city" required placeholder="City"
                                    class="w-full border border-gray-300 rounded-lg p-2">
                                <input type="text" name="zip_code" required placeholder="ZIP Code"
                                    class="w-full border border-gray-300 rounded-lg p-2">
                                <button type="submit"
                                    class="bg-[#ff5722] text-white px-6 py-2 rounded-md hover:bg-[#f4511e]">Save
                                    Address</button>
                            </div>
                        </form>
                    </div>
                @endauth

                <!-- Payment Section -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="bg-gray-200 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold">Payment</h2>
                    </div>
                </div>
            </div>

            <!-- Right Column - Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-lg shadow-sm">

                    <div class="border-t pt-4">
                        <h3 class="font-semibold mb-4">Bill Details</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Item Total</span>
                                <span>$ 20.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Delivery Fee | 45 Min.</span>
                                <span>$ 150.00</span>
                            </div>
                            <div class="flex justify-between border-t pt-2 font-semibold">
                                <span>To Pay</span>
                                <span>$ 170.00</span>
                            </div>
                        </div>
                        <!-- Payment Button -->
                        <button class="w-full mt-4 bg-[#ff5722] text-white px-6 py-2 rounded-md hover:bg-[#f4511e]">Proceed
                            to Pay</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
