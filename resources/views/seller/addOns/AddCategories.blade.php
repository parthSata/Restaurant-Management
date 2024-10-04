@extends('layouts.seller')

@section('title', 'Add Category')

@section('content')

    @push('scripts')
        <script>
            document.getElementById('openModalBtn').addEventListener('click', function() {
                document.getElementById('modalDialog').classList.remove('hidden');
            });

            document.getElementById('closeModalBtn').addEventListener('click', function() {
                document.getElementById('modalDialog').classList.add('hidden');
            });
        </script>
    @endpush
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

            <!-- Modal Dialog -->
            <div id="modalDialog"
                class="fixed inset-0 bg-gray-600 bg-opacity-50 sm:flex items-center justify-center hidden">
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                    <h2 class="text-xl font-bold mb-4">Add New Category</h2>
                    <form method="POST">
                        @csrf
                        <input type="text" name="category_name" class="w-full p-2 mb-4 border rounded-lg"
                            placeholder="Category Name" required>
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                            Save
                        </button>
                        <button type="button" id="closeModalBtn"
                            class="ml-2 bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500">
                            Cancel
                        </button>
                    </form>
                </div>
            </div>

            <table class="min-w-full">
                <thead>
                    <tr class="text-left text-gray-500 text-sm">
                        <th class="pb-4">NAME</th>
                        <th class="pb-4">STATUS</th>
                        <th class="pb-4">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t border-gray-200">
                        <td class="py-4">
                            <div class="flex items-center">
                                <img src="/placeholder.svg?height=40&width=40" alt="Salad"
                                    class="w-10 h-10 rounded-full mr-3">
                                <span class="text-gray-700">Salad</span>
                            </div>
                        </td>
                        {{-- Make change in ui  --}}
                        <td>
                            <label class="flex items-center cursor-pointer">
                                <div class="relative">
                                    <input type="checkbox" class="sr-only" checked>
                                    <div class="w-10 h-6 bg-gray-200 rounded-full shadow-inner"></div>
                                    <div
                                        class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition">
                                    </div>
                                </div>
                            </label>
                        </td>
                        {{-- Make change in ui  --}}

                        <td>
                            <div class="flex space-x-2">
                                <button class="text-indigo-600 hover:text-indigo-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </button>
                                <button class="text-red-600 hover:text-red-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>




@endsection
