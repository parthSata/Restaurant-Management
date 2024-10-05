@extends('layouts.admin')

@section('title', 'Add Coupon Codes')

@section('content')

    <div class="">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Add Coupon Code</h1>
                <a href="/admin/coupons"
                    class="px-4 py-2 text-sm font-medium text-blue-600 bg-blue-100 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Back
                </a>
            </div>

            <form action="{{ isset($coupon) ? route('coupons.update', $coupon->id) : route('coupons.store') }}"
                method="POST">
                @csrf
                @if (isset($coupon))
                    @method('PUT') <!-- Use PUT method for update -->
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="couponName" class="block text-sm font-medium text-gray-700 mb-1">
                            Coupon Name: <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="couponName" name="couponName" placeholder="Coupon Name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                            value="{{ old('couponName', isset($coupon) ? $coupon->name : '') }}">
                        @error('couponName')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="expiryDate" class="block text-sm font-medium text-gray-700 mb-1">
                            Expiry Date: <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="expiryDate" name="expiryDate" placeholder="Expiry Date"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                            value="{{ old('expiryDate', isset($coupon) ? $coupon->expiry_date : '') }}">
                        @error('expiryDate')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="couponType" class="block text-sm font-medium text-gray-700 mb-1">
                            Coupon Type: <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select id="couponType" name="couponType"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option value="">Select Coupon Type</option>
                                @foreach ($couponTypes as $type)
                                    <option value="{{ $type }}"
                                        {{ old('couponType', isset($coupon) ? $coupon->type : '') == $type ? 'selected' : '' }}>
                                        {{ ucfirst($type) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('couponType')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="discount" class="block text-sm font-medium text-gray-700 mb-1">
                            Discount: <span class="text-red-500">*</span>
                        </label>
                        <div class="flex">
                            <input type="number" id="discount" name="discount" placeholder="Discount"
                                class="w-full px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                                value="{{ old('discount', isset($coupon) ? $coupon->discount : '') }}">
                            <span
                                class="inline-flex items-center px-3 py-2 border border-l-0 border-gray-300 bg-gray-100 text-gray-600 rounded-r-md">
                                %
                            </span>
                        </div>
                        @error('discount')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                            Status: <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <select id="status" name="status"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-1 focus:ring-blue-500">
                                <option value="">Select Status</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status }}"
                                        {{ old('status', isset($coupon) ? $coupon->status : '') == $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        {{ isset($coupon) ? 'Update' : 'Save' }} Coupon
                    </button>
                    <button type="button"
                        class="px-6 py-2 bg-gray-300 text-gray-700 font-medium rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        Discard
                    </button>
                </div>
            </form>

        </div>
    </div>

@endsection
