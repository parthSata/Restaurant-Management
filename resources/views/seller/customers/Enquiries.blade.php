@extends('layouts.seller')

@section('title', 'Enquiries')

@section('content')

    <div class="w-full mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <div class="flex justify-between mb-4">
                <div class="relative flex  justify-center items-center gap-2">
                    <div class="">
                        <input type="text" placeholder="Search" class="w-full pl-10  py-2 border rounded-lg">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    <ul class="flex gap-4 items-center">
                        <a href="{{ route('customer.index') }}" class="">
                            <li class=" cursor-pointer hover:underline text-lg font-serif">Customers</li>
                        </a>
                        <a href="{{ route('customer.showEnquiries') }}" class="">
                            <li class=" cursor-pointer hover:underline text-lg font-serif">Enquiries</li>
                        </a>
                    </ul>
                </div>
            </div>

            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-500 border-b">
                        <th class="pb-3 font-medium">
                            NAME
                            <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </th>
                        <th class="pb-3 font-medium">
                            EMAIL
                            <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </th>
                        <th class="pb-3 font-medium">
                            MESSAGE
                            <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </th>
                        <th class="pb-3 font-medium">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-4">Qwerty</td>
                        <td class="py-4">qwert@gmail.com</td>
                        <td class="py-4">Hello sir good morning 🙏 🌈</td>
                        <td class="py-4">
                            <button class="text-red-500 hover:text-red-700">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-4">Dexter Hardy</td>
                        <td class="py-4">hahi@mailinator.com</td>
                        <td class="py-4">Accusamus reprehende</td>
                        <td class="py-4">
                            <button class="text-red-500 hover:text-red-700">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-4">Blossom Watts</td>
                        <td class="py-4">fajyrucexy@mailinator.com</td>
                        <td class="py-4">Consequat Culpa du</td>
                        <td class="py-4">
                            <button class="text-red-500 hover:text-red-700">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-4">Kelly Hampton</td>
                        <td class="py-4">sebytovyb@mailinator.com</td>
                        <td class="py-4">Nobis debitis quae i</td>
                        <td class="py-4">
                            <button class="text-red-500 hover:text-red-700">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-4">Zephr Anderson</td>
                        <td class="py-4">pogegal@mailinator.com</td>
                        <td class="py-4">Quae quo in earum te</td>
                        <td class="py-4">
                            <button class="text-red-500 hover:text-red-700">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-4">Jana Hopkins</td>
                        <td class="py-4">kegavev@mailinator.com</td>
                        <td class="py-4">In fugit et nesciun</td>
                        <td class="py-4">
                            <button class="text-red-500 hover:text-red-700">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection
