@extends('layouts.admin')

@section('title', 'Enquiries')

@section('content')

    <div class=" mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="flex justify-between mb-4">
            <div class="relative flex  justify-center items-center gap-2">
                <div class="">
                    <input type="text" placeholder="Search" class="w-full pl-10  py-2 border rounded-lg">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
                <ul class=" flex  gap-4">
                    <a href="{{ route('customers.index') }}" class="">
                        <li class=" cursor-pointer hover:underline text-lg font-serif">Customers</li>
                    </a>
                    <a href="{{ route('customers.showEnquiries') }}" class="">
                        <li class=" cursor-pointer hover:underline text-lg font-serif">Enquiries</li>
                    </a>
                </ul>
            </div>
        </div>
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 text-left">
                    <th class="px-6 py-3 text-gray-500 font-medium">NAME</th>
                    <th class="px-6 py-3 text-gray-500 font-medium">EMAIL</th>
                    <th class="px-6 py-3 text-gray-500 font-medium">CONTACT</th>
                    <th class="px-6 py-3 text-gray-500 font-medium">MESSAGE</th>
                    <th class="px-6 py-3 text-gray-500 font-medium">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t">
                    <td class="px-6 py-4">Scott M.</td>
                    <td class="px-6 py-4">pat@aneesho.com</td>
                    <td class=""><span class="bg-blue-100 text-blue-800 p-1 rounded-full text-sm">+91
                            8102440753</span></td>
                    <td class="px-6 py-4 text-sm text-gray-500">Just wanted to ask if you would be interested in getting
                        external help with graphic design? We do all design work like banners, advertisements, brochures,
                        logos, flyers, etc. for a fixed monthly fee. We don't charge for each task. What kind of work do you
                        need on a regular basis? Let me know and I'll share my portfolio with you.</td>
                    <td class="px-6 py-4">
                        <button class="text-red-500 hover:text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </td>
                </tr>
                <tr class="border-t">
                    <td class="px-6 py-4">Scott M.</td>
                    <td class="px-6 py-4">pat@aneesho.com</td>
                    <td class=""><span class="bg-blue-100 text-blue-800 p-1 rounded-full text-sm">+91
                            8102440753</span></td>
                    <td class="px-6 py-4 text-sm text-gray-500">Just wanted to ask if you would be interested in getting
                        external help with graphic design? We do all design work like banners, advertisements, brochures,
                        logos, flyers, etc. for a fixed monthly fee. We don't charge for each task. What kind of work do you
                        need on a regular basis? Let me know and I'll share my portfolio with you.</td>
                    <td class="px-6 py-4">
                        <button class="text-red-500 hover:text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </td>
                </tr>
                <tr class="border-t">
                    <td class="px-6 py-4">Scott M.</td>
                    <td class="px-6 py-4">pat@aneesho.com</td>
                    <td class=""><span class="bg-blue-100 text-blue-800 p-1 rounded-full text-sm">+91
                            8102440753</span></td>
                    <td class="px-6 py-4 text-sm text-gray-500">Just wanted to ask if you would be interested in getting
                        external help with graphic design? We do all design work like banners, advertisements, brochures,
                        logos, flyers, etc. for a fixed monthly fee. We don't charge for each task. What kind of work do you
                        need on a regular basis? Let me know and I'll share my portfolio with you.</td>
                    <td class="px-6 py-4">
                        <button class="text-red-500 hover:text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

@endsection
