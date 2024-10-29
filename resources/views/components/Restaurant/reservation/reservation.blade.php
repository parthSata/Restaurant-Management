@extends('layouts.restaurant')

@section('title', $restaurants->pluck('restaurant_name')->implode(', ')) <!-- Join all names with a comma -->

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

            <!-- Reservation Form Section -->
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
            </div>
        </div>
    </div>


@endsection
