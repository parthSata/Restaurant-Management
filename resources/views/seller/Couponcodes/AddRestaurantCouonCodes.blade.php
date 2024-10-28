@extends('layouts.seller')

@section('title', 'Coupon Codes')

@section('content')

    <div class="w-full mx-auto bg-white rounded-lg shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">{{ isset($coupon) ? 'Edit' : 'Add' }} Coupon Code</h1>
            <a href="{{ route('couponcodes.index') }}"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Back
            </a>
        </div>
        <form class="space-y-6"
            action="{{ isset($coupon) ? route('couponcodes.update', $coupon->id) : route('couponcodes.store') }}"
            method="POST">
            @csrf
            @if (isset($coupon))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="couponName" class="block text-sm font-medium text-gray-700">
                        Coupon Name: <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="coupon_name" name="coupon_name" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('coupon_name', isset($coupon) ? $coupon->coupon_name : '') }}"
                        placeholder="Coupon Name">
                </div>

                <div class="space-y-2">
                    <label for="expiry_date" class="block text-sm font-medium text-gray-700">
                        Expiry Date: <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="expiry_date" name="expiry_date" required
                        min="{{ \Carbon\Carbon::today()->toDateString() }}"
                        value="{{ isset($coupon) ? $coupon->expiry_date : '' }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="space-y-2">
                    <label for="couponType" class="block text-sm font-medium text-gray-700">
                        Coupon Type: <span class="text-red-500">*</span>
                    </label>
                    <select id="coupon_type" name="coupon_type" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Coupon Type</option>
                        <option value="fixed"
                            {{ old('coupon_type', isset($coupon) ? $coupon->coupon_type : '') == 'fixed' ? 'selected' : '' }}>
                            Fixed
                        </option>
                        <option value="percentage"
                            {{ old('coupon_type', isset($coupon) ? $coupon->coupon_type : '') == 'percentage' ? 'selected' : '' }}>
                            Percentage
                        </option>
                    </select>
                </div>

                <div class="space-y-2 relative">
                    <label for="daysAvailable" class="block text-sm font-medium text-gray-700">
                        Days Available: <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <!-- Trigger button -->
                        <button type="button" id="dropdownToggle"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Select Available Days
                        </button>

                        <!-- Dropdown options -->
                        <div id="dropdownMenu"
                            class="absolute z-10 w-full bg-white border border-gray-300 rounded-md shadow-md mt-1 hidden">
                            <div class="flex flex-col p-2">
                                @foreach (['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'] as $day)
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" class="day-checkbox" name="days_available[]"
                                            value="{{ $day }}"
                                            {{ in_array($day, $daysAvailable) ? 'checked' : '' }}>
                                        <span>{{ ucfirst($day) }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                    </div>

                    <!-- Display selected days -->
                    <div id="selectedDaysContainer" class="mt-2 flex flex-wrap gap-2 bg-gray-100 p-2 rounded-md ">
                        <!-- Selected days will be appended here -->
                        @if (isset($daysAvailable) && is_array($daysAvailable))
                            @foreach ($daysAvailable as $selectedDay)
                                <span
                                    class="bg-blue-500 text-white px-2 py-1 rounded-md">{{ ucfirst($selectedDay) }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>



                <div class="space-y-2">
                    <label for="discount" class="block text-sm font-medium text-gray-700">
                        Discount: <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <input type="number" name="discount" id="discount" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old('discount', isset($coupon) ? $coupon->discount : '') }}" placeholder="Fixed">
                        <span
                            class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">%</span>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="minOrderAmount" class="block text-sm font-medium text-gray-700">
                        Min Order Amount: <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="min_order_amount" name="min_order_amount" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ old('min_order_amount', isset($coupon) ? $coupon->min_order_amount : '') }}"
                        placeholder="Min Order Amount">
                </div>

                <div class="space-y-2">
                    <label for="couponOptions" class="block text-sm font-medium text-gray-700">
                        Coupon Options: <span class="text-red-500">*</span>
                    </label>
                    <select id="coupon_option" name="coupon_option" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Coupon Option</option>
                        <option value="unlimited"
                            {{ old('coupon_option', isset($coupon) ? $coupon->coupon_option : '') == 'unlimited' ? 'selected' : '' }}>
                            Unlimited for users
                        </option>
                        <option value="once"
                            {{ old('coupon_option', isset($coupon) ? $coupon->coupon_option : '') == 'once' ? 'selected' : '' }}>
                            Once per user
                        </option>
                        <option value="new_user"
                            {{ old('coupon_option', isset($coupon) ? $coupon->coupon_option : '') == 'new_user' ? 'selected' : '' }}>
                            Once for new user first order
                        </option>
                        <option value="custom_limit"
                            {{ old('coupon_option', isset($coupon) ? $coupon->coupon_option : '') == 'custom_limit' ? 'selected' : '' }}>
                            Custom limit per user
                        </option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="status" class="block text-sm font-medium text-gray-700">
                        Status: <span class="text-red-500">*</span>
                    </label>
                    <select id="status" name="status" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Status</option>
                        <option value="active"
                            {{ old('status', isset($coupon) ? $coupon->status : '') == 'active' ? 'selected' : '' }}>Active
                        </option>
                        <option value="inactive"
                            {{ old('status', isset($coupon) ? $coupon->status : '') == 'inactive' ? 'selected' : '' }}>
                            Inactive</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ isset($coupon) ? 'Update' : 'Save' }} <!-- Change button text based on context -->
                </button>
                <button type="button"
                    class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Discard
                </button>
            </div>
        </form>

    </div>

    <script>
        document.getElementById('expiry_date').addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const today = new Date();

            // Check if the selected date is today or a future date
            if (selectedDate <= today.setHours(0, 0, 0, 0)) {
                alert('Please select a future date for the expiry.');
                this.value = ''; // Clear the invalid date
            }
        });

        // Toggle dropdown menu visibility
        document.getElementById('dropdownToggle').addEventListener('click', function() {
            const dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('hidden');
        });

        // Handle checkbox changes
        document.querySelectorAll('.day-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const selectedDaysContainer = document.getElementById('selectedDaysContainer');

                if (this.checked) {
                    // Add selected day as a tag
                    const dayDiv = document.createElement('div');
                    dayDiv.className =
                        'px-3 py-1 bg-indigo-500 text-white rounded-full flex items-center space-x-2';
                    dayDiv.setAttribute('data-day', this.value);

                    // Add day name
                    const dayName = document.createElement('span');
                    dayName.textContent = this.value.charAt(0).toUpperCase() + this.value.slice(1);

                    // Add remove button
                    const removeButton = document.createElement('button');
                    removeButton.className = 'text-white ml-2 focus:outline-none';
                    removeButton.innerHTML = '&times;'; // Cross symbol
                    removeButton.addEventListener('click', function() {
                        dayDiv.remove();
                        checkbox.checked = false; // Uncheck the checkbox
                    });

                    // Append day name and remove button to the tag
                    dayDiv.appendChild(dayName);
                    dayDiv.appendChild(removeButton);

                    selectedDaysContainer.appendChild(dayDiv);
                } else {
                    // Remove the tag for the unselected day
                    const dayTag = selectedDaysContainer.querySelector(`[data-day="${this.value}"]`);
                    if (dayTag) dayTag.remove();
                }
            });
        });

        // Close dropdown if clicked outside
        document.addEventListener('click', function(event) {
            const dropdownMenu = document.getElementById('dropdownMenu');
            const dropdownToggle = document.getElementById('dropdownToggle');
            if (!dropdownMenu.contains(event.target) && !dropdownToggle.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>

@endsection
