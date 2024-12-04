@extends('layouts.admin')

@section('title', 'Customers')

@section('content')

    <div class="container mx-auto p-4">
        <div class="flex justify-between mb-4">
            <div class="relative flex justify-center items-center gap-2">
                <input type="text" placeholder="Search" class="w-full pl-10 py-2 border rounded-lg">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </div>
            <ul class="flex gap-4">
                <a href="{{ route('customers.index') }}">
                    <li class="cursor-pointer hover:underline text-lg font-serif">Customers</li>
                </a>
                <a href="{{ route('customers.showEnquiries') }}">
                    <li class="cursor-pointer hover:underline text-lg font-serif">Enquiries</li>
                </a>
            </ul>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 border border-green-400 p-4 rounded-md text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white w-full shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                            Verified</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Orders
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($customers as $customer)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40"
                                            alt="{{ $customer->name }}">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-blue-600">{{ $customer->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $customer->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <!-- Toggle for Email Verified -->
                                <label class="switch">
                                    <input type="checkbox" {{ $customer->email_verified ? 'checked' : '' }}
                                        class="toggle-email" data-id="{{ $customer->id }}">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <!-- Toggle for Status -->
                                <label class="switch">
                                    <input type="checkbox" {{ $customer->status ? 'checked' : '' }} class="toggle-status"
                                        data-id="{{ $customer->id }}">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">{{ $customer->orders_count }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this customer?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
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

@endsection
