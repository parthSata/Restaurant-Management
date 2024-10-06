@extends('layouts.seller')

@section('title', 'Add Category')

@section('content')

    {{-- @push('scripts') --}}
    <!-- Script to handle modal visibility -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openModalBtn = document.getElementById('openModalBtn');
            const closeModalBtns = document.querySelectorAll('#closeModalBtn, #closeModalBtnBottom');
            const modalDialog = document.getElementById('modalDialog');

            // Function to open the modal
            openModalBtn.addEventListener('click', function() {
                modalDialog.classList.remove('hidden');
                modalDialog.classList.add('flex');
            });

            // Function to close the modal (for both close buttons)
            closeModalBtns.forEach((btn) => {
                btn.addEventListener('click', function() {
                    modalDialog.classList.add('hidden');
                    modalDialog.classList.remove('flex');
                });
            });

            // Close the modal when clicking outside of the modal content
            window.addEventListener('click', function(event) {
                if (event.target === modalDialog) {
                    modalDialog.classList.add('hidden');
                    modalDialog.classList.remove('flex');
                }
            });
        });

        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('imagePreview');
                output.src = reader.result; // Set the src attribute of the image preview
            };
            reader.readAsDataURL(event.target.files[0]); // Read the selected file
        }

        function openUpdateModal(id, name, description, image) {
            const modal = document.getElementById('modalDialog');
            const nameInput = document.getElementById('updateName');
            const descriptionInput = document.getElementById('updateDescription');
            const imagePreview = document.getElementById('updateImagePreview');
            const categoryIdInput = document.getElementById('updateCategoryId');

            // Set the values in the modal
            nameInput.value = name;
            descriptionInput.value = description;
            categoryIdInput.value = id; // Ensure you have an input field for the category ID

            // Set the image preview
            imagePreview.src = image || '{{ asset('image/Gajanan.jpeg') }}'; // Default image if none provided

            // Show the modal
            modal.classList.remove('hidden');
        }
    </script>
    {{-- @endpush --}}
    <div class="container mx-auto p-6 bg-gray-50">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <div class="flex justify-between mb-4">
                    <div class="relative flex  justify-center items-center gap-2">
                        <div class="">
                            <input type="text" placeholder="Search" class="w-full pl-10  py-2 border rounded-lg">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <ul class="flex gap-4 items-center">
                            <a href="{{ route('addOns.index') }}" class="">
                                <li class=" cursor-pointer hover:underline text-lg font-serif">Add On Category</li>
                            </a>
                            <a href="{{ route('addOns.showItems') }}" class="">
                                <li class=" cursor-pointer hover:underline text-lg font-serif">Add On Items</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <button id="openModalBtn"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-300">
                    Add
                </button>
            </div>

            <!-- Modal -->
            <div id="modalDialog" class="fixed inset-0 z-50 bg-gray-600 bg-opacity-50 items-center justify-center hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full relative">
                    <!-- Close Button -->
                    <button id="closeModalBtn"
                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>

                    <!-- Modal Header -->
                    <h2 class="text-xl font-bold mb-4">Add On Categories</h2>

                    <!-- Modal Form -->
                    <form method="POST"
                        action="{{ isset($item) ? route('categories.update', $item->id) : route('categories.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @if (isset($item))
                            @method('PUT') <!-- Use this for update requests -->
                        @endif

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                            <input type="text" name="name" id="name"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                placeholder="Category Name" required
                                value="{{ old('name', isset($item) ? $item->name : '') }}">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                            <textarea name="description" id="description"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" placeholder="Description"
                                required>{{ old('description', isset($item) ? $item->description : '') }}</textarea>
                        </div>

                        <label for="feature-image-input" class="">Image:</label>
                        <div class="relative flex items-center">
                            <div class="bg-white border">
                                <img id="imagePreview"
                                    src="{{ isset($item) && $item->image ? asset('storage/' . $item->image) : asset('image/Gajanan.jpeg') }}"
                                    alt="Feature Image placeholder" class="w-32 h-28 object-cover rounded-md">
                            </div>
                            <input type="file" id="feature-image-input" name="image" accept="image/*"
                                onchange="previewImage(event)" class="hidden" />
                            <label for="feature-image-input"
                                class="absolute bg-white p-2 -top-2 left-24 flex justify-center items-center border border-gray-300 rounded-full cursor-pointer">
                                <i class="fa-solid fa-pen fa-md" style="color: #aaaeb5;"></i>
                            </label>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 mr-2">
                                {{ isset($item) ? 'Update ' : 'Save' }} Categories
                            </button>
                            <button type="button" id="closeModalBtnBottom"
                                class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500">Discard
                            </button>
                        </div>
                    </form>



                </div>
            </div>

            <div id="modalDialog" class="fixed inset-0 z-50 bg-gray-600 bg-opacity-50 items-center justify-center hidden">
                <div class="bg-white flex p-6 rounded-lg shadow-lg max-w-md w-full relative">
                    <!-- Close Button -->
                    <button id="closeModalBtn" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700"
                        onclick="closeModal()">&times;</button>

                    <!-- Modal Header -->
                    <h2 class="text-xl font-bold mb-4">Update Category</h2>

                    <!-- Modal Form -->
                    <form method="POST"
                        action="{{ isset($item) ? route('categories.update', $item->id) : route('categories.store') }}"
                        enctype="multipart/form-data" id="updateForm">
                        @csrf
                        @if (isset($item))
                            @method('PUT') <!-- Use this for update requests -->
                            <input type="hidden" name="id" value="{{ $item->id }}">
                        @endif

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                            <input type="text" name="name" id="updateName"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                placeholder="Category Name" required value="{{ isset($item) ? $item->name : '' }}">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                            <textarea name="description" name="description" id="updateDescription"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" placeholder="Description"
                                required>{{ isset($item) ? $item->description : '' }}</textarea>
                        </div>

                        <label for="feature-image-input" class="">Image:</label>
                        <div class="relative flex items-center">
                            <div class="bg-white border">
                                <img id="updateImagePreview"
                                    src="{{ isset($item) && $item->image ? asset('storage/' . $item->image) : asset('image/Gajanan.jpeg') }}"
                                    alt="Feature Image placeholder" class="w-32 h-28 object-cover rounded-md">
                            </div>
                            <input type="file" name="image" id="feature-image-input" name="image"
                                accept="image/*" onchange="previewImage(event)" class="hidden" />
                            <label for="feature-image-input"
                                class="absolute bg-white p-2 -top-2 left-24 flex justify-center items-center border border-gray-300 rounded-full cursor-pointer">
                                <i class="fa-solid fa-pen fa-md" style="color: #aaaeb5;"></i>
                            </label>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 mr-2">
                                Update Categories
                            </button>
                            <button type="button" id="closeModalBtnBottom"
                                class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500"
                                onclick="closeModal()">Discard
                            </button>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Add the JavaScript -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const openModalBtn = document.getElementById('openModalBtn');
                    const closeModalBtns = document.querySelectorAll('#closeModalBtn, #closeModalBtnBottom');
                    const modalDialog = document.getElementById('modalDialog');

                    // Function to open the modal
                    openModalBtn.addEventListener('click', function() {
                        modalDialog.classList.remove('hidden');
                        modalDialog.classList.add('flex');
                    });

                    // Function to close the modal
                    closeModalBtns.forEach((btn) => {
                        btn.addEventListener('click', function() {
                            modalDialog.classList.add('hidden');
                            modalDialog.classList.remove('flex');
                        });
                    });

                    // Close modal when clicking outside of the modal content
                    window.addEventListener('click', function(event) {
                        if (event.target === modalDialog) {
                            modalDialog.classList.add('hidden');
                            modalDialog.classList.remove('flex');
                        }
                    });
                });
            </script>

            <table class="min-w-full">
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
                            {{-- Status Toggle --}}
                            <td>
                                <label class="flex items-center cursor-pointer">
                                    <div class="relative">
                                        <input type="checkbox" class="sr-only z-10" {{ $item->status ? 'checked' : '' }}>
                                        <div class="block bg-gray-200 w-10 h-6 rounded-full shadow-inner"></div>
                                        <div
                                            class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition transform
                                        {{ $item->status ? 'translate-x-full bg-indigo-600' : '' }}">
                                        </div>
                                    </div>
                                </label>
                            </td>
                            {{-- Action Buttons --}}
                            <td>
                                <div class="flex space-x-2">
                                    <button class="text-indigo-600 hover:text-indigo-900"
                                        onclick="openUpdateModal({{ $categories->id }}, '{{ $categories->name }}', '{{ $categories->description }}', '{{ asset('storage/' . $categories->image) }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </button>
                                    <form action="{{ route('categories.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this category?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>




@endsection
