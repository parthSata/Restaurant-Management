@extends('layouts.admin')

@section('title', 'Enquiries')

@section('content')
    <div class="mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="flex justify-between mb-4">
            <div class="relative flex justify-center items-center gap-2">
                <form method="GET" action="{{ route('customers.showEnquiries') }}">
                    <div>
                        <input type="text" value="{{ request('search') }}" placeholder="Search"
                            class="w-full pl-10 py-2 border rounded-lg">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </form>
                <ul class="flex gap-4">
                    <a href="{{ route('customers.index') }}">
                        <li class="cursor-pointer hover:underline text-lg font-serif">Customers</li>
                    </a>
                    <a href="{{ route('customers.showEnquiries') }}">
                        <li class="cursor-pointer hover:underline text-lg font-serif">Enquiries</li>
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
                @forelse($enquiries as $contact)
                    <tr class="border-t">
                        <td class="px-6 py-4">{{ $contact->name }}</td>
                        <td class="px-6 py-4">{{ $contact->email }}</td>
                        <td class="px-6 py-4">
                            <span class="bg-blue-100 text-blue-800 p-1 rounded-full text-sm">{{ $contact->phone }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $contact->message }}</td>
                        <td class="px-6 py-4">
                            <form action="{{ route('customers.deleteEnquiry', $contact->id) }}" method="POST">
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
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-end">
        <div class="flex items-center gap-2 mt-4 justify-end">
            <div class="">
                <span class="text-sm text-gray-600">Show Enquiries</span>
            </div>
            <form method="GET" action="{{ route('customers.showEnquiries') }}" id="itemsPerPageForm">
                <select name="itemsPerPage" onchange="document.getElementById('itemsPerPageForm').submit()"
                    class="h-9 w-20 rounded-md border border-gray-200 bg-white px-3 text-sm">
                    <option value="10" {{ request('itemsPerPage') == 10 ? 'selected' : '' }}>10</option>
                    <option value="20" {{ request('itemsPerPage') == 20 ? 'selected' : '' }}>20</option>
                    <option value="50" {{ request('itemsPerPage') == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ request('itemsPerPage') == 100 ? 'selected' : '' }}>100</option>
                </select>
            </form>
        </div>
    </div>
@endsection
