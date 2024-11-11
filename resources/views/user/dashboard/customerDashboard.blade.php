@extends('layouts.customer')

@section('title', 'Dashboard')

@section('content')

    <div class="p-6 max-w-[1400px] mx-auto">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="bg-[#6366F1] text-white p-6 rounded-lg flex items-center justify-between">
                <div class="bg-white/20 p-3 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="text-4xl font-bold">34</div>
                    <div class="text-sm opacity-90">Total Orders</div>
                </div>  
            </div>

            <div class="bg-[#FFA500] text-white p-6 rounded-lg flex items-center justify-between">
                <div class="bg-white/20 p-3 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="text-4xl font-bold">0</div>
                    <div class="text-sm opacity-90">Total Cart Items</div>
                </div>
            </div>

            <div class="bg-[#0EA5E9] text-white p-6 rounded-lg flex items-center justify-between">
                <div class="bg-white/20 p-3 rounded-lg">
                    <svg class="w-6 h-6 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="text-4xl font-bold">30</div>
                    <div class="text-sm opacity-90">Processing</div>
                </div>
            </div>

            <div class="bg-[#10B981] text-white p-6 rounded-lg flex items-center justify-between">
                <div class="bg-white/20 p-3 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <div class="text-4xl font-bold">0</div>
                    <div class="text-sm opacity-90">Received</div>
                </div>
            </div>
        </div>

        <!-- Latest Orders -->
        <h2 class="text-xl font-semibold mb-4">Latest Orders</h2>
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ORDER ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            RESTAURANTS</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PRICE
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ORDER
                            TYPES</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ORDER
                            STATUS</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">TRACK
                            ORDER</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4">
                            <span class="text-[#6366F1]">#234016</span>
                            <div class="text-sm text-gray-500">1 month ago</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img src="/placeholder.svg" alt="Restaurant logo" class="w-10 h-10 rounded-full mr-3">
                                <span>SPICE GARDEN RESTAURANT</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-medium">$20.00</span>
                            <span
                                class="inline-flex ml-2 px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Paid</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-800">Pickup</span>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-800">Processing</span>
                        </td>
                        <td class="px-6 py-4">
                            <button class="text-blue-600 hover:text-blue-900">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                                    </path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
