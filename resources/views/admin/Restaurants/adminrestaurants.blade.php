@extends('layouts.admin')

@section('title', 'Restaurants')

@section('content')

    <div class="">
        <div class="container mx-auto p-4">
            <div class="flex justify-between mb-4">
                <form method="GET" action="{{ route('restaurants.index') }}" class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search"
                        class="pl-10 pr-4 py-2 border rounded-lg w-64" />
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </form>
                <a href="{{ route('restaurants.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Add</a>
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
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <script>
                            function previewImage(event, previewId) {
                                const file = event.target.files[0];
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    document.getElementById(previewId).src = e.target.result;
                                };
                                reader.readAsDataURL(file);
                            }
                        </script>
                        @foreach ($restaurants as $restaurant)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="i">
                                            <img src="{{ asset('/storage/Uploaded_Images/' . $restaurant->logo) }}"
                                                class="h-10 w-10 rounded-full" alt="Restaurant Logo" />
                                        </div>

                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-blue-600">
                                                {{ $restaurant->restaurant_name }}</div>
                                            <div class="text-sm text-gray-500">{{ $restaurant->contact_email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-md text-sm">
                                        {{ $restaurant->is_featured ? 'Featured' : 'Make Featured' }}
                                        <i class="fas fa-chevron-down ml-1"></i>
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm text-gray-900">{{ $restaurant->restaurant_slug }} <i
                                            class="fas fa-external-link-alt ml-1"></i></span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <label class="switch">
                                        <input type="checkbox" {{ $restaurant->email_verified ? 'checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $restaurant->status == 'Pending' ? 'yellow' : ($restaurant->status == 'Expired' ? 'red' : 'green') }}-100 text-{{ $restaurant->status == 'Pending' ? 'yellow' : ($restaurant->status == 'Expired' ? 'red' : 'green') }}-800">{{ $restaurant->status }}</span>
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('restaurants.edit', $restaurant->id) }}?edit=true"
                                        class="text-blue-600 hover:text-blue-900 mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
