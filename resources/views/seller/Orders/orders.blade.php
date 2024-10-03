@extends('layouts.seller')

@section('title', 'Orders')

@section('content')

    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <div class="relative flex-grow mr-4">
                    <input type="text" placeholder="Search"
                        class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <button class="bg-indigo-600 text-white p-2 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z">
                        </path>
                    </svg>
                </button>
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
                    <tr class="border-b">
                        <td class="py-4"><span
                                class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full text-sm">234016</span></td>
                        <td class="py-4"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">04:18
                                AM<br>02-10-2024</span></td>
                        <td class="py-4">
                            <select class="border rounded px-2 py-1 text-gray-700">
                                <option>Processing</option>
                            </select>
                        </td>
                        <td class="py-4"><span
                                class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-sm">Pickup</span></td>
                        <td class="py-4"><span
                                class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Paid</span></td>
                        <td class="py-4">
                            <div class="flex items-center">
                                <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Customer"
                                    class="w-8 h-8 rounded-full mr-2">
                                <div>
                                    <div class="font-medium text-indigo-600">Mr. Customer</div>
                                    <div class="text-sm text-gray-500">customer@restaurant.com</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-4"><span
                                class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full text-sm">883669</span></td>
                        <td class="py-4"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">09:02
                                PM<br>23-09-2024</span></td>
                        <td class="py-4">
                            <select class="border rounded px-2 py-1 text-gray-700">
                                <option>Processing</option>
                            </select>
                        </td>
                        <td class="py-4"><span
                                class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-sm">Pickup</span></td>
                        <td class="py-4"><span
                                class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Paid</span></td>
                        <td class="py-4">
                            <div class="flex items-center">
                                <img src="https://randomuser.me/api/portraits/men/2.jpg" alt="Customer"
                                    class="w-8 h-8 rounded-full mr-2">
                                <div>
                                    <div class="font-medium text-indigo-600">Mr. Customer</div>
                                    <div class="text-sm text-gray-500">customer@restaurant.com</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-4"><span
                                class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full text-sm">236234</span></td>
                        <td class="py-4"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">07:59
                                AM<br>10-06-2024</span></td>
                        <td class="py-4">
                            <select class="border rounded px-2 py-1 text-gray-700">
                                <option>Processing</option>
                            </select>
                        </td>
                        <td class="py-4"><span
                                class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">Delivery</span></td>
                        <td class="py-4"><span
                                class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Paid</span></td>
                        <td class="py-4">
                            <div class="flex items-center">
                                <img src="https://randomuser.me/api/portraits/men/3.jpg" alt="Customer"
                                    class="w-8 h-8 rounded-full mr-2">
                                <div>
                                    <div class="font-medium text-indigo-600">Mr. Customer</div>
                                    <div class="text-sm text-gray-500">customer@restaurant.com</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-4"><span
                                class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full text-sm">288295</span></td>
                        <td class="py-4"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">08:24
                                AM<br>02-01-2024</span></td>
                        <td class="py-4">
                            <select class="border rounded px-2 py-1 text-gray-700">
                                <option>Processing</option>
                            </select>
                        </td>
                        <td class="py-4"><span
                                class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-sm">Pickup</span></td>
                        <td class="py-4"><span
                                class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Paid</span></td>
                        <td class="py-4">
                            <div class="flex items-center">
                                <img src="https://randomuser.me/api/portraits/men/4.jpg" alt="Customer"
                                    class="w-8 h-8 rounded-full mr-2">
                                <div>
                                    <div class="font-medium text-indigo-600">Mr. Customer</div>
                                    <div class="text-sm text-gray-500">customer@restaurant.com</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-4"><span
                                class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full text-sm">491415</span></td>
                        <td class="py-4"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">12:05
                                AM<br>17-11-2023</span></td>
                        <td class="py-4">
                            <select class="border rounded px-2 py-1 text-gray-700">
                                <option>Processing</option>
                            </select>
                        </td>
                        <td class="py-4"><span
                                class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">Delivery</span></td>
                        <td class="py-4"><span
                                class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Paid</span></td>
                        <td class="py-4">
                            <div class="flex items-center">
                                <img src="https://randomuser.me/api/portraits/men/5.jpg" alt="Customer"
                                    class="w-8 h-8 rounded-full mr-2">
                                <div>
                                    <div class="font-medium text-indigo-600">Mr. Customer</div>
                                    <div class="text-sm text-gray-500">customer@restaurant.com</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-4"><span
                                class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full text-sm">535313</span></td>
                        <td class="py-4"><span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">01:23
                                PM<br>01-11-2023</span></td>
                        <td class="py-4">
                            <select class="border rounded px-2 py-1 text-gray-700">
                                <option>Processing</option>
                            </select>
                        </td>
                        <td class="py-4"><span
                                class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">Delivery</span></td>
                        <td class="py-4"><span
                                class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Paid</span></td>
                        <td class="py-4">
                            <div class="flex items-center">
                                <img src="https://randomuser.me/api/portraits/men/6.jpg" alt="Customer"
                                    class="w-8 h-8 rounded-full mr-2">
                                <div>
                                    <div class="font-medium text-indigo-600">Mr. Customer</div>
                                    <div class="text-sm text-gray-500">customer@restaurant.com</div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
