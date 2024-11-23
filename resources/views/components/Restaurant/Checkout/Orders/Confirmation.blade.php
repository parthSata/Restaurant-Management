@extends('layouts.restaurant')

@section('title', $restaurants->restaurant_name)

@section('content')

    <div class="min-h-screen bg-gray-50 p-6">
        <div class="max-w-3xl mx-auto">
            <!-- Header -->
            <h1 class="text-4xl font-bold text-center mb-2">Checkout</h1>


            <!-- Success Message -->
            <div class="text-center mb-12">
                <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-semibold text-orange-500">Order Booked Successfully!</h2>
            </div>

            <!-- Order Details -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <div class="space-y-4">
                    <div class="flex justify-between py-2 border-b">
                        <span class="font-medium">Order ID</span>
                        <span>{{ $orders->order_id }}</span>
                    </div>

                    @foreach ($orders->items as $item)
                        <div class="flex justify-between py-2 border-b">
                            <span class="font-medium">{{ $item->name }} ({{ $item->quantity }})</span>
                            <span>${{ number_format($item->price, 2) }}</span>
                        </div>
                    @endforeach

                    <div class="flex justify-between py-2 border-b">
                        <span class="font-medium">Subtotal</span>
                        <span>${{ number_format($orders->subtotal, 2) }}</span>
                    </div>

                    <div class="flex justify-between py-2 border-b font-semibold">
                        <span>Total</span>
                        <span>${{ number_format($orders->subtotal, 2) }}</span>
                    </div>

                    <div class="grid grid-cols-2 gap-4 py-2">
                        <div>
                            <h3 class="font-medium mb-1">Payment Status</h3>
                            <p class="text-gray-600">{{ $orders->payment_status }}</p>
                        </div>
                        <div>
                            <h3 class="font-medium mb-1">Payment Type</h3>
                            <p class="text-gray-600">{{ $orders->order_type }}</p>
                        </div>
                    </div>

                    <div class="py-2">
                        <h3 class="font-medium mb-1">Delivery Address</h3>
                        <p class="text-gray-600">{{ $orders->delivery_address }}</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-center gap-4">
                {{-- <a href="{{ route('order.details', ['order' => $orders->id]) }}"
                    class="px-6 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors">
                    View Details
                </a> --}}
                <a href="{{ url('/customer/restaurant/' . $restaurants->slug . '/menu') }}"
                    class="px-6 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors">
                    Back to Menu
                </a>
            </div>
        </div>
    </div>

@endsection
