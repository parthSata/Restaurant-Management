@extends('layouts.admin')

@section('title', 'Add Coupon Codes')

@section('content')

    <div class="">
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Add Coupon Code</h1>
                <a href="/admin/couponsa"
                    class="px-4 py-2 text-sm font-medium text-blue-600 bg-blue-100 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Back
                </a>
            </div>

            <form action="{{ route('coupons.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="couponName" class="block text-sm font-medium text-gray-700 mb-1">
                            Coupon Name: <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="couponName" name="couponName" placeholder="Coupon Name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                            value="{{ old('couponName') }}">
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
                            value="{{ old('expiryDate') }}">
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
                                <option value="fixed" class="bg-blue-100"
                                    {{ old('couponType') == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                <option value="percentage" {{ old('couponType') == 'percentage' ? 'selected' : '' }}>
                                    Percentage</option>
                            </select>
                            @error('couponType')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="discount" class="block text-sm font-medium text-gray-700 mb-1">
                            Discount: <span class="text-red-500">*</span>
                        </label>
                        <div class="flex">
                            <input type="number" id="discount" name="discount" placeholder="Discount"
                                class="w-full px-3 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring-1 focus:ring-blue-500"
                                value="{{ old('discount') }}">
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
                                <option value="draft" class="bg-blue-100"
                                    {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>Publish</option>
                            </select>
                            @error('status')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Save
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
