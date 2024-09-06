@extends('layouts.app')

@section('title', 'Contact Us Page')

@section('content')

    <div class="">
        <main class="container mx-auto flex flex-col gap-6 px-4 py-8">
            <div class="">
                <h1 class="text-4xl font-bold text-center mb-8">Contact Us</h1>

                <h2 class="text-2xl font-semibold text-center mb-8">Get In Touch With Us</h2>

                <div class="flex flex-col md:flex-row justify-between items-start space-y-8 md:space-y-0 md:space-x-8">
                    <div class="w-full md:w-1/2 space-y-4">
                        <div class="flex items-center gap-4 bg-yellow-400 p-4 rounded-lg">
                            <i class="fas fa-map-marker-alt text-2xl "></i>
                            <p>G-303, Atlanta Shopping Mall, Nr. Sudama Chowk, Mota Varachha, Surat - 394101, Gujarat, India
                            </p>
                        </div>
                        <div class="flex items-center gap-4 bg-yellow-400 p-4 rounded-lg">
                            <i class="fa-solid fa-phone text-2xl"></i>
                            <p>+91 8501960177</p>
                        </div>
                        <div class="flex items-center gap-4 bg-yellow-400 p-4 rounded-lg">
                            <i class="fas fa-envelope text-2xl"></i>
                            <p>labs@infyom.in</p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <span class=""><iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14751.288800621025!2d70.59453208402948!3d22.4357169734269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959db161a979c8b%3A0x428a8c265190c571!2sPaddhari%2C%20Gujarat%20360110!5e0!3m2!1sen!2sin!4v1725459272869!5m2!1sen!2sin"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe></span>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-6">
                <div class="">
                    <h2 class="text-2xl font-semibold text-center ">We Want To Here From Yo</h2>
                </div>

                <form class=" flex flex-col justify-center ">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <input type="text" placeholder="Your Name"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        <input type="email" placeholder="Your Email"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    </div>
                    <div class="mb-6">
                        <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                            <span class="bg-gray-100 px-4 py-2 text-gray-500">+91</span>
                            <input type="number" placeholder="Phone Number"
                                class="w-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400  [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                        </div>
                    </div>
                    <div class="mb-6">
                        <textarea placeholder="Type your message..." rows="4"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400 resize-none"
                            rows="5" cols="5"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="bg-yellow-400 text-gray-900 px-8 py-3 rounded-full font-semibold hover:bg-yellow-500 transition duration-300">Send
                            Message</button>
                    </div>
                </form>
            </div>
        </main>
    </div>

@endsection
