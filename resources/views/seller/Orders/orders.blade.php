@extends('layouts.seller')

@section('title', 'Orders')

@section('content')

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <div class="relative flex-grow mr-4">
                    <form method="GET" action="{{ route('orders.index') }}"> 
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search by Customer Name"
                            class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </form>
                </div>
            </div>

            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-500 border-b">
                        <th class="pb-3 font-medium">
                            ORDER ID
                            <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </th>
                        <th class="pb-3 font-medium">
                            ORDER DATE
                            <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </th>
                        <th class="pb-3 font-medium">ORDER STATUS</th>
                        <th class="pb-3 font-medium">
                            ORDER TYPES
                            <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </th>
                        <th class="pb-3 font-medium">
                            PAYMENT STATUS
                            <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </th>
                        <th class="pb-3 font-medium">
                            CUSTOMER
                            <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="border-b">
                            <td class="py-4">
                                <span class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full text-sm">
                                    {{ $order->order_id }}
                                </span>
                            </td>
                            <td class="py-4">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">
                                    {{ $order->created_at->format('h:i A') }}<br>
                                    {{ $order->created_at->format('d-m-Y') }}
                                </span>
                            </td>
                            <td class="py-4">
                                <select class="border rounded px-2 py-1 text-gray-700">
                                    <option>{{ $order->order_status }}</option>
                                </select>
                            </td>
                            <td class="py-4">
                                <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-sm">
                                    {{ $order->order_type }}
                                </span>
                            </td>
                            <td class="py-4">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">
                                    {{ $order->payment_status }}
                                </span>
                            </td>
                            <td class="py-4">
                                <div class="flex items-center">
                                    <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Customer"
                                        class="w-8 h-8 rounded-full mr-2">
                                    <div>
                                        <div class="font-medium text-indigo-600">
                                            {{ $order->customer->name ?? 'N/A' }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $order->customer->email ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
