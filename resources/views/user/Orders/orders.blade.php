@extends('layouts.customer')

@section('title', 'Orders')

@section('content')

    <div class="p-6 max-w-[1400px] mx-auto">
        <!-- Search Bar -->
        <div class="mb-6">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="search"
                    class="w-full md:w-80 pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Search">
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-lg">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ORDER ID
                            <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ORDER DATE
                            <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ORDER
                            STATUS</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ORDER TYPES
                            <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            PAYMENT STATUS
                            <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            RESTAURANTS
                            <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <!-- Row 1 -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex px-3 py-1 text-sm font-medium bg-[#6366F1] text-white rounded-md">234016</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="bg-blue-100 text-blue-800 rounded-md px-3 py-1 text-sm">
                                <div>04:18 AM</div>
                                <div>02-10-2024</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex px-3 py-1 text-sm rounded-md bg-blue-100 text-blue-800">Processing</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex px-3 py-1 text-sm rounded-md bg-[#818CF8] text-white">Pickup</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex px-3 py-1 text-sm rounded-md bg-green-100 text-green-800">Paid</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img src="/placeholder.svg" alt="Restaurant logo" class="w-10 h-10 rounded-full mr-3">
                                <div>
                                    <div class="text-[#6366F1] font-medium">SPICE GARDEN RESTAURANT</div>
                                    <div class="text-gray-500 text-sm">spicygarden12@gmail.com</div>
                                </div>
                            </div>
                        </td>
                    </tr>
            </table>
        </div>
    </div>

@endsection
