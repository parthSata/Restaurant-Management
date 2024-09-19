@extends('layouts.admin')

@section('title', 'Transactions ')

@section('content')

    <div class="">
        <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <div class="mb-4">
                    <input type="text" placeholder="Search"
                        class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <th class="px-6 py-3">User Name</th>
                                <th class="px-6 py-3">Plan Name</th>
                                <th class="px-6 py-3">Plan Price</th>
                                <th class="px-6 py-3">Payable Amount</th>
                                <th class="px-6 py-3">Start Date</th>
                                <th class="px-6 py-3">End Date</th>
                                <th class="px-6 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">Ada Danner</td>
                                <td class="px-6 py-4 whitespace-nowrap">Ultimate</td>
                                <td class="px-6 py-4 whitespace-nowrap">$ 349.00</td>
                                <td class="px-6 py-4 whitespace-nowrap">$ 349.00</td>
                                <td class="px-6 py-4 whitespace-nowrap"><span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">03-06-2024</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap"><span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">03-07-2024</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap"><span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                                </td>
                            </tr>
                            <tr class="bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">Bhautik Bhalala</td>
                                <td class="px-6 py-4 whitespace-nowrap">Basic</td>
                                <td class="px-6 py-4 whitespace-nowrap">$ 99.00</td>
                                <td class="px-6 py-4 whitespace-nowrap">$ 99.00</td>
                                <td class="px-6 py-4 whitespace-nowrap"><span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">06-05-2024</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap"><span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">05-06-2024</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap"><span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Rejected</span>
                                </td>
                            </tr>
                            <!-- Add more rows here following the same pattern -->
                        </tbody>
                    </table>
                </div>
                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center space-x-2">
                        <label for="rows-per-page" class="text-sm text-gray-600">Show</label>
                        <select id="rows-per-page" class="border border-gray-300 rounded px-2 py-1 text-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="px-3 py-1 bg-blue-500 text-white rounded">‹</button>
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded">1</span>
                        <button class="px-3 py-1 bg-blue-500 text-white rounded">2</button>
                        <button class="px-3 py-1 bg-blue-500 text-white rounded">›</button>
                    </div>
                </div>

                <!-- Showing Results -->
                <div class="text-sm text-gray-600 mt-2">
                    Showing 1 to 10 of 12 Results
                </div>
            </div>
        </div>
    </div>

@endsection
