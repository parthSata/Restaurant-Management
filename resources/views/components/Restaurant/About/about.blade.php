@extends('layouts.restaurant')

@section('title', $restaurants->name)

@section('content')

    <div class="">
        <main class="container mx-auto px-4 py-8">
            <h1 class="text-4xl font-bold text-center mb-12">About Us</h1>

            <div class="flex flex-col md:flex-row items-center mb-12">
                <div class="md:w-1/2 mb-6 md:mb-0 md:pr-8">
                    <h2 class="text-2xl font-semibold mb-4">Our mission is to save your time</h2>
                    <p class="text-gray-600 mb-4">
                        At SPICY GARDEN RESTAURANT, we have a mission to save your precious time while providing a
                        delightful dining experience. We understand the demands of your busy lifestyle and strive to offer
                        efficient and convenient service without compromising on quality. Here's how we fulfill our mission:
                        Fast & Friendly Service, Online Ordering System, Convenient Location, and Takeout & Delivery
                        Options.
                    </p>
                </div>
                <div class="md:w-1/2 flex justify-end space-x-4">
                    <img src="https://restaurant-management.infyom.com/merchant-theme/images/about-mission-1.png"
                        alt="Chef cooking" class="w-40 h-40 object-cover rounded-lg shadow-md">
                    <img src="https://restaurant-management.infyom.com/merchant-theme/images/about-mission-2.png"
                        alt="Chef preparing food" class="w-40 h-40 object-cover rounded-lg shadow-md mt-8">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-orange-500 mb-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Free Delivery</h3>
                    <p class="text-gray-600">Enjoy free delivery when you order food! Our wide selection of delicious is
                        delivered to your doorstep at no extra cost.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-orange-500 mb-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Save Your Time</h3>
                    <p class="text-gray-600">Choose from a variety of restaurants, browse menus, customize your order, and
                        enjoy quick delivery. Say goodbye to long waits.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-orange-500 mb-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Regular Discounts</h3>
                    <p class="text-gray-600">Enjoy great savings on your favorite dishes! Experience regular discounts and
                        special offers for a delightful dining experience. Don't miss out!</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-orange-500 mb-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Variety Food</h3>
                    <p class="text-gray-600">Experience a world of flavors at our restaurant! Indulge in a diverse range of
                        cuisines, from exotic international dishes to comforting local favorites.</p>
                </div>
            </div>
            <div class="flex items-center flex-wrap sm:flex-wrap  lg:flex-nowrap gap-6">
                <div class="flex flex-col  items-center mb-12">
                    <div class=" ">
                        <h2 class="text-2xl font-semibold mb-4">Outdoor Dining</h2>
                        <p class="text-gray-600 mb-4">
                            Outdoor dining provides an opportunity to connect with nature. You can enjoy the beauty of
                            trees,
                            flowers, and landscaping while savoring your meal. Some restaurants offer views of mountains,
                            beaches, or cityscapes, depending on the location. This connection to nature can enhance your
                            overall dining experience and create a sense of relaxation.
                        </p>
                    </div>
                </div>
                <div class="flex flex-col  items-center">
                    <div class="">
                        <h2 class="text-2xl font-semibold mb-4">Gluten-Free and Vegan Options</h2>
                        <p class="text-gray-600 mb-4">
                            Gluten-free diets are essential for people with celiac disease or gluten sensitivity, while many
                            people choose vegan diets for ethical, environmental, or health reasons, seeking lighter,
                            plant-based options or avoiding ingredients that may cause discomfort or allergic reactions. By
                            offering these dietary alternatives, restaurants can cater to individuals with specific dietary
                            needs or preferences, ensuring a more inclusive dining experience for all customers.
                        </p>
                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection
