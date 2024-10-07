@extends('layouts.seller')

@section('title', 'Add Category')

@section('content')

    {{-- @push('scripts') --}}
    <!-- Script to handle modal visibility -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openModalBtn = document.getElementById('openModalBtn');
            const closeModalBtns = document.querySelectorAll('#closeModalBtn, #closeModalBtnBottom');
            const addModalDialog = document.getElementById('addModalDialog');
            const updateModalDialog = document.getElementById('updateModalDialog');

            // Function to open the "Add" modal
            openModalBtn?.addEventListener('click', function() {
                addModalDialog.classList.remove('hidden');
                addModalDialog.classList.add('flex');
            });

            // Function to close the modals (for both close buttons)
            closeModalBtns.forEach((btn) => {
                btn.addEventListener('click', function() {
                    closeModal();
                });
            });

            // Close the modal when clicking outside of the modal content
            window.addEventListener('click', function(event) {
                if (event.target === addModalDialog || event.target === updateModalDialog) {
                    closeModal();
                }
            });

            // Reusable function to close the modal
            function closeModal() {
                addModalDialog.classList.add('hidden');
                addModalDialog.classList.remove('flex');
                updateModalDialog.classList.add('hidden');
                updateModalDialog.classList.remove('flex');
            }

            // Image preview function for both modals
            function previewImage(event, previewId) {
                const reader = new FileReader();
                reader.onload = function() {
                    const output = document.getElementById(previewId);
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]); // Read the selected file
            }

            // Function to open the update modal with pre-filled data
            window.openUpdateModal = function(id, name, description, image) {
                const modal = document.getElementById('updateModalDialog');
                const nameInput = document.getElementById('updateName');
                const descriptionInput = document.getElementById('updateDescription');
                const imagePreview = document.getElementById('updateImagePreview');
                const categoryIdInput = document.getElementById('updateCategoryId');

                // Set the values in the modal
                nameInput.value = name;
                descriptionInput.value = description;
                categoryIdInput.value = id;

                // Set the image preview or fallback to default if image is not provided
                imagePreview.src = image || '{{ asset('image/Gajanan.jpeg') }}';

                // Show the modal
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            };
            // Export previewImage to make it accessible globally
            window.previewImage = previewImage;
        });

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

            {{-- Insert Modal --}}
            <div id="addModalDialog"
                class="fixed inset-0 z-50 bg-gray-600 bg-opacity-50 items-center justify-center hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full relative">
                    <!-- Close Button -->
                    <button id="closeModalBtn"
                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">&times;</button>

                    <!-- Modal Header -->
                    <h2 class="text-xl font-bold mb-4">Add On Categories</h2>

                    <!-- Modal Form -->
                    <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                            <input type="text" name="name" id="name"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                placeholder="Category Name" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                            <textarea name="description" id="description"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" placeholder="Description"
                                required></textarea>
                        </div>

                        <label for="feature-image-input" class="">Image:</label>
                        <div class="relative flex items-center">
                            <div class="bg-white border">
                                <img id="imagePreview" src="{{ asset('image/Gajanan.jpeg') }}"
                                    alt="Feature Image placeholder" class="w-32 h-28 object-cover rounded-md">
                            </div>
                            <input type="file" id="feature-image-input" name="image" accept="image/*"
                                onchange="previewImage(event, 'imagePreview')" class="hidden" />
                            <label for="feature-image-input"
                                class="absolute bg-white p-2 -top-2 left-24 flex justify-center items-center border border-gray-300 rounded-full cursor-pointer">
                                <i class="fa-solid fa-pen fa-md" style="color: #aaaeb5;"></i>
                            </label>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 mr-2">
                                Save Categories
                            </button>
                            <button type="button" id="closeModalBtnBottom"
                                class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500">Discard
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Update Model --}}

            <div id="updateModalDialog"
                class="fixed inset-0 z-50 bg-gray-600 bg-opacity-50 items-center justify-center hidden">
                <div class="bg-white max-w-md p-6 rounded-lg shadow-lg w-full relative">
                    <button id="closeModalBtn" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700"
                        onclick="closeModal()">&times;</button>
                    <h2 class="text-xl font-bold mb-4">Update Category</h2>
                    <form method="POST" action="{{ route('categories.update', $categoryForUpdate->id) }}"
                        enctype="multipart/form-data" id="updateForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="updateCategoryId" name="id" value="{{ $categoryForUpdate->id }}">

                        <div class="mb-4">
                            <label for="updateName" class="block text-sm font-medium text-gray-700">Name:</label>
                            <input type="text" name="name" id="updateName"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                placeholder="Category Name" required value="{{ $categoryForUpdate->name }}">
                        </div>

                        <div class="mb-4">
                            <label for="updateDescription"
                                class="block text-sm font-medium text-gray-700">Description:</label>
                            <textarea name="description" id="updateDescription"
                                class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
                                placeholder="Description">{{ $categoryForUpdate->description }}</textarea>
                        </div>

                        <label for="feature-image-input">Image:</label>
                        <div class="relative flex items-center">
                            <div class="bg-white border">
                                <img id="updateImagePreview"
                                    src="{{ isset($categoryForUpdate->image) ? asset('storage/Categories/' . $categoryForUpdate->image) : asset('image/Gajanan.jpeg') }}"
                                    alt="Feature Image placeholder" class="w-32 h-28 object-cover rounded-md">
                            </div>
                            <input type="file" name="image" id="feature-image-input" accept="image/*"
                                onchange="previewImage(event, 'updateImagePreview')" class="hidden" />
                            <label for="feature-image-input"
                                class="absolute bg-white p-2 -top-2 left-24 flex justify-center items-center border border-gray-300 rounded-full cursor-pointer">
                                <i class="fa-solid fa-pen fa-md" style="color: #aaaeb5;"></i>
                            </label>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 mr-2">Update</button>
                            <button type="button" id="closeModalBtnBottom"
                                class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500"
                                onclick="closeModal()">Discard</button>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Add the JavaScript -->

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
                                    @foreach ($categories as $category)
                                        <div class="flex space-x-2">
                                            <button class="text-indigo-600 hover:text-indigo-900"
                                                onclick="openUpdateModal('{{ $item->id }}', '{{ $item->name }}', '{{ $item->description }}', '{{ asset('storage/' . $item->image) }}')", '{{ asset('storage/' . $category->image) }}'">
                                                                                                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                                                                                                                                        viewBox="0 0 20 20" fill="currentColor">
                                                                                                                                                                                        <path
                                                                                                                                                                                            d="
                                                M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379
                                                5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                            </button>
                                        </div>
                                    @endforeach
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
