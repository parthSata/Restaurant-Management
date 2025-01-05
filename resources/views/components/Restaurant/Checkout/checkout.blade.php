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
                            <div class="bg-gray-50 p-4 rounded-lg flex justify-between items-center mb-4 address-card"
                                data-address-id="{{ $address->id }}">
                                <div class="flex items-start">
                                    <div class="ml-3">
                                        <h3 class="font-semibold">{{ $address->address }}</h3>
                                        <p class="text-gray-600 text-sm">{{ $address->city }}, {{ $address->zip_code }}</p>
                                    </div>
                                </div>
                                <button class="bg-[#ff5722] text-white px-4 py-2 rounded-lg hover:bg-[#f4511e] deliver-button"
                                    onclick="selectAddress(this)">
                                    Deliver Here
                                </button>
                            </div>
                        @empty
                            <p class="text-gray-600">You have no saved addresses. Add one below.</p>
                        @endforelse

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
                        @if (session('error'))
                            <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                @endauth
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h3 class="font-bold text-xl mb-4">Your Cart</h3>
                    <div class="space-y-4">
                        @foreach ($cart as $item)
                            <div class="flex justify-between items-center">
                                <div class="flex gap-2 items-center">
                                    {{-- <div class="">
                                        <img src="{{ $item['image'] ?? asset('storage/addOnItems/default.jpg') }}"
                                            alt="{{ $item['name'] }}" class="w-16 h-16 rounded-full object-cover" />
                                    </div> --}}
                                    <div class="flex flex-col">
                                        <p class="text-gray-700 font-medium">{{ $item['name'] }}</p>
                                        <p class="text-gray-500 text-sm">Qty: {{ $item['quantity'] }}</p>
                                    </div>
                                </div>
                                <p class="text-gray-600">{{ $item['price'] }}</p>
                            </div>
                        @endforeach
                    </div>
                    <hr class="my-4">
                    <div class="space-y-4">
                        <h3 class="font-bold text-xl mb-4">Select Payment Method</h3>
                        <form action="{{ route('checkout.process', ['slug' => $restaurants->restaurant_slug]) }}"
                            method="POST" id="paymentForm">
                            @csrf
                            <input type="hidden" name="slug" value="{{ $restaurants->restaurant_slug }}">
                            <div class="space-y-2">
                                <label class="flex items-center space-x-3">
                                    <input type="radio" name="payment_method" onclick="togglePaymentGateway('razorpay')"
                                        value="razorpay" required>
                                    <span class="text-gray-700">Razorpay</span>
                                </label>
                                <label class="flex items-center space-x-3">
                                    <input type="radio" onclick="togglePaymentGateway('cod')" name="payment_method"
                                        value="cod" required>
                                    <span class="text-gray-700">Cash on Delivery (COD)</span>
                                </label>
                            </div>
                            <hr class="my-4">
                            <button type="submit" id="checkoutButton"
                                class="w-full bg-[#ff5722] text-white px-6 py-2 rounded-lg hover:bg-[#f4511e]">Checkout</button>
                        </form>

                    </div>
                    {{-- <!-- Coupon -->
                    <div class="border border-dashed border-gray-300 rounded-lg p-4 mb-6">
                        <div class="flex gap-2">
                            <input type="text" placeholder="Apply Coupon"
                                class="flex-1 bg-gray-50 rounded px-4 py-2" />
                            <button class="bg-orange-500 text-white px-6 py-2 rounded hover:bg-orange-600">
                                Apply
                            </button>
                        </div>
                    </div> --}}

                    <!-- Bill Details -->
                    <div class="space-y-4">
                        <h3 class="font-semibold text-lg">Bill Details</h3>
                        <div class="space-y-2 text-gray-600">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Item Total</span>
                                <span>{{ number_format($itemTotal, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Delivery Fee</span>
                                <span>{{ number_format($deliveryFee, 2) }}</span>
                            </div>
                            <div class="h-px bg-orange-600 my-2"></div>
                            <div class="flex justify-between font-semibold text-black">
                                <span class="text-gray-600">To Pay</span>
                                <span>{{ number_format($toPay, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </main>
    <script>
        var restaurantName = @json($restaurants->restaurant_name);
        var razorpayKey = @json($razorpayOrder['key']);
        var razorpayOrderId = @json($razorpayOrder['id']);

        function togglePaymentGateway(method) {
            if (method === 'razorpay') {
                // Set up Razorpay payment
                var options = {
                    key: 'rzp_test_uKarYDqSoNLovi', // Replace with your Razorpay API Key
                    amount: 10000, // Amount in paise (e.g., ₹100 = 10000 paise)
                    currency: "INR",
                    name: restaurantName,
                    description: "Order Payment",
                    order_id: razorpayOrderId, // Razorpay order ID
                    handler: function(response) {
                        fetch("{{ route('payment.handle') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    razorpay_payment_id: response.razorpay_payment_id,
                                    razorpay_order_id: response.razorpay_order_id,
                                    razorpay_signature: response.razorpay_signature
                                })
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    window.location.href =
                                        "{{ route('order.confirmation', ['slug' => $restaurants->restaurant_slug]) }}";
                                } else {
                                    console.log("Payment Failed. Try again.");
                                }
                            })
                            .catch(err => {
                                console.error("Error:", err);
                                console.log("Payment Failed. Try again.");
                            });
                    },
                    theme: {
                        color: "#3399cc",
                    },
                };

                var rzp = new Razorpay(options);
                rzp.open();
            } else {
                // Adjust UI for COD if needed
                console.log('Cash on Delivery selected');
            }
        }

        document.getElementById('checkoutButton').addEventListener('click', function() {
            const selectedMethod = document.querySelector('input[name="payment_method"]:checked').value;
            if (selectedMethod === 'razorpay') {
                const razorpayOptions = {
                    "key": "{{ $razorpayOrder['key'] }}",
                    "amount": "{{ $razorpayOrder['amount'] }}",
                    "currency": "{{ $razorpayOrder['currency'] }}",
                    "order_id": "{{ $razorpayOrder['id'] }}",
                    "handler": function(response) {
                        document.getElementById('paymentForm')
                            .submit(); // Submit the form after successful payment
                    },
                    "theme": {
                        "color": "#ff5722"
                    }
                };
                const rzp = new Razorpay(razorpayOptions);
                rzp.open();
            } else {
                document.getElementById('paymentForm').submit(); // Submit the form directly for COD
            }
        });


        function selectAddress(button) {
            document.querySelectorAll('.address-card').forEach(card => {
                card.classList.remove('bg-green-100');
                const btn = card.querySelector('.deliver-button');
                btn.textContent = 'Deliver Here';
            });

            const parentCard = button.closest('.address-card');
            parentCard.classList.add('bg-green-100');
            button.textContent = 'Selected';

            const addressId = parentCard.getAttribute('data-address-id');

            // Send AJAX request to update the selected address
            fetch(`/set-selected-address`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                    },
                    body: JSON.stringify({
                        address_id: addressId
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Address selected successfully');
                    } else {
                        console.error('Failed to update selected address');
                    }
                });
        }
    </script>
@endsection
