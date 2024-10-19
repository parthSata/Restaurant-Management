@extends('layouts.seller')

@section('title', 'Menu')

@section('content')
    <div class="container mx-auto p-6 bg-gray-50">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <div class="relative flex-grow mr-4">
                    <input type="text" placeholder="Search"
                        class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <div class="absolute left-3 top-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <button onclick="openModal(null)"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-300">
                    Add
                </button>
            </div>
            <table class="min-w-full">
                <thead>
                    <tr class="text-left text-gray-500 text-sm">
                        <th class="pb-4">NAME</th>
                        <th class="pb-4">PARENT MENU</th>
                        <th class="pb-4">ITEMS</th>
                        <th class="pb-4">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($menuTypes as $item)
                        <tr class="border-t border-gray-200">
                            <td class="flex gap-2 py-4">

                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}"
                                    class="w-10 h-10 rounded-full">
                                <span class="py-4">{{ $item->name }}</span>
                            </td>
                            <td class="py-4">{{ $item->parent ? $item->parent->name : 'N/A' }}</td>
                            <td class="py-4">
                                <span
                                    class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full text-sm">{{ $item->quantity ?? 0 }}</span>
                            </td>
                            <td class="py-4">
                                <div class="flex space-x-2">
                                    <!-- Add Item Button -->
                                    <form action="{{ route('menu.create', ['menuId' => $item->id]) }}" method="GET">
                                        <button class="text-indigo-600 hover:text-indigo-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>



                                    {{-- Edit Button --}}
                                    <form action="{{ route('menu.edit', $item->id) }}" method="GET">
                                        <button type="button" onclick="openModal({{ json_encode($item) }})"
                                            class="text-indigo-600 hover:text-indigo-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                        </button>

                                    </form>

                                    {{-- Delete Button --}}
                                    <form action="{{ route('menu.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this menu type?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:text-red-900">
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
                    @empty
                        <tr>
                            <td colspan="5" class="py-4 text-center text-gray-500">No menu items found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal for Add/Update Menu -->
    <div id="menuModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white max-w-md w-full p-10 flex flex-col rounded-lg shadow-lg">
            <h2 class="text-lg font-semibold mb-4" id="modalTitle">Add Menu</h2>
            <form id="menuForm" method="POST"
                action="{{ isset($menu) ? route('menu.update', $menu->id) : route('menu.store') }}"
                enctype="multipart/form-data">

                @csrf
                @if (isset($menu))
                    @method('PUT') <!-- Ensure PUT method is specified for updates -->
                @endif
                <div class="flex flex-col gap-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                        value="{{ old('name', isset($menu) ? $menu->name : '') }}" required>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="parent_id">Parent Menu:</label>
                    <select name="parent_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg" id="parent_id">
                        <option value="">Select Parent Menu</option>
                        @foreach ($menuTypes as $menuType)
                            <option value="{{ $menuType->id }}"
                                {{ old('parent_id', isset($menu) ? $menu->parent_id : '') == $menuType->parent_id ? 'selected' : '' }}>
                                {{ $menuType->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <label for="feature-image-input">Image:</label>
                <div class="relative flex items-center">
                    <div class="bg-white border">
                        <img id="imagePreview"
                            src="{{ old('image', isset($menu) ? Storage::url($menu->image) : asset('image/placeholder.jpeg')) }}"
                            alt="Feature Image placeholder" class="w-32 h-28 object-cover rounded-md">
                    </div>
                    <input type="file" id="feature-image-input" name="image" accept="image/*"
                        onchange="previewImage(event, 'imagePreview')" class="hidden" />
                    <label for="feature-image-input"
                        class="absolute bg-white p-2 -top-2 left-24 flex justify-center items-center border border-gray-300 rounded-full cursor-pointer">
                        <i class="fa-solid fa-pen fa-md" style="color: #aaaeb5;"></i>
                    </label>
                </div>
                <div class="flex gap-2 justify-end">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                        {{ isset($menu) ? 'Update' : 'Add' }}
                    </button>
                    <button type="button" class="mr-2 px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600"
                        onclick="closeModal()">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Table content here -->


    <script>
        function previewImage(event, elementId) {
            const image = document.getElementById(elementId);
            image.src = URL.createObjectURL(event.target.files[0]);
        }

        function openModal(menu = null) {
            const modal = document.getElementById('menuModal');
            const modalTitle = document.getElementById('modalTitle');
            const submitButton = document.querySelector('#menuForm button[type="submit"]');

            if (menu) {
                // Set the input fields for editing an existing menu
                document.getElementById('name').value = menu.name || '';
                document.getElementById('parent_id').value = menu.parent_id || ''; // Set parent ID here
                document.getElementById('imagePreview').src = menu.image ? `/storage/${menu.image}` :
                    '/image/placeholder.jpeg';

                modalTitle.textContent = 'Update Menu';
                submitButton.textContent = 'Update'; // Change button text to "Update"
                document.getElementById('menuForm').action =
                    `{{ url('seller/menu') }}/${menu.id}`; // Set form action for update
            } else {
                // Clear fields for adding a new menu
                document.getElementById('name').value = '';
                document.getElementById('parent_id').value = menu.parent_id ||
                    ''; // Ensure this references the correct field
                document.getElementById('imagePreview').src = '/image/placeholder.jpeg'; // Reset to placeholder

                modalTitle.textContent = 'Add Menu';
                submitButton.textContent = 'Add'; // Change button text to "Add"
                document.getElementById('menuForm').action = '{{ route('menu.store') }}'; // Set form action for add
            }

            modal.classList.remove('hidden'); // Show the modal
        }


        function closeModal() {
            document.getElementById('menuModal').classList.add('hidden');
        }
    </script>
@endsection
