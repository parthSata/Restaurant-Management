@extends('layouts.admin')

@section('title', 'Restaurants')

@section('content')

    <div class="">
        <div class="container mx-auto p-4">
            <div class="flex justify-between mb-4">
                <div class="relative">
                    <input type="text" placeholder="Search" class="pl-10 pr-4 py-2 border rounded-lg w-64">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                <a href="{{ route('restaurants.create') }}"  class="bg-blue-500 text-white px-4 py-2 rounded-lg">Add</a>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Is
                                Featured</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Restaurant Slug</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                                Verified</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Current Plan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Impersonate</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40"
                                            alt="Restaurant logo">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-blue-600">Fresh</div>
                                        <div class="text-sm text-gray-500">fresh@gmail.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md text-sm">Make Featured <i
                                        class="fas fa-chevron-down ml-1"></i></button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900">Ht <i class="fas fa-external-link-alt ml-1"></i></span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                <span
                                    class="ml-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Expired</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Standard</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md text-sm">Impersonate</button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-blue-600 hover:text-blue-900 mr-2"><i class="fas fa-edit"></i></button>
                                <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40"
                                            alt="Restaurant logo">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-blue-600">Fresh</div>
                                        <div class="text-sm text-gray-500">fresh@gmail.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md text-sm">Make Featured <i
                                        class="fas fa-chevron-down ml-1"></i></button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900">Ht <i class="fas fa-external-link-alt ml-1"></i></span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                <span
                                    class="ml-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Expired</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Standard</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md text-sm">Impersonate</button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-blue-600 hover:text-blue-900 mr-2"><i class="fas fa-edit"></i></button>
                                <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40"
                                            alt="Restaurant logo">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-blue-600">Fresh</div>
                                        <div class="text-sm text-gray-500">fresh@gmail.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md text-sm">Make Featured <i
                                        class="fas fa-chevron-down ml-1"></i></button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900">Ht <i class="fas fa-external-link-alt ml-1"></i></span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                <span
                                    class="ml-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Expired</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Standard</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md text-sm">Impersonate</button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-blue-600 hover:text-blue-900 mr-2"><i
                                        class="fas fa-edit"></i></button>
                                <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40"
                                            alt="Restaurant logo">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-blue-600">Fresh</div>
                                        <div class="text-sm text-gray-500">fresh@gmail.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md text-sm">Make Featured <i
                                        class="fas fa-chevron-down ml-1"></i></button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900">Ht <i
                                        class="fas fa-external-link-alt ml-1"></i></span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                <span
                                    class="ml-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Expired</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Standard</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md text-sm">Impersonate</button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-blue-600 hover:text-blue-900 mr-2"><i
                                        class="fas fa-edit"></i></button>
                                <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40"
                                            alt="Restaurant logo">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-blue-600">Fresh</div>
                                        <div class="text-sm text-gray-500">fresh@gmail.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md text-sm">Make Featured <i
                                        class="fas fa-chevron-down ml-1"></i></button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900">Ht <i
                                        class="fas fa-external-link-alt ml-1"></i></span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                <span
                                    class="ml-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Expired</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Standard</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md text-sm">Impersonate</button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-blue-600 hover:text-blue-900 mr-2"><i
                                        class="fas fa-edit"></i></button>
                                <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40"
                                            alt="Restaurant logo">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-blue-600">Fresh</div>
                                        <div class="text-sm text-gray-500">fresh@gmail.com</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md text-sm">Make Featured <i
                                        class="fas fa-chevron-down ml-1"></i></button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900">Ht <i
                                        class="fas fa-external-link-alt ml-1"></i></span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                <span
                                    class="ml-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Expired</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Standard</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md text-sm">Impersonate</button>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <button class="text-blue-600 hover:text-blue-900 mr-2"><i
                                        class="fas fa-edit"></i></button>
                                <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <style>
            /* Custom styles for the toggle switch */
            .switch {
                position: relative;
                display: inline-block;
                width: 50px;
                height: 24px;
            }

            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                transition: .4s;
                border-radius: 34px;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 16px;
                width: 16px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                transition: .4s;
                border-radius: 50%;
            }

            input:checked+.slider {
                background-color: #2196F3;
            }

            input:checked+.slider:before {
                transform: translateX(26px);
            }
        </style>
    </div>

@endsection
