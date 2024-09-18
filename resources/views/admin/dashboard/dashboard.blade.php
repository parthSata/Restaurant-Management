@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="">
        <div class="container mx-auto p-4">
            <!-- Top Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                <div class="bg-blue-500 text-white p-4 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class="fas fa-video text-2xl"></i>
                        <span class="text-2xl font-bold">$ 67,887.95</span>
                    </div>
                    <p class="text-sm mt-2">Total Sales</p>
                </div>
                <div class="bg-green-500 text-white p-4 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class="fas fa-utensils text-2xl"></i>
                        <span class="text-2xl font-bold">37</span>
                    </div>
                    <p class="text-sm mt-2">Total Restaurants</p>
                </div>
                <div class="bg-yellow-500 text-white p-4 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class="fas fa-users text-2xl"></i>
                        <span class="text-2xl font-bold">33</span>
                    </div>
                    <p class="text-sm mt-2">Total Customers</p>
                </div>
                <div class="bg-blue-400 text-white p-4 rounded-lg">
                    <div class="flex justify-between items-center">
                        <i class="fas fa-user-plus text-2xl"></i>
                        <span class="text-2xl font-bold">37</span>
                    </div>
                    <p class="text-sm mt-2">Total Subscriptions</p>
                </div>
            </div>

            <!-- Order Cards -->
            <div class="flex w-full flex-row justify-between gap-6">
                <div class="flex flex-col w-full ">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="bg-white p-4 rounded-lg shadow">
                            <div class="flex justify-between items-center">
                                <i class="fas fa-home text-gray-500 text-2xl"></i>
                                <span class="text-2xl font-bold text-gray-700">0</span>
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
                        <ul>
                            <li class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-red-500 rounded-full mr-3"></div>
                                    <span>Spicy Garden Restaurant</span>
                                </div>
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">4.5</span>
                            </li>
                            <!-- Add more restaurant items here -->
                        </ul>
                    </div>

                </div>
                <div class=" gap-4">
                    
                    <div class="bg-white p-4 rounded-lg shadow h-full">
                        <h2 class="text-lg font-semibold mb-4">Top Customers</h2>
                        <ul>
                            <li class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gray-300 rounded-full mr-3"></div>
                                    <span>Mr Customer</span>
                                </div>
                                <span class="text-gray-500">$250.00</span>
                            </li>
                            <li class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gray-300 rounded-full mr-3"></div>
                                    <span>Mr Customer</span>
                                </div>
                                <span class="text-gray-500">$250.00</span>
                            </li>
                            <li class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gray-300 rounded-full mr-3"></div>
                                    <span>Mr Customer</span>
                                </div>
                                <span class="text-gray-500">$250.00</span>
                            </li>
                            <li class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gray-300 rounded-full mr-3"></div>
                                    <span>Mr Customer</span>
                                </div>
                                <span class="text-gray-500">$250.00</span>
                            </li>
                            <!-- Add more customer items here -->
                        </ul>
                        <h3 class="text-lg font-semibold mt-4 mb-2">Recent Transactions</h3>
                        <ul>
                            <li class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-red-500 rounded-full mr-3"></div>
                                    <span>Spicy Garden Restaurant</span>
                                </div>
                                <span class="text-gray-500">$32.00</span>
                            </li>
                            <li class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-red-500 rounded-full mr-3"></div>
                                    <span>Spicy Garden Restaurant</span>
                                </div>
                                <span class="text-gray-500">$32.00</span>
                            </li>
                            <li class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-red-500 rounded-full mr-3"></div>
                                    <span>Spicy Garden Restaurant</span>
                                </div>
                                <span class="text-gray-500">$32.00</span>
                            </li>
                            <li class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-red-500 rounded-full mr-3"></div>
                                    <span>Spicy Garden Restaurant</span>
                                </div>
                                <span class="text-gray-500">$32.00</span>
                            </li>
                            <li class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-red-500 rounded-full mr-3"></div>
                                    <span>Spicy Garden Restaurant</span>
                                </div>
                                <span class="text-gray-500">$32.00</span>
                            </li>
                            <!-- Add more transaction items here -->
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Popular Restaurants and Top Customers -->
        </div>

    </div>
    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Sales',
                    data: [180, 10, 0, 550, 550, 650, 0, 0, 0, 0, 10, 20],
                    borderColor: 'rgb(255, 159, 64)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endsection
