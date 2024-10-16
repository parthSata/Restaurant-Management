@extends('layouts.seller')

@section('title', 'Add Items')

@section('content')

    <div class="container mx-auto p-6 bg-gray-50">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <div class="flex justify-between mb-4">
                    <div class="relative flex justify-center items-center gap-2">
                        <div class="relative">
                            <!-- Search Input -->
                            <input type="text" id="search" placeholder="Search"
                                class="w-full pl-10 py-2 border rounded-lg">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <ul class="flex gap-4 items-center">
                            <a href="{{ route('addOns.index') }}" class="">
                                <li class="cursor-pointer hover:underline text-lg font-serif">Add On Category</li>
                            </a>
                            <a href="{{ route('addOns.showItems') }}" class="">
                                <li class="cursor-pointer hover:underline text-lg font-serif">Add On Items</li>
                            </a>
                        </ul>
                    </div>
                </div>
                <a href="{{ route('items.create') }}"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-300">
                    Add
                </a>
            </div>

            <!-- Items Table -->
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
                <tbody id="items-list">
                    @foreach ($items as $item)
                        <tr class="border-t border-gray-200">
                            <td class="py-4">
                                <div class="flex items-center">
                                    <img src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}"
                                        class="w-10 h-10 rounded-full mr-3">
                                    <span class="text-gray-700">{{ $item->name }}</span>
                                </div>
                            </td>
                            <td class="py-4">{{ $item->category->name }}</td>
                            <td class="py-4">${{ $item->price }}</td>
                            <td class="py-4">
                                <label class="flex items-center cursor-pointer">
                                    <div class="relative">
                                        <input type="checkbox" class="sr-only" {{ $item->status ? 'checked' : '' }}>
                                        <div class="w-10 h-6 bg-gray-200 rounded-full shadow-inner"></div>
                                        <div
                                            class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition">
                                        </div>
                                    </div>
                                </label>
                            </td>
                            <td class="py-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('items.edit', $item->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        <!-- Edit icon SVG here -->
                                    </a>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:text-red-900">
                                            <!-- Delete icon SVG here -->
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

            {{-- <div class="mt-4">
                {{ $items->links() }}
            </div> --}}
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var query = $(this).val();

                $.ajax({
                    url: "{{ route('addOns.showItems') }}", // Your route for fetching items
                    method: "GET",
                    data: {
                        search: query
                    },
                    success: function(data) {
                        $('#items-list').html(data);
                    },
                    error: function() {
                        console.log('Error fetching data');
                    }
                });
            });
        });
    </script>


@endsection
