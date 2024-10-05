@extends('layouts.admin')

@section('title', 'Transactions ')

@section('content')

    <div class="">
        <div class=" mx-auto bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <form action="{{ route('transactions.index') }}" method="GET" class="relative flex-grow max-w-md">
                    <input type="text" name="search" value="{{ old('search', $search) }}"
                        placeholder="Search by Transaction ID"
                        class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </form>
                <button class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                    </svg>
                </button>
            </div>

            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-500 border-b">
                        <th class="pb-3 font-medium">TRANSACTION ID</th>
                        <th class="pb-3 font-medium">DATE</th>
                        <th class="pb-3 font-medium">PAYMENT GATEWAYS</th>
                        <th class="pb-3 font-medium">AMOUNT</th>
                        <th class="pb-3 font-medium">PAYMENT STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr class="border-b">
                            <td class="py-3">
                                <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">
                                    {{ $transaction->transaction_id }}
                                </span>
                            </td>
                            <td>
                                <span class="bg-blue-100  px-2 py-1 rounded text-sm">
                                    {{ $transaction->created_at->format('h:i A') }}<br>{{ $transaction->created_at->format('d-m-Y') }}
                                </span>
                            </td>
                            <td>{{ $transaction->payment_gateway }}</td>
                            <td>${{ number_format($transaction->amount, 2) }}</td>
                            <td>
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm">
                                    {{ ucfirst($transaction->payment_status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
