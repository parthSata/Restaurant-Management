@extends('layouts.admin')

@section('title', 'Coupon Codes')

@section('content')

    <div class="">
        <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <form method="GET" action="{{ route('coupons.index') }}" class="relative flex-grow max-w-sm mr-4">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search"
                        class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500" />
                    <div class="absolute left-3 top-2 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </form>

                <a href="{{ route('coupons.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Add Coupon Code
                </a>
            </div>

            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-600 border-b">
                        <th class="pb-3">NAME</th>
                        <th class="pb-3">COUPON TYPE</th>
                        <th class="pb-3">DISCOUNT</th>
                        <th class="pb-3">EXPIRY DATE</th>
                        <th class="pb-3">STATUS</th>
                        <th class="pb-3">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($coupons as $coupon)
                        <tr class="border-b">
                            <td class="py-3">{{ $coupon->name }}</td>
                            <td>
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">
                                    {{ ucfirst($coupon->type) }}
                                </span>
                            </td>
                            <td>{{ $coupon->type == 'percentage' ? $coupon->discount . '%' : '$' . number_format($coupon->discount, 2) }}
                            </td>
                            <td>
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-sm">
                                    {{ \Carbon\Carbon::parse($coupon->expiry_date)->format('d-m-Y') }}
                                </span>
                            </td>
                            <td>
                                <span
                                    class="bg-{{ $coupon->status == 'draft' ? 'blue' : 'green' }}-100 text-{{ $coupon->status == 'draft' ? 'blue' : 'green' }}-800 px-2 py-1 rounded text-sm">
                                    {{ ucfirst($coupon->status) }}
                                </span>
                            </td>
                            <td class="flex items-center flex-row">
                                <a href="{{ route('coupons.edit', $coupon->id) }}"
                                    class="text-blue-500 hover:text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </a>
                                <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this coupon?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">No Coupons Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
