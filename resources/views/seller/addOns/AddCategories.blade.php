@extends('layouts.seller')

@section('title', isset($category) ? 'Update Category' : 'Add Category')

@section('content')
    <!-- Main Content Container -->
    <div class="container mx-auto p-6 bg-gray-50">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <div class="flex justify-between mb-4">
                    <div class="relative flex justify-center items-center gap-2">
                        <div class="">
                            <input type="text" placeholder="Search" class="w-full pl-10 py-2 border rounded-lg">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <ul class="flex gap-4 items-center">
                            <a href="{{ route('addOns.index') }}" class="">
                                <li class="cursor-pointer hover:underline text-lg font-serif">Add On Category</li>
                            </a>
                            <a href="{{ route('addOns.showItems') }}" class="">
                                <li class="cursor-pointer hover:underline text-lg font-serif">Add On Items</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <button id="openModalBtn"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-300">
                    {{ isset($category) ? 'Update Category' : 'Add Category' }}
                </button>
            </div>

            <!-- Modal for Add/Update -->
            <div id="modalDialog" class="fixed flex inset-0 z-50 bg-gray-600 bg-opacity-50 items-center justify-center hidden">
                <div class="bg-white p-6   rounded-lg flex flex-col shadow-lg max-w-md w-full relative">
                    <button id="closeModalBtn"
                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>

                    <h2 class="text-xl font-bold mb-4">{{ isset($category) ? 'Update Category' : 'Add Category' }}</h2>

                    <form method="POST"
                        action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @if (isset($category))
                            @method('PUT')
                        @endif

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                            <input type="text" name="name" id="name"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                value="{{ isset($category) ? $category->name : old('name') }}" placeholder="Category Name"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                            <textarea name="description" id="description"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" placeholder="Description"
                                required>{{ isset($category) ? $category->description : old('description') }}</textarea>
                        </div>

                        <!-- Image Upload -->
                        <label for="feature-image-input">Image:</label>
                        <div class="relative flex items-center">
                            <div class="bg-white border">
                                <img id="imagePreview"
                                    src="{{ isset($category) ? Storage::url($category->image) : asset('image/placeholder.jpeg') }}"
                                    alt="Feature Image placeholder" class="w-32 h-28 object-cover rounded-md">
                            </div>
                            <input type="file" id="feature-image-input" name="image" accept="image/*"
                                onchange="previewImage(event, 'imagePreview')" class="hidden" />
                            <label for="feature-image-input"
                                class="absolute bg-white p-2 -top-2 left-24 flex justify-center items-center border border-gray-300 rounded-full cursor-pointer">
                                <i class="fa-solid fa-pen fa-md" style="color: #aaaeb5;"></i>
                            </label>
                        </div>

                        <div class="flex justify-end mt-4">
                            <button type="submit"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 mr-2">
                                {{ isset($category) ? 'Update Category' : 'Save Category' }}
                            </button>
                            <button type="button" id="closeModalBtnBottom"
                                class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500">Discard
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Table for Categories -->
            <table class="min-w-full mt-6">
                <thead>
                    <tr class="text-left text-gray-500 text-sm">
                        <th class="pb-4">NAME</th>
                        <th class="pb-4">STATUS</th>
                        <th class="pb-4">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr class="border-t border-gray-200">
                            <td class="py-4">
                                <div class="flex items-center">
                                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}"
                                        class="w-10 h-10 rounded-full mr-3">
                                    <span class="text-gray-700">{{ $item->name }}</span>
                                </div>
                            </td>

                            <td>
                                <label class="flex items-center cursor-pointer">
                                    <div class="relative">
                                        <input type="checkbox" class="sr-only" {{ $item->status ? 'checked' : '' }}>
                                        <div class="block bg-gray-200 w-10 h-6 rounded-full shadow-inner"></div>
                                        <div
                                            class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition transform {{ $item->status ? 'translate-x-full bg-indigo-600' : '' }}">
                                        </div>
                                    </div>
                                </label>
                            </td>

                            <td class="py-4">
                                <div class="flex items-center gap-2">
                                    <button class="text-indigo-600 hover:text-indigo-800"
                                        onclick="openUpdateModal({{ $item->id }}, '{{ $item->name }}', '{{ $item->description }}', '{{ Storage::url($item->image) }}')">
                                        Edit
                                    </button>
                                    <form method="POST" action="{{ route('categories.destroy', $item->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:text-red-800" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        function previewImage(event, elementId) {
            const image = document.getElementById(elementId);
            image.src = URL.createObjectURL(event.target.files[0]);
        }

        // Open Modal
        document.getElementById('openModalBtn').addEventListener('click', function() {
            const form = document.querySelector('form');
            form.action = '{{ route('categories.store') }}'; // Reset to store route

            // Remove the _method input if it exists (because we need a POST request for add)
            const methodInput = form.querySelector('input[name="_method"]');
            if (methodInput) {
                methodInput.remove();
            }

            // Reset the form fields
            document.getElementById('name').value = '';
            document.getElementById('description').value = '';
            document.getElementById('imagePreview').src = '{{ asset('image/placeholder.jpeg') }}';

            // Change modal title and button text to reflect "Add Category"
            document.querySelector('h2').textContent = 'Add Category';
            document.querySelector('button[type="submit"]').textContent = 'Save Category';

            // Open the modal
            document.getElementById('modalDialog').classList.remove('hidden');
        });
        // Close Modal
        document.getElementById('closeModalBtn').addEventListener('click', function() {
            document.getElementById('modalDialog').classList.add('hidden');
        });

        document.getElementById('closeModalBtnBottom').addEventListener('click', function() {
            document.getElementById('modalDialog').classList.add('hidden');
        });

        // Open Update Modal
        function openUpdateModal(id, name, description, imageUrl) {
            // Set form action to the correct update route with the category ID
            const form = document.querySelector('form');
            const formAction = '{{ route('categories.update', ':id') }}'.replace(':id', id);
            form.action = formAction;

            // Ensure the PUT method is added
            let methodInput = form.querySelector('input[name="_method"]');
            if (!methodInput) {
                // Create _method input if not already present
                methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                form.appendChild(methodInput);
            }
            methodInput.value = 'PUT';

            // Populate modal fields with the category data
            document.getElementById('name').value = name;
            document.getElementById('description').value = description;
            document.getElementById('imagePreview').src = imageUrl;

            // Change modal title and button text to reflect "Update Category"
            document.querySelector('h2').textContent = 'Update Category';
            document.querySelector('button[type="submit"]').textContent = 'Update Category';

            // Open the modal
            document.getElementById('modalDialog').classList.remove('hidden');
        }
    </script>
@endsection
