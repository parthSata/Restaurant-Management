@extends('layouts.seller')

@section('title', 'Booking')

@section('content')
    <div class="container mx-auto p-6 bg-gray-50">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="mb-6">
                <div class="flex justify-between mb-4">
                    <div class="relative flex justify-center items-center gap-2">
                        <div>
                            <input type="text" placeholder="Search" value="{{ $search ?? '' }}"
                                class="w-full pl-10 py-2 border rounded-lg">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <ul class="flex gap-4 items-center">
                            <a href="{{ route('reservation.index') }}" class="">
                                <li class="cursor-pointer hover:underline text-lg font-serif">Booking</li>
                            </a>
                            <a href="{{ route('reservation.showTables') }}" class="">
                                <li class="cursor-pointer hover:underline text-lg font-serif">Tables</li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
            <table class="min-w-full">
                <thead>
                    <tr class="text-left text-gray-500 text-sm">
                        <th class="pb-4">TABLE</th>
                        <th class="pb-4">NAME</th>
                        <th class="pb-4">PHONE</th>
                        <th class="pb-4">EXPECTED PERSON</th>
                        <th class="pb-4">EXPECTED DATE</th>
                        <th class="pb-4">EXPECTED TIME</th>
                        <th class="pb-4">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr class="border-t border-gray-200">
                            <td class="py-4">
                                <div class="flex items-center">
                                    <img src="/placeholder.svg?height=40&width=40" alt="{{ $booking->table_type }}"
                                        class="w-10 h-10 rounded-full mr-3">
                                    <span class="text-blue-500">{{ $booking->table_type }}</span>
                                </div>
                            </td>
                            <td>{{ $booking->name }}</td>
                            <td>
                                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">
                                    {{ $booking->phone }}
                                </span>
                            </td>
                            <td>
                                <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">
                                    {{ $booking->expected_person }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($booking->expected_date)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->expected_time)->format('H:i:s') }}</td>
                            <td>
                                <button class="text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
