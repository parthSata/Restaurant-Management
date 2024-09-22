@extends('layouts.admin')

@section('title', 'Add Restaurants')

@section('content')

    <div class="">
        <script>
            function previewImage(event, previewId) {
                let output = document.getElementById(previewId);
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
            }
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif
        </script>
        <div class="container mx-auto p-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold">Add Restaurant</h1>
                    <a class="px-4 py-2 text-sm text-blue-600 border border-blue-600 rounded hover:bg-blue-50">Back</a>
                </div>
                <form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-2">
                            <label for="restaurant-name" class="block text-sm font-medium text-gray-700">Restaurant Name
                                *</label>
                            <input type="text" id="restaurant-name" name="restaurant-name"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md"
                                placeholder="Restaurant Name">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="restaurant-slug" class="block text-sm font-medium text-gray-700">Restaurant Slug
                                *</label>
                            <input type="text" id="restaurant-slug"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md"
                                placeholder="Restaurant Slug">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="block text-sm font-medium text-gray-700">Contact First
                                Name *</label>
                            <input type="text"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md"
                                placeholder="Contact First Name">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="contact-last-name" class="block text-sm font-medium text-gray-700">Contact Last Name
                                *</label>
                            <input type="text" id="contact-last-name"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md"
                                placeholder="Contact Last Name">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="restaurant-name" class="block text-sm font-medium text-gray-700">Contact Phone
                                *</label>
                            <input type="text" id="restaurant-name" name="restaurant-name"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md"
                                placeholder="Contact Phone">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="contact-email" class="block text-sm font-medium text-gray-700">Contact Email
                                *</label>
                            <input type="text" id="contact-email"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md"
                                placeholder="Contact Email">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password
                                *</label>
                            <input type="text" id="password"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md"
                                placeholder="Password">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm Password
                                *</label>
                            <input type="text"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md"
                                placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="about-us" class="block text-sm font-medium text-gray-700">About Us *</label>
                            <div class="mt-1 bg-white rounded-md shadow-sm">
                                <div
                                    class="flex items-center justify-between px-3 py-2 border border-b-0 border-gray-300 rounded-t-md">

                                    <textarea id="about-us" name="about-us" rows="5"
                                        class="block w-full border-gray-300 resize-none rounded-b-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        placeholder="About Us"></textarea>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="short-about" class="block text-sm font-medium text-gray-700">Short About *</label>
                            <div class="mt-1 bg-white rounded-md shadow-sm">
                                <div
                                    class="flex items-center justify-between px-3 py-2 border border-b-0 border-gray-300 rounded-t-md">

                                    <textarea id="about-us" name="about-us" rows="5"
                                        class="block w-full border-gray-300 resize-none rounded-b-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        placeholder="Short About"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Service Type Dropdown -->
                        <div class="flex flex-col gap-2">
                            <label for="service-type" class="block text-sm font-medium text-gray-700">Service Type *</label>
                            <select id="service-type" name="service_type"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md hover:cursor-pointer">
                                <option
                                    class="cursor-default bg-white hover:bg-blue-200 select-none relative py-2 pl-3 pr-9"
                                    value="">Select Service Type</option>
                                <option
                                    class="cursor-default bg-white hover:bg-blue-200 select-none relative py-2 pl-3 pr-9"
                                    value="Delivery">Delivery</option>
                                <option
                                    class="cursor-default bg-white hover:bg-blue-200 select-none relative py-2 pl-3 pr-9"
                                    value="DineIn">DineIn</option>
                                <option
                                    class="cursor-default bg-white hover:bg-blue-200 select-none relative py-2 pl-3 pr-9"
                                    value="Pickup">Pickup</option>
                            </select>
                        </div>

                        <!-- Status Dropdown -->
                        <div class="flex flex-col gap-2">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status *</label>
                            <select id="status" name="status"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md">
                                <option class="cursor-default hover:bg-blue-200 select-none relative py-2 pl-3 pr-9 "
                                    value="">Select Status</option>
                                <option class="cursor-default hover:bg-blue-200 select-none relative py-2 pl-3 pr-9 "
                                    value="Active">Active</option>
                                <option class="cursor-default hover:bg-blue-200 select-none relative py-2 pl-3 pr-9 "
                                    value="Inactive">Inactive</option>
                            </select>
                        </div>

                        <!-- Currency Dropdown -->
                        <div class="flex flex-col gap-2">
                            <label for="currency" class="block text-sm font-medium text-gray-700">Currency *</label>
                            <select id="currency" name="currency"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md">
                                <option class="cursor-default hover:bg-blue-200 select-none relative py-2 pl-3 pr-9 "
                                    value="">Select Currency</option>
                                <option class="cursor-default hover:bg-blue-200 select-none relative py-2 pl-3 pr-9 "
                                    value="USD">USD</option>
                                <option class="cursor-default hover:bg-blue-200 select-none relative py-2 pl-3 pr-9 "
                                    value="EUR">EUR</option>
                                <option class="cursor-default hover:bg-blue-200 select-none relative py-2 pl-3 pr-9 "
                                    value="GBP">GBP</option>
                            </select>
                        </div>

                        <!-- Restaurant Type Dropdown -->
                        <div class="flex flex-col gap-2">
                            <label for="restaurant-type" class="block text-sm font-medium text-gray-700">Restaurant Type
                                *</label>
                            <select id="restaurant-type" name="restaurant_type"
                                class="w-full h-12 focus:outline-none border-gray-400 border p-2 placeholder:font-semibold rounded-md">
                                <option class="cursor-default hover:bg-blue-200 select-none relative py-2 pl-3 pr-9 "
                                    value="">Select Type</option>
                                <option class="cursor-default hover:bg-blue-200 select-none relative py-2 pl-3 pr-9 "
                                    value="FastFood">Fast Food</option>
                                <option class="cursor-default hover:bg-blue-200 select-none relative py-2 pl-3 pr-9 "
                                    value="CasualDining">Casual Dining</option>
                                <option class="cursor-default hover:bg-blue-200 select-none relative py-2 pl-3 pr-9 "
                                    value="FineDining">Fine Dining</option>
                            </select>
                        </div>
                    </div>


                    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">

                        <div class="mt-1 relative flex items-center">
                            <!-- Logo Preview -->
                            <div class="bg-white border p-2">
                                <img id="logo-preview" src="/image/Logo.png" alt="Logo placeholder"
                                    class="w-24 h-28 object-cover rounded-md">
                            </div>

                            <!-- File Input for Logo -->
                            <input type="file" id="logo-input" name="logo"
                                onchange="previewImage(event, 'logo-preview')" class="hidden" />
                            <label for="logo-input"
                                class="absolute bg-white p-2 -top-2 left-24 flex justify-center items-center  border border-gray-300 rounded-full cursor-pointer">
                                <i class="fa-solid fa-pen fa-md" style="color: #aaaeb5;"></i>
                            </label>
                        </div>

                        <div class="mt-1 relative flex items-center">
                            <!-- Favicon Preview -->
                            <div class="bg-white border p-2">
                                <img id="favicon-preview" src="/image/Logo.png" alt="Favicon placeholder"
                                    class="w-24 h-28 object-cover rounded-md">
                            </div>

                            <!-- File Input for Favicon -->
                            <input type="file" id="favicon-input" name="favicon"
                                onchange="previewImage(event, 'favicon-preview')" class="hidden" />
                            <label for="favicon-input"
                                class="absolute bg-white p-2 -top-2 left-24 flex justify-center items-center  border border-gray-300 rounded-full cursor-pointer">
                                <i class="fa-solid fa-pen fa-md" style="color: #aaaeb5;"></i>
                            </label>
                        </div>

                        <div class="mt-1 relative flex items-center">
                            <!-- Feature Image Preview -->
                            <div class="bg-white border">
                                <img id="feature-image-preview" src="/image/Gajanan.jpeg" alt="Feature Image placeholder"
                                    class="w-36 h-28 object-cover rounded-md">
                            </div>

                            <!-- File Input for Feature Image -->
                            <input type="file" id="feature-image-input" name="feature_image"
                                onchange="previewImage(event, 'feature-image-preview')" class="hidden" />
                            <label for="feature-image-input"
                                class="absolute bg-white p-2 -top-2 left-32 flex justify-center items-center  border border-gray-300 rounded-full cursor-pointer">
                                <i class="fa-solid fa-pen fa-md" style="color: #aaaeb5;"></i>
                            </label>
                        </div>
                    </div>
                    <div class="mt-8 flex justify-end space-x-3">
                        <button type="submit"
                            class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save
                        </button>
                        <button type="button"
                            class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Discard
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
