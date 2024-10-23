@extends('layouts.seller')

@section('title', isset($item) ? 'Edit Item' : 'Add Item')

@section('content')
    <div class="container mx-auto w-full p-4">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold text-gray-800">
                    {{ isset($item) ? 'Edit Add On Item' : 'Add Add On Item' }}
                </h1>
                <a href="{{ route('addOns.showItems') }}"
                    class="px-4 py-2 bg-blue-50 text-blue-600 rounded-md hover:bg-blue-100 transition-colors">
                    Back
                </a>
            </div>

            <form action="{{ route('items.store' }}" method="POST" enctype="multipart/form-data">
            @csrf
           
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                            Name: <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name"
                            value="{{ old('name', isset($item) ? $item->name : '') }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Name">
                    </div>

                    <!-- Price Field -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">
                            Price: <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="price" name="price"
                            value="{{ old('price', isset($item) ? $item->price : '') }}" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Price">
                    </div>

                    <!-- Description Field -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                            Description: <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description" name="description" rows="4" required
                            class="w-full px-3 py-2 border resize-none border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Description">{{ old('description', isset($item) ? $item->description : '') }}</textarea>
                    </div>

                    <!-- Category Field -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">
                            Add On Category Name: <span class="text-red-500">*</span>
                        </label>

                        <select id="category" name="category_id" required
    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none bg-white">
    <option value="">Select Add On Category</option>

    @foreach ($categories as $category)
        <option value="{{ $category->id }}"
            {{ old('category_id', isset($item) && $item->category_id == $category->id ? 'selected' : '') }}>
            {{ $category->name }}
        </option>
    @endforeach
</select>

                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Image:
                        </label>
                        <div
                            class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="image" type="file" class="sr-only"
                                            accept="image/*" onchange="previewImage(event)">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>

                                <!-- Image Preview -->
                                <div class="mt-2">
                                    @if (isset($item) && $item->image)
                                        <img id="image-preview" src="{{ Storage::url($item->image) }}"
                                            class="mx-auto h-48 w-48 object-cover rounded-md" alt="Image Preview">
                                    @else
                                        <img id="image-preview" class="mx-auto h-48 w-48 object-cover rounded-md hidden"
                                            alt="Image Preview">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-4 mt-6">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                        {{ isset($item) ? 'Update' : 'Save' }}
                    </button>
                    <button type="button"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition-colors">
                        Discard
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0]; // Get the selected file
            if (file) {
                const reader = new FileReader(); // Create a FileReader to read the file
                const imgPreview = document.getElementById('image-preview'); // Image element to show the preview

                // Set the image preview once the file is loaded
                reader.onload = function(e) {
                    imgPreview.src = e.target.result; // Set the preview image's source
                    imgPreview.classList.remove('hidden'); // Unhide the image preview
                };

                reader.readAsDataURL(file); // Read the file as a Data URL (base64)
            }
        }
    </script>
@endsection
