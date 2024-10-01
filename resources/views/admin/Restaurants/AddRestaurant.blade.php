@extends('layouts.admin')

@section('title', 'Add Restaurants')

@section('content')

    <div class="">
        <script>
            function previewImage(event, previewElementId) {
                const reader = new FileReader();
                reader.onload = function() {
                    const output = document.getElementById(previewElementId);
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif
        </script>
        <div class="container mx-auto p-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold">Add Restaurant</h1>
                    <a href="/admin/restaurants"
                        class="px-4 py-2 text-sm text-blue-600 border border-blue-600 rounded hover:bg-blue-50">Back</a>
                </div>

                <form
                    action="{{ isset($restaurant) ? route('restaurants.update', $restaurant->id) : route('restaurants.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($restaurant))
                        @method('PUT') <!-- Include this for update requests -->
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Restaurant Name -->
                        <div class="flex flex-col gap-2">
                            <label for="restaurant_name" class="block text-sm font-medium text-gray-700">Restaurant Name
                                *</label>
                            <input type="text" id="restaurant_name" name="restaurant_name"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md"
                                placeholder="Restaurant Name"
                                value="{{ isset($restaurant) ? $restaurant->restaurant_name : old('restaurant_name') }}">
                        </div>


                        <!-- Restaurant Slug -->
                        <div class="flex flex-col gap-2">
                            <label for="restaurant_slug" class="block text-sm font-medium text-gray-700">Restaurant Slug
                                *</label>
                            <input type="text" id="restaurant_slug" name="restaurant_slug"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md"
                                placeholder="Restaurant Slug"
                                value="{{ isset($restaurant) ? $restaurant->restaurant_slug : old('restaurant_slug') }}">
                        </div>
                        <!-- Contact First Name -->
                        <div class="flex flex-col gap-2">
                            <label class="block text-sm font-medium text-gray-700">Contact First Name *</label>
                            <input type="text" id="contact_first_name" name="contact_first_name"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md"
                                placeholder="Contact First Name"
                                value="{{ isset($restaurant) ? $restaurant->contact_first_name : old('contact_first_name') }}">
                        </div>
                        <!-- Contact Last Name -->
                        <div class="flex flex-col gap-2">
                            <label for="contact_last_name" class="block text-sm font-medium text-gray-700">Contact Last Name
                                *</label>
                            <input type="text" id="contact_last_name" name="contact_last_name"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md"
                                placeholder="Contact Last Name"
                                value="{{ isset($restaurant) ? $restaurant->contact_last_name : old('contact_last_name') }}">
                        </div>
                        <!-- Contact Phone -->
                        <div class="flex flex-col gap-2">
                            <label for="contact_phone" class="block text-sm font-medium text-gray-700">Contact Phone
                                *</label>
                            <input type="number" maxlength="10" id="contact_phone" name="contact_phone"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md"
                                placeholder="Contact Phone"
                                value="{{ isset($restaurant) ? $restaurant->contact_phone : old('contact_phone') }}"
                                value="{{ old('contact_phone') }}">
                        </div>
                        <!-- Contact Email -->
                        <div class="flex flex-col gap-2">
                            <label for="contact_email" class="block text-sm font-medium text-gray-700">Contact Email
                                *</label>
                            <input type="email" id="contact_email" name="contact_email"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md"
                                placeholder="Contact Email"
                                value="{{ isset($restaurant) ? $restaurant->contact_email : old('contact_email') }}">
                        </div>
                        @php
                            $isEdit = request()->query('edit') === 'true'; // Check if edit parameter is present
                        @endphp

                        <!-- Password -->
                        <div class="flex flex-col gap-2">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password *</label>
                            <input type="password" id="password" required name="password"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md"
                                placeholder="Password" @if ($isEdit) disabled @endif>
                        </div>
                        <!-- Confirm Password -->
                        <div class="flex flex-col gap-2">
                            <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm
                                Password</label>
                            <input type="password" id="confirm_password" name="confirm_password"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md"
                                placeholder="Confirm Password" @if ($isEdit) disabled @endif>
                        </div>

                    </div>
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- About Us -->
                        <div>
                            <label for="about_us" class="block text-sm font-medium text-gray-700">About Us *</label>
                            <textarea id="about_us" name="about_us" rows="5"
                                class="block w-full border-gray-300 p-2 resize-none rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="About Us">{{ isset($restaurant) ? $restaurant->about_us : old('about_us') }}</textarea>
                        </div>
                        <!-- Short About -->
                        <div>
                            <label for="short_about" class="block text-sm font-medium text-gray-700">Short About *</label>
                            <textarea id="short_about" name="short_about" rows="5"
                                class="block w-full p-2 border-gray-300 resize-none rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                placeholder="Short About">{{ isset($restaurant) ? $restaurant->short_about : old('short_about') }}{{ old('short_about') }}</textarea>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Service Type Dropdown -->
                        <div class="flex flex-col gap-2">
                            <label for="service_type" class="block text-sm font-medium text-gray-700">Service Type
                                *</label>
                            <select id="service_type" name="service_type" required class="...">
                                <option value="">Select Service Type</option>
                                @foreach ($service_type as $type)
                                    <option value="{{ $type }}"
                                        {{ isset($restaurant) && $restaurant->service_type == $type ? 'selected' : '' }}>
                                        {{ $type }}
                                    </option>
                                @endforeach
                            </select>
                            @error('service_type')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Status Dropdown -->
                        <div class="flex flex-col gap-2">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status *</label>
                            <select name="status" id="status" required
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status }}"
                                        {{ isset($restaurant) && $restaurant->status == $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Currency Dropdown -->
                        <div class="flex flex-col gap-2">
                            <label for="currency" class="block text-sm font-medium text-gray-700">Currency *</label>
                            <select id="currency" name="currency" required
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md">
                                <option value="">Select Currency</option>
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency }}"
                                        {{ isset($restaurant) && $restaurant->currency == $currency ? 'selected' : '' }}>
                                        {{ $currency }}
                                    </option>
                                @endforeach
                            </select>
                            @error('currency')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Restaurant Type Dropdown -->
                        <div class="flex flex-col gap-2">
                            <label for="restaurant_type" class="block text-sm font-medium text-gray-700">Restaurant Type
                                *</label>
                            <select id="restaurant_type" name="restaurant_type" required
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md">
                                <option value="">Select Type</option>
                                @foreach ($restaurantTypes as $restType)
                                    <option value="{{ $restType }}"
                                        {{ isset($restaurant) && $restaurant->restaurant_type == $restType ? 'selected' : '' }}>
                                        {{ ucfirst($restType) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Logo Input -->
                        <div class="mt-1 relative flex items-center">
                            <div class="bg-white border p-2">
                                <img id="logo-preview"
                                    src="{{ isset($restaurant->logo) ? asset('/storage' . $restaurant->logo) : asset('/image/Logo.png') }}"
                                    alt="Logo placeholder" class="w-24 h-28 object-cover rounded-md">
                            </div>
                            <input type="file" id="logo-input" name="logo" accept="image/*"
                                onchange="previewImage(event, 'logo-preview')" class="hidden" />
                            <label for="logo-input"
                                class="absolute bg-white p-2 -top-2 left-24 flex justify-center items-center border border-gray-300 rounded-full cursor-pointer">
                                <i class="fa-solid fa-pen fa-md" style="color: #aaaeb5;"></i>
                            </label>
                        </div>

                        <!-- Favicon Input -->
                        <div class="mt-1 relative flex items-center">
                            <div class="bg-white border p-2">
                                <img id="favicon-preview"
                                    src="{{ isset($restaurant->favicon) ? asset('/storage' . $restaurant->favicon) : asset('/image/Logo.png') }}"
                                    alt="Favicon placeholder" class="w-24 h-28 object-cover rounded-md">
                            </div>
                            <input type="file" id="favicon-input" name="favicon" accept="image/*"
                                onchange="previewImage(event, 'favicon-preview')" class="hidden" />
                            <label for="favicon-input"
                                class="absolute bg-white p-2 -top-2 left-24 flex justify-center items-center border border-gray-300 rounded-full cursor-pointer">
                                <i class="fa-solid fa-pen fa-md" style="color: #aaaeb5;"></i>
                            </label>
                        </div>

                        <!-- Feature Image Input -->
                        <div class="relative flex items-center">
                            <div class="bg-white border">
                                <img id="feature-image-preview"
                                    src="{{ isset($restaurant->feature_image) ? asset('/storage' . $restaurant->feature_image) : asset('/image/Gajanan.jpeg') }}"
                                    alt="Feature Image placeholder" class="w-32 h-28 object-cover rounded-md">
                            </div>
                            <input type="file" id="feature-image-input" name="feature_image" accept="image/*"
                                onchange="previewImage(event, 'feature-image-preview')" class="hidden" />
                            <label for="feature-image-input"
                                class="absolute bg-white p-2 -top-2 left-24 flex justify-center items-center border border-gray-300 rounded-full cursor-pointer">
                                <i class="fa-solid fa-pen fa-md" style="color: #aaaeb5;"></i>
                            </label>
                        </div>
                    </div>




                    <div class="mt-6 flex justify-end space-x-4">
                        <button type="button" onclick="history.back()"
                            class="h-10 w-24 bg-gray-200 text-black rounded-md">Discard</button>
                        <button type="submit" class="h-10 w-24 bg-blue-600 text-white rounded-md">
                            @if ($isEdit)
                                Update
                            @else
                                Submit
                            @endif
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
