@extends('layouts.admin')

@section('title', 'Restaurant Home')

@section('content')
    <div class="">
        <main>
            <section class="bg-gray-100 py-20">
                <div class="container mx-auto px-4 flex items-center">
                    <div class="w-1/2 pr-8">
                        <h1 class="text-5xl font-bold text-orange-500 mb-4">Eat Today FOOD COMBO</h1>
                        <h2 class="text-3xl font-semibold text-gray-800 mb-4">Live another day</h2>
                        <p class="text-gray-600 mb-6">Dail a Meal and SAVE up to 30% on Sides & Drinks.</p>
                        <button class="bg-orange-500 text-white px-6 py-3 rounded-full text-lg font-semibold">Book a
                            Table</button>
                    </div>
                    <div class="w-1/2 relative">
                        <div class="w-96 h-96 bg-orange-500 rounded-full absolute top-0 right-0 -z-10"></div>
                        <img src="/placeholder.svg?height=400&width=400" alt="Salad with salmon"
                            class="w-full rounded-full shadow-lg">
                    </div>
                </div>
            </section>

            <section class="py-20">
                <div class="container mx-auto px-4 flex items-center">
                    <div class="w-1/2 pr-8">
                        <img src="/placeholder.svg?height=400&width=400" alt="Various dishes"
                            class="w-full rounded-lg shadow-lg">
                    </div>
                    <div class="w-1/2 pl-8">
                        <h3 class="text-orange-500 font-semibold mb-2">DISCOVER</h3>
                        <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Story</h2>
                        <p class="text-gray-600">Welcome to Salad Garden, where culinary excellence meets warm hospitality.
                            Located in the heart of town, we are dedicated to creating memorable dining experiences for our
                            guests.</p>
                    </div>
                </div>
            </section>

            <section class="bg-white py-20">
                <div class="container mx-auto px-4">
                    <div class="grid grid-cols-6 gap-8">
                        <div class="text-center">
                            <img src="/placeholder.svg?height=100&width=100" alt="Paratha Dilwale Chhole"
                                class="w-24 h-24 mx-auto rounded-full mb-2">
                            <p class="text-sm">Paratha Dilwale Chhole</p>
                        </div>
                        <div class="text-center">
                            <img src="/placeholder.svg?height=100&width=100" alt="Butter Chicken"
                                class="w-24 h-24 mx-auto rounded-full mb-2">
                            <p class="text-sm">Butter Chicken</p>
                        </div>
                        <div class="text-center">
                            <img src="/placeholder.svg?height=100&width=100" alt="Kimchi"
                                class="w-24 h-24 mx-auto rounded-full mb-2">
                            <p class="text-sm">Kimchi</p>
                        </div>
                        <div class="text-center">
                            <img src="/placeholder.svg?height=100&width=100" alt="Italian Pizza"
                                class="w-24 h-24 mx-auto rounded-full mb-2">
                            <p class="text-sm">Italian Pizza</p>
                        </div>
                        <div class="text-center">
                            <img src="/placeholder.svg?height=100&width=100" alt="Lamington"
                                class="w-24 h-24 mx-auto rounded-full mb-2">
                            <p class="text-sm">Lamington</p>
                        </div>
                        <div class="text-center">
                            <img src="/placeholder.svg?height=100&width=100" alt="Coffee"
                                class="w-24 h-24 mx-auto rounded-full mb-2">
                            <p class="text-sm">Coffee</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>

    </div>

@endsection
