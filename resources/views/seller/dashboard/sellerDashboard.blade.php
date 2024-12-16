@extends('layouts.seller')

@section('title', 'Dashboard')

@section('content')

    <div class="flex gap-6 flex-col">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Total Customers -->
            <div class="bg-indigo-600 rounded-lg p-6 flex justify-between items-center">
                <div>
                    <div class="text-4xl font-bold">{{ $totalCustomers }}</div>
                    <div class="text-sm">Total Customers</div>
                </div>
                <div class="bg-indigo-700 p-3 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>

            <!-- Processing Orders -->
            <div class="bg-emerald-600 rounded-lg p-6 flex justify-between items-center">
                <div>
                    <div class="text-4xl font-bold">{{ $processingOrders }}</div>
                    <div class="text-sm">Processing</div>
                </div>
                <div class="bg-emerald-700 p-3 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                        </path>
                    </svg>
                </div>
            </div>

            <!-- Ready For Delivery -->
            <div class="bg-yellow-500 rounded-lg p-6 flex justify-between items-center">
                <div>
                    <div class="text-4xl font-bold">{{ $readyForDeliveryOrders }}</div>
                    <div class="text-sm">Ready For Delivery</div>
                </div>
                <div class="bg-yellow-600 p-3 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                        </path>
                    </svg>
                </div>
            </div>

            <!-- Item On The Way -->
            <div class="bg-blue-500 rounded-lg p-6 flex justify-between items-center">
                <div>
                    <div class="text-4xl font-bold">{{ $onTheWayOrders }}</div>
                    <div class="text-sm">Item On The Way</div>
                </div>
                <div class="bg-blue-600 p-3 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0">
                        </path>
                    </svg>
                </div>
            </div>

            <!-- Delivered -->
            <div class="bg-[#FFFFFF] shadow-lg rounded-lg p-6 flex justify-between items-center">
                <div>
                    <div class="text-4xl font-bold">{{ $deliveredOrders }}</div>
                    <div class="text-sm">Delivered</div>
                </div>
                <div class="bg-white shadow-lg p-3 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                    </svg>
                </div>
            </div>

            <!-- Returned -->
            <div class="bg-red-500 rounded-lg p-6 flex justify-between items-center">
                <div>
                    <div class="text-4xl font-bold">{{ $returnedOrders }}</div>
                    <div class="text-sm">Returned</div>
                </div>
                <div class="bg-red-600 p-3 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z">
                        </path>
                    </svg>
                </div>
            </div>

            <!-- Cancelled -->
            <div class="bg-white shadow-lg rounded-lg p-6 flex justify-between items-center">
                <div>
                    <div class="text-4xl font-bold">{{ $cancelledOrders }}</div>
                    <div class="text-sm">Cancelled</div>
                </div>
                <div class="bg-gray-800 p-3 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </div>
            </div>

            <!-- Total Orders -->
            <div class="bg-indigo-500 rounded-lg p-6 flex justify-between items-center">
                <div>
                    <div class="text-4xl font-bold">{{ $totalOrders }}</div>
                    <div class="text-sm">Total Orders</div>
                </div>
                <div class="bg-indigo-600 p-3 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="flex w-full flex-wrap flex-row justify-between gap-6">
            <div class="flex flex-col w-full ">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div class="bg-white p-4 rounded-lg shadow">
                        <div class="flex justify-between items-center">
                            <i class="fas fa-home text-gray-500 text-2xl"></i>
                            <span class="text-2xl font-bold text-gray-700">{{ $orderReceived }}</span>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">Order Received</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow">
                        <div class="flex justify-between items-center">
                            <i class="fas fa-truck text-gray-500 text-2xl"></i>
                            <span class="text-2xl font-bold text-gray-700">{{ $todayDelivered ?? 0 }}</span>
                        </div>
                        <p class="text-sm text-gray-500 mt-2">Today Delivered</p>
                    </div>
                </div>

                <!-- Sales Overview -->
                <div class="bg-white rounded-lg p-6 shadow mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold">Sales Overview</h2>
                        <button class="p-2 bg-gray-100 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                            </svg>
                        </button>
                    </div>
                    <canvas id="salesChart" width="400" height="200"></canvas>
                </div>


                <div class="bg-white p-4 rounded-lg shadow">
                    <h2 class="text-lg font-semibold mb-4">Popular Restaurants</h2>
                    <ul>
                        @forelse ($popularRestaurants as $restaurant)
                            <li class="flex justify-between items-center mb-2">
                                <div class="flex gap-4 items-center">
                                    <img src="{{ asset('/storage/Uploaded_Images/' . $restaurant->logo) }}"
                                        alt="Restaurant Logo" class="flex-shrink-0 ml-4 rounded-full h-10 w-10" />
                                    <span>{{ $restaurant->restaurant_name }}</span>
                                </div>
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                    {{ $restaurant->orders_count }} Orders
                                </span>
                            </li>
                        @empty
                            <li>No popular restaurants available</li>
                        @endforelse
                    </ul>
                </div>

            </div>

            <div class="grid grid-row shadow-lg w-full gap-6">
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h2 class="text-lg font-semibold mb-4">Top Customers</h2>
                    <ul class="flex flex-col gap-4">
                        @foreach ($topCustomers as $customer)
                            <li class="flex gap-4 items-center">
                                <!-- Restaurant image (fallback to placeholder if no image) -->
                                <img src="{{ $customer->picture ? asset('storage/Uploaded_Images/' . $customer->picture) : asset('assets/images.jpeg') }}"
                                    alt="{{ $customer->full_name }}" class="w-10 h-10 rounded-full" />
                                <span class="font-semibold">{{ $customer->full_name }}</span>
                                - ${{ number_format($customer->subtotal, 2) }}
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="text-lg font-semibold mt-4 mb-2">Recent Transactions</h3>
                    <ul class="flex flex-col gap-4">
                        @foreach ($recentTransactions as $transaction)
                            <div class="flex items-center gap-4 justify-between">
                                <div class="flex items-center gap-3">
                                    <!-- Restaurant image (fallback to placeholder if no image) -->
                                    <img src="{{ $transaction->restaurant->feature_image ? asset('storage/Uploaded_Images/' . $transaction->restaurant->feature_image) : '/placeholder.svg' }}"
                                        alt="{{ $transaction->restaurant->restaurant_name }}"
                                        class="w-10 h-10 rounded-full" />
                                    <div>
                                        <div class="font-medium">{{ $transaction->restaurant->restaurant_name }}</div>
                                        <div class="text-sm text-gray-500">Order #{{ $transaction->id }}</div>
                                    </div>
                                </div>
                                <span class="text-gray-600">${{ number_format($transaction->subtotal, 2) }}</span>
                            </div>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <script>
        const salesData = @json($formattedSalesData);

        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Sales',
                    data: salesData,
                    borderColor: 'rgb(255, 159, 64)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        ticks: {
                            callback: function(value) {
                                return '$' + value;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
