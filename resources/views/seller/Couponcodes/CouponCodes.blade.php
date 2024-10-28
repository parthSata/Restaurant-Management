<?php

use Carbon\Carbon; // Add this line at the top of your file

?>
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
                <a href="{{ route('couponcodes.create') }}"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-300">
                    Add Coupon Code
                </a>
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
                        @foreach ($couponCodes as $coupon)
                            <tr class="border-t border-gray-200">
                                <td class="py-4 pr-4">{{ $coupon->coupon_name }}</td>
                                <td class="py-4 pr-4">{{ $coupon->discount }}</td>
                                <td class="py-4 pr-4">{{ $coupon->min_order_amount }}</td>
                                <td class="py-4 pr-4">
                                    {{ $coupon->expiry_date ? Carbon::parse($coupon->expiry_date)->format('d-m-Y') : 'NA' }}
                                </td>
                                <td class="py-4 pr-4"><span
                                        class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-sm">{{ $coupon->coupon_option }}</span>
                                </td>
                                <td class="py-4 pr-4">{{ $coupon->limit_user ?? 'N/A' }}</td>
                                <td class="py-4 pr-4"><span
                                        class="{{ $coupon->status == 'Publish' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} px-2 py-1 rounded-full text-sm">{{ $coupon->status }}</span>
                                </td>
                                <td class="py-4">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('couponcodes.edit', $coupon->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('couponcodes.destroy', $coupon->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
