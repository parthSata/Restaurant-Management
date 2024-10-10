@extends('layouts.seller')

@section('title', 'Add Items')

@section('content')

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
                <a href="{{ route('addOns.create') }}"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-300">
                    Add
                    </button>
            </div>
            <table class="min-w-full">
                <thead>
                    <tr class="text-left text-gray-500 text-sm">
                        <th class="pb-4">NAME</th>
                        <th class="pb-4">ADD ON CATEGORY</th>
                        <th class="pb-4">PRICE</th>
                        <th class="pb-4">STATUS</th>
                        <th class="pb-4">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t border-gray-200">
                        <td class="py-4">
                            <div class="flex items-center">
                                <img src="/placeholder.svg?height=40&width=40" alt="Rum Old Fashioned"
                                    class="w-10 h-10 rounded-full mr-3">
                                <span class="text-gray-700">Rum Old Fashioned</span>
                            </div>
                        </td>
                        <td class="py-4">Drinks</td>
                        <td class="py-4">$ 250.00</td>
                        <td class="py-4">
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
                        <td class="py-4">
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
                    <tr class="border-t border-gray-200">
                        <td class="py-4">
                            <div class="flex items-center">
                                <img src="/placeholder.svg?height=40&width=40" alt="Mojito"
                                    class="w-10 h-10 rounded-full mr-3">
                                <span class="text-gray-700">Mojito</span>
                            </div>
                        </td>
                        <td class="py-4">Drinks</td>
                        <td class="py-4">$ 60.00</td>
                        <td class="py-4">
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
                        <td class="py-4">
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
                    <tr class="border-t border-gray-200">
                        <td class="py-4">
                            <div class="flex items-center">
                                <img src="/placeholder.svg?height=40&width=40" alt="Negroni"
                                    class="w-10 h-10 rounded-full mr-3">
                                <span class="text-gray-700">Negroni</span>
                            </div>
                        </td>
                        <td class="py-4">Drinks</td>
                        <td class="py-4">$ 120.00</td>
                        <td class="py-4">
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
                        <td class="py-4">
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
                    <tr class="border-t border-gray-200">
                        <td class="py-4">
                            <div class="flex items-center">
                                <img src="/placeholder.svg?height=40&width=40" alt="Thums Up"
                                    class="w-10 h-10 rounded-full mr-3">
                                <span class="text-gray-700">Thums Up</span>
                            </div>
                        </td>
                        <td class="py-4">Drinks</td>
                        <td class="py-4">$ 50.00</td>
                        <td class="py-4">
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
                        <td class="py-4">
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

    <style>
        /* Custom styles for the toggle switch */
        input:checked~.dot {
            transform: translateX(100%);
            background-color: #4f46e5;
        }
    </style>


@endsection
