@extends('layouts.restaurant')

@section('title', 'Reservation')

@section('content')

    <div class="">
        <div class="container mx-auto ">
            <!-- Hero Section -->
            <div class="bg-white rounded-lg  overflow-hidden mb-8">
                <div class="md:flex">
                    <div class="md:flex-shrink-0">
                        <img class="h-[300px] w-full object-cover " src="{{ asset('image/our-story-img.png') }}"
                            alt="Culinary dishes">
                    </div>
                    <div class="p-8">
                        <div class="uppercase tracking-wide text-sm text-orange-500 font-semibold">TABLE READY</div>
                        <h1
                            class="mt-2 text-2xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-3xl sm:leading-9">
                            Reserve Your Culinary Experience
                        </h1>
                        <p class="mt-3 text-base leading-6 text-gray-500">
                            Secure your seat at our acclaimed restaurant and savor unforgettable dishes. Book now for an
                            exceptional dining adventure!
                        </p>
                    </div>
                </div>
            </div>

            {{-- <!-- Reservation Form Section -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 w-full  mx-4">
                <div class="text-center mb-6">
                    <p class="text-orange-500 text-sm font-semibold uppercase tracking-wide">RESERVATION</p>
                    <h1 class="text-3xl font-bold text-gray-900 mt-2">Book A Table For You</h1>
                </div>
                <form class="space-y-6">
                    <div class="grid grid-cols- items-center md:grid-cols-4 gap-6">
                        <div class="flex flex-col gap-2">
                            <label for="total-person" class="block text-sm font-medium text-gray-700 mb-1">
                                <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Total Person
                            </label>
                            <input type="number" name="total-person" id="total-person"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-orange-500"
                                placeholder="Number of guests">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="expected-date" class="block text-sm font-medium text-gray-700 mb-1">
                                <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Expected Date
                            </label>
                            <input type="date" name="expected-date" id="expected-date"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-orange-500" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="expected-time" class="block text-sm font-medium text-gray-700 mb-1">
                                <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Expected Time
                            </label>
                            <input type="time" name="expected-time" id="expected-time"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-orange-500" />
                        </div>
                        <div class="text-center">
                            <button type="submit"
                                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition duration-150 ease-in-out">
                                Check Availability
                            </button>
                        </div>
                    </div>

                </form>
            </div> --}}

            <!-- Reservation Form Section -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 w-full mx-4">
                <div class="text-center mb-6">
                    <p class="text-orange-500 text-sm font-semibold uppercase tracking-wide">RESERVATION</p>
                    <h1 class="text-3xl font-bold text-gray-900 mt-2">Book A Table For You</h1>
                </div>
                <form id="reservation-form" class="space-y-6">
                    @csrf
                    <input type="hidden" name="_token" value="fchUTb40TR3ywdy6GZlTOmvSecMXzlb9EYpoLe5Y">

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <div class="flex flex-col gap-2">
                            <label for="total-person" class="block text-sm font-medium text-gray-700 mb-1">
                                Total Person
                            </label>
                            <input type="number" name="total_person" id="total-person"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-orange-500"
                                placeholder="Number of guests">
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="expected-date" class="block text-sm font-medium text-gray-700 mb-1">Expected
                                Date</label>
                            <input type="date" name="expected_date" id="expected-date"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-orange-500"
                                min="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="expected-time" class="block text-sm font-medium text-gray-700 mb-1">Expected
                                Time</label>
                            <input type="time" name="expected_time" id="expected-time"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-orange-500">
                        </div>
                        <div class="text-center">
                            <button type="submit"
                                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition duration-150 ease-in-out">
                                Check Availability
                            </button>
                        </div>
                    </div>
                </form>
            </div>


            <!-- Availability Table Section -->
            <div id="available-tables" class="mt-6"></div>

            <!-- Hidden Booking Modal -->
            <div id="booking-dialog" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                <div class="bg-white rounded-lg p-6 w-full max-w-md">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold">Booking Details</h2>
                        <button onclick="closeBookingDialog()" class="text-gray-500 hover:text-gray-700">&times;</button>
                    </div>

                    <form action="{{ route('storeBooking') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" id="table-id" name="table_id">

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                            <input type="text" name="name" required class="w-full px-3 py-2 border rounded-md">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                            <input type="email" name="email" required class="w-full px-3 py-2 border rounded-md">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone:</label>
                            <input type="text" name="phone" required class="w-full px-3 py-2 border rounded-md">
                        </div>
                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700">Notes:</label>
                            <textarea name="notes" rows="3" class="w-full px-3 py-2 border rounded-md"></textarea>
                        </div>

                        <div class="flex justify-end gap-4">
                            <button type="button" onclick="closeBookingDialog()"
                                class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100">
                                Discard
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('reservation-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('{{ route('checkAvailability') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        renderAvailableTables(data.data);
                    } else {
                        console.error('Error fetching data:', data);
                    }
                })
                .catch(error => {
                    console.error('Request failed:', error);
                });
        });

        function renderAvailableTables(tables) {
            const container = document.getElementById('available-tables');
            container.innerHTML = '';

            if (tables.length === 0) {
                container.innerHTML = '<p class="text-center text-gray-500">No tables available.</p>';
                return;
            }

            tables.forEach(table => {
                const tableCard = document.createElement('div');
                tableCard.className = 'border rounded-lg p-4 shadow-md mb-4';

                tableCard.innerHTML = `
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="font-semibold text-lg">${table.title}</h3>
                        <p>Capacity: ${table.capacity}</p>
                        <p>Status: ${table.is_booked}</p>
                    </div>
                    <button onclick="openBookingDialog(${table.id})" class="bg-orange-500 text-white px-4 py-2 rounded-md">
                        Book Now
                    </button>
                </div>
            `;
                container.appendChild(tableCard);
            });
        }



        function openBookingDialog(tableId) {
            document.getElementById('table-id').value = tableId;
            document.getElementById('booking-dialog').classList.remove('hidden');
        }

        function closeBookingDialog() {
            document.getElementById('booking-dialog').classList.add('hidden');
        }
    </script>
@endsection
