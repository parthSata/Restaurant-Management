@extends('layouts.seller')

@section('title', 'Coupon Codes')

@section('content')

    <div class="w-full mx-auto bg-white rounded-lg shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Add Coupon Code</h1>
            <a href="{{ route('couponcodes.index') }}"
                class="px-4 py-2 text-sm font-medium text-whitea bg-blue-600  border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Back
            </a>
        </div>
        <form class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="couponName" class="block text-sm font-medium text-gray-700">
                        Coupon Name: <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="couponName" name="couponName" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Coupon Name">
                </div>
                <div class="space-y-2">
                    <label for="expiryDate" class="block text-sm font-medium text-gray-700">
                        Expiry Date:
                    </label>
                    <input type="date" id="expiryDate" name="expiryDate"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Select Expiry Date">
                </div>
                <div class="space-y-2">
                    <label for="couponType" class="block text-sm font-medium text-gray-700">
                        Coupon Type: <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="couponType" name="couponType" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Coupon Type</option>
                            <option value="fixed">Fixed</option>
                            <option value="percentage">Percentage</option>
                        </select>

                    </div>
                </div>
                <div class="space-y-2">
                    <label for="daysAvailable" class="block text-sm font-medium text-gray-700">
                        Days Available: <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="daysAvailable" name="daysAvailable" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Days Available</option>
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                            <option value="sunday">Sunday</option>
                        </select>

                    </div>
                </div>
                <div class="space-y-2">
                    <label for="discount" class="block text-sm font-medium text-gray-700">
                        Discount: <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input type="text" name="discount" id="discount" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Fixed">
                        <span
                            class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                            %
                        </span>
                    </div>
                </div>
                <div class="space-y-2">
                    <label for="minOrderAmount" class="block text-sm font-medium text-gray-700">
                        Min Order Amount: <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="minOrderAmount" name="minOrderAmount" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Min Order Amount">
                </div>
                <div class="space-y-2">
                    <label for="couponOptions" class="block text-sm font-medium text-gray-700">
                        Coupon Options: <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="couponOptions" name="couponOptions" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Coupon Option</option>
                            <option value="unlimited">Unlimited for users</option>
                            <option value="once">Once per user</option>
                            <option value="new_user">Once for new user first order</option>
                            <option value="custom_limit">Custom limit per user</option>
                        </select>

                    </div>
                </div>
                <div class="space-y-2">
                    <label for="status" class="block text-sm font-medium text-gray-700">
                        Status: <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="status" name="status" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>

                    </div>
                </div>
            </div>
            <div class="flex justify-end space-x-4">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
                <button type="button"
                    class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Discard
                </button>
            </div>
        </form>
    </div>

@endsection
