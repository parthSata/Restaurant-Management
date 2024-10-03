@extends('layouts.seller')

@section('title', 'Dashboard')

@section('content')

    <div class="flex gap-6 flex-col">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Total Customers -->
            <div class="bg-indigo-600 rounded-lg p-6 flex justify-between items-center">
                <div>
                    <div class="text-4xl font-bold">6</div>
                    <div class="text-sm">Total Customers</div>
                </div>
                <div class="bg-indigo-700 p-3 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>

            <!-- Processing -->
            <div class="bg-emerald-600 rounded-lg p-6 flex justify-between items-center">
                <div>
                    <div class="text-4xl font-bold">32</div>
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
                    <div class="text-4xl font-bold">4</div>
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
                    <div class="text-4xl font-bold">3</div>
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
                    <div class="text-4xl font-bold">3</div>
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
                    <div class="text-4xl font-bold">2</div>
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
                    <div class="text-4xl font-bold">2</div>
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
                    <div class="text-4xl font-bold">49</div>
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
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">4.5</span>
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

    </div>

@endsection
