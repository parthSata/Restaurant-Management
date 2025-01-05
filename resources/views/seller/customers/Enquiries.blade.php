@extends('layouts.seller')

@section('title', 'Enquiries')

@section('content')

    <div class="w-full mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <div class="flex justify-between mb-4">
                <div class="relative flex  justify-center items-center gap-2">
                    <form method="GET" action="{{ route('customer.showEnquiries') }}" class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search"
                            class="w-full pl-10 py-2 border rounded-lg" />
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </form>

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
                    @forelse($enquiries as $contact)
                        <tr class="border-t">
                            <td class="px-6 py-4">{{ $contact->name }}</td>
                            <td class="px-6 py-4">{{ $contact->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $contact->message }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ route('customer.deleteEnquiry', $contact->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No enquiries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


@endsection
