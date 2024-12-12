@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="">
        <div class="container mx-auto p-4">
            <!-- Top Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4">
                <div class="bg-blue-500 text-white p-4 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class="fas fa-video text-2xl"></i>
                        <span class="text-2xl font-bold">${{ number_format($totalSales, 2) }}</span>
                    </div>
                    <p class="text-sm mt-2">Total Sales</p>
                </div>
                <div class="bg-green-500 text-white p-4 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class="fas fa-utensils text-2xl"></i>
                        <span class="text-2xl font-bold">{{ $totalRestaurants }}</span>
                    </div>
                    <p class="text-sm mt-2">Total Restaurants</p>
                </div>
                <div class="bg-yellow-500 text-white p-4 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class="fas fa-users text-2xl"></i>
                        <span class="text-2xl font-bold">{{ $totalCustomers }}</span>
                    </div>
                    <p class="text-sm mt-2">Total Customers</p>
                </div>
            </div>

            <!-- Order Cards -->
            <div class="flex w-full flex-wrap flex-row justify-between gap-6">
                <div class="flex flex-col  w-full ">
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
                                <span class="text-2xl font-bold text-gray-700">0</span>
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
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full border-collapse border border-gray-200 rounded-lg">
                                <thead class="bg-gray-100 text-left">
                                    <tr>
                                        <th class="px-4 py-2 text-gray-600">RESTAURANTS</th>
                                        <th class="px-4 py-2 text-gray-600 text-right">ORDERS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($popularRestaurants as $restaurant)
                                        <tr class="border-b border-gray-200">
                                            <td class="flex items-center gap-4">
                                                <!-- Restaurant Logo -->
                                                <img src="{{ asset('/storage/Uploaded_Images/' . $restaurant->logo) }}"
                                                    alt="Restaurant Logo"
                                                    class="flex-shrink-0 ml-4 rounded-full h-10 w-10" />
                                                <!-- Restaurant Name -->
                                                <span
                                                    class="font-medium text-gray-700">{{ $restaurant->restaurant_name }}</span>
                                            </td>
                                            <td class="px-4 py-3 text-right">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-sm font-semibold px-3 py-1 rounded-lg">
                                                    {{ $restaurant->orders_count }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="grid grid-row shadow-lg w-full gap-6">
                    <!-- Top Customers -->
                    <div class=" bg-white rounded-lg p-6 shadow-sm">
                        <h2 class="text-lg font-semibold mb-4">Top Customers</h2>
                        <div class="space-y-4">
                            @foreach ($topCustomers as $customer)
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <!-- Display customer's image (fallback to placeholder if no image) -->
                                        <img src="{{ $customer->image_url ? asset('storage/' . $customer->image_url) : '/placeholder.svg' }}"
                                            alt="{{ $customer->name }}" class="w-10 h-10 rounded-full" />
                                        <span class="text-gray-700">{{ $customer->full_name }}</span>
                                    </div>
                                    <span class="text-gray-600">${{ number_format($customer->subtotal, 2) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Recent Transactions -->
                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <h2 class="text-lg font-semibold mb-4 w-full">Recent Transactions</h2>
                        <div class="space-y-4">
                            @foreach ($recentTransactions as $transaction)
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <!-- Restaurant image (fallback to placeholder if no image) -->
                                        <img src="{{ $transaction->restaurant->image_url ? asset('storage/' . $transaction->restaurant->image_url) : '/placeholder.svg' }}"
                                            alt="{{ $transaction->restaurant->name }}" class="w-10 h-10 rounded" />
                                        <div>
                                            <div class="font-medium">{{ $transaction->restaurant->name }}</div>
                                            <div class="text-sm text-gray-500">Order #{{ $transaction->id }}</div>
                                        </div>
                                    </div>
                                    <span class="text-gray-600">${{ number_format($transaction->subtotal, 2) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

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
