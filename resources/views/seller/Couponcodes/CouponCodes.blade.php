@extends('layouts.seller')

@section('title', 'Coupon Codes')

@section('content')

    <div class="container mx-auto p-6 bg-gray-50">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <div class="relative flex-grow mr-4">
                    <input type="text" placeholder="Search"
                        class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <div class="absolute left-3 top-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-300">
                    Add Coupon Code
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="text-left text-gray-500 text-sm">
                            <th class="pb-4 pr-4">NAME</th>
                            <th class="pb-4 pr-4">DISCOUNT</th>
                            <th class="pb-4 pr-4">MIN ORDER AMOUNT</th>
                            <th class="pb-4 pr-4">EXPIRY DATE</th>
                            <th class="pb-4 pr-4">OPTION STATUS</th>
                            <th class="pb-4 pr-4">LIMIT USER</th>
                            <th class="pb-4 pr-4">STATUS</th>
                            <th class="pb-4">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t border-gray-200">
                            <td class="py-4 pr-4">GaryMclaughlin</td>
                            <td class="py-4 pr-4">$1,000.00</td>
                            <td class="py-4 pr-4">$5000.00</td>
                            <td class="py-4 pr-4"><span
                                    class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-sm">NA</span></td>
                            <td class="py-4 pr-4"><span
                                    class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">Unlimited for
                                    users</span></td>
                            <td class="py-4 pr-4"><span
                                    class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-sm">N/A</span></td>
                            <td class="py-4 pr-4"><span
                                    class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Publish</span></td>
                            <td class="py-4">
                                <div class="flex space-x-2">
                                    <button class="text-indigo-600 hover:text-indigo-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200">
                            <td class="py-4 pr-4">HOTELTULSI</td>
                            <td class="py-4 pr-4">$500.00</td>
                            <td class="py-4 pr-4">$1500.00</td>
                            <td class="py-4 pr-4"><span
                                    class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm">30-09-2023</span></td>
                            <td class="py-4 pr-4"><span
                                    class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">Unlimited for
                                    users</span></td>
                            <td class="py-4 pr-4"><span
                                    class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-sm">N/A</span></td>
                            <td class="py-4 pr-4"><span
                                    class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Publish</span></td>
                            <td class="py-4">
                                <div class="flex space-x-2">
                                    <button class="text-indigo-600 hover:text-indigo-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200">
                            <td class="py-4 pr-4">UNIVERSITY20</td>
                            <td class="py-4 pr-4">10%</td>
                            <td class="py-4 pr-4">$200.00</td>
                            <td class="py-4 pr-4"><span
                                    class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm">31-12-2023</span></td>
                            <td class="py-4 pr-4"><span
                                    class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">Unlimited for
                                    users</span></td>
                            <td class="py-4 pr-4"><span
                                    class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-sm">N/A</span></td>
                            <td class="py-4 pr-4"><span
                                    class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Publish</span></td>
                            <td class="py-4">
                                <div class="flex space-x-2">
                                    <button class="text-indigo-600 hover:text-indigo-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200">
                            <td class="py-4 pr-4">REWARDS20</td>
                            <td class="py-4 pr-4">20%</td>
                            <td class="py-4 pr-4">$3500.00</td>
                            <td class="py-4 pr-4"><span
                                    class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm">31-12-2023</span></td>
                            <td class="py-4 pr-4"><span
                                    class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">Unlimited for
                                    users</span></td>
                            <td class="py-4 pr-4"><span
                                    class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-sm">N/A</span></td>
                            <td class="py-4 pr-4"><span
                                    class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Publish</span></td>
                            <td class="py-4">
                                <div class="flex space-x-2">
                                    <button class="text-indigo-600 hover:text-indigo-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
