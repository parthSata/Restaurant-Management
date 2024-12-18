@extends('layouts.seller')

@section('title', 'Booking')

@section('content')

    <div class="container mx-auto p-4 max-w-6xl">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Add Table</h1>
            <button class="px-4 py-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                Back
            </button>
        </div>

        <!-- Form Container -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form class="space-y-6"
                action="{{ isset($reservation) ? route('reservation.update', $reservation->id) : route('reservation.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($reservation))
                    @method('PUT')
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title Field -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">
                            Title<span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" placeholder="Title" required
                            value="{{ isset($reservation) ? $reservation->title : '' }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow">
                    </div>

                    <!-- Capacity Field -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">
                            Capacity<span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="capacity" placeholder="Capacity" required
                            value="{{ isset($reservation) ? $reservation->capacity : '' }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow">
                    </div>
                </div>

                <!-- Image Upload -->
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">
                        Image<span class="text-red-500">*</span>
                    </label>
                    <div class="flex items-start space-x-4">
                        <!-- Image Preview -->
                        {{-- <div id="image-preview-container"
                            class="w-24 h-24 border-2 border-gray-300 border-dashed rounded-lg flex items-center justify-center relative">
                            <img id="image-preview" src="" alt="Image Preview"
                                class="w-full h-full object-cover rounded-lg hidden" />
                            @if (isset($reservation) && $reservation->image)
                                <img src="{{ asset('storage/' . $reservation->image) }}" id="image-preview" alt="Image"
                                    class="w-32 h-32 mt-2 rounded-lg">
                            @endif
                            <input type="file" name="image" id="image-input" accept=".png,.jpg,.jpeg"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            <div id="placeholder" class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div> --}}


                        <div
                            class="relative w-32 h-32 border-2 border-gray-300 border-dashed rounded-lg overflow-hidden flex items-center justify-center">
                            <!-- Image Preview -->
                            @if (isset($reservation) && $reservation->image)
                                <img src="{{ asset('storage/' . $reservation->image) }}" id="image-preview"
                                    alt="Image Preview" class="w-full h-full object-cover">
                            @else
                                <img id="image-preview" src="" alt="Image Preview"
                                    class="w-full h-full object-cover hidden">
                            @endif

                            <!-- Placeholder Icon -->
                            <div id="placeholder"
                                class="absolute inset-0 flex items-center justify-center {{ isset($reservation) && $reservation->image ? 'hidden' : '' }}">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>

                            <!-- Hidden File Input -->
                            <input type="file" id="feature-image-input" name="image" accept="image/*"
                                onchange="previewImage(event, 'image-preview')" class="hidden">


                        </div>

                        <div class="relative">
                            <!-- Pencil Icon Label -->
                            <label for="feature-image-input"
                                class="absolute bg-white p-2 -top-1 right-2 flex justify-center items-center border border-gray-300 rounded-full cursor-pointer">
                                <i class="fa-solid fa-pen fa-md" style="color: #aaaeb5;"></i>
                            </label>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-500">Allowed file types: png, jpg, jpeg.</p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-4 pt-4">
                    <button type="submit"
                        class="px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-200">
                        {{ isset($reservation) ? 'Update' : 'Save' }}
                    </button>
                    <a href="{{ route('reservation.index') }}"
                        class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 focus:ring-4 focus:ring-gray-100">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event, previewId) {
            const file = event.target.files[0];
            const preview = document.getElementById(previewId);
            const placeholder = document.getElementById('placeholder');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden'); // Show the image preview
                    placeholder.classList.add('hidden'); // Hide the placeholder
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.classList.add('hidden'); // Hide the preview if no file selected
                placeholder.classList.remove('hidden'); // Show the placeholder
            }
        }

        document.getElementById('image-input').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('image-preview');
            const placeholder = document.getElementById('placeholder');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden'); // Show the preview image
                    placeholder.classList.add('hidden'); // Hide the placeholder
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.classList.add('hidden');
                placeholder.classList.remove('hidden');
            }
        });
    </script>


@endsection
