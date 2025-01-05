@extends('layouts.seller')

@section('title', 'Transactions')

@section('content')


    <div class="container mx-auto p-6 bg-gray-50">
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="flex justify-between items-center ">
                <form method="GET" action="{{ route('transaction.index') }}"> <!-- Update route name if different -->
                    <div class="relative flex-grow mr-4">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search by Order ID, Type, or Status"
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
                </form>

            </div>
        </div>
        <table class="min-w-full mt-4">
            <thead>
                <tr class="text-left text-gray-500 text-sm">
                    <th class="pb-4">TRANSACTION ID</th>
                    <th class="pb-4">ORDER DATE</th>
                    <th class="pb-4">PAYMENT GATEWAYS</th>
                    <th class="pb-4">AMOUNT</th>
                    <th class="pb-4">PAYMENT STATUS</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t border-gray-200">
                    <td class="py-4"><span
                            class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm font-medium">COD618147</span>
                    </td>
                    <td><span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-lg text-sm">04:18
                            AM<br>02-10-2024</span></td>
                    <td>COD</td>
                    <td>$20.00</td>
                    <td><span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Paid</span>
                    </td>
                </tr>
                <tr class="border-t border-gray-200">
                    <td class="py-4"><span
                            class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm font-medium">COD990217</span>
                    </td>
                    <td><span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-lg text-sm">09:02
                            PM<br>23-09-2024</span></td>
                    <td>COD</td>
                    <td>$330.00</td>
                    <td><span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Paid</span>
                    </td>
                </tr>
                <!-- Add more rows here following the same structure -->
            </tbody>
        </table>
    </div>
    </div>


@endsection
