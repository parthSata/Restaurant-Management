@extends('layouts.restaurant')

@section('title', 'Contact Us')

@section('content')

    <a href="{{ route('contact', ['id' => $restaurants->id]) }}">Contact Us</a>

    <main class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-12">Contact Us</h1>

        <div class="flex flex-wrap justify-center gap-6 mb-12">
            <div class="bg-orange-500 text-white p-4 rounded-lg flex items-center space-x-4 max-w-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Surat - Dumas Rd, Behind Iscon Mall, Piplod, Surat, Gujarat 395007</span>
            </div>
            <div class="bg-orange-500 text-white p-4 rounded-lg flex items-center space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span>spicygarden12@gmail.com</span>
            </div>
            <div class="bg-orange-500 text-white p-4 rounded-lg flex items-center space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <span>+917802800997</span>
            </div>
        </div>

        <div class="flex flex-wrap md:flex-nowrap gap-8">
            <div class="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-4">Get In Touch</h2>
                <form>
                    <div class="mb-4">
                        <input type="text" placeholder="Your Name" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <input type="email" placeholder="Your email" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <textarea placeholder="Type message" rows="4" class="w-full p-2 border border-gray-300 rounded-md"></textarea>
                    </div>
                    <button type="submit"
                        class="bg-orange-500 text-white px-6 py-2 rounded-md hover:bg-orange-600">Submit</button>
                </form>
            </div>
            <div class="w-full md:w-1/2">
                <img src="/placeholder.svg?height=400&width=600" alt="Google Maps"
                    class="w-full h-full object-cover rounded-lg">
            </div>
        </div>
    </main>

@endsection
