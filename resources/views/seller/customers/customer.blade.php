@extends('layouts.seller')

@section('title', 'Customer')

@section('content')

    <div class="">
        <div class="w-full mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between mb-4">
                    <div class="relative flex  justify-center items-center gap-2">
                        <div class="">
                            <input type="text" placeholder="Search" class="w-full pl-10  py-2 border rounded-lg">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <ul class="flex gap-4 items-center">
                            <a href="{{ route('customer.index') }}" class="">
                                <li class=" cursor-pointer hover:underline text-lg font-serif">Customers</li>
                            </a>
                            <a href="{{ route('customer.showEnquiries') }}" class="">
                                <li class=" cursor-pointer hover:underline text-lg font-serif">Enquiries</li>
                            </a>
                        </ul>
                    </div>
                </div>

                <div class="flex justify-between items-center mb-4">
                    <div class="text-sm font-medium text-gray-500 flex items-center">
                        CUSTOMER

                    </div>
                    <div class="text-sm font-medium text-gray-500">ORDER</div>
                </div>

                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Bhaja BHad"
                                class="w-10 h-10 rounded-full mr-4">
                            <div>
                                <h3 class="text-sm font-medium text-blue-600">Bhaja BHad</h3>
                                <p class="text-sm text-gray-500">sdfdg1223@gmail.com</p>
                            </div>
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">1</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/men/2.jpg" alt="Mark Tally"
                                class="w-10 h-10 rounded-full mr-4">
                            <div>
                                <h3 class="text-sm font-medium text-blue-600">Mark Tally</h3>
                                <p class="text-sm text-gray-500">mark@gmail.com</p>
                            </div>
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">1</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/men/3.jpg" alt="Om Pandya"
                                class="w-10 h-10 rounded-full mr-4">
                            <div>
                                <h3 class="text-sm font-medium text-blue-600">Om Pandya</h3>
                                <p class="text-sm text-gray-500">pandya@gmail.com</p>
                            </div>
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">1</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/men/4.jpg" alt="Bhautik Bhalala"
                                class="w-10 h-10 rounded-full mr-4">
                            <div>
                                <h3 class="text-sm font-medium text-blue-600">Bhautik Bhalala</h3>
                                <p class="text-sm text-gray-500">bhautik_bhalala35@gmail.com</p>
                            </div>
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">22</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/men/5.jpg" alt="Viren Patel"
                                class="w-10 h-10 rounded-full mr-4">
                            <div>
                                <h3 class="text-sm font-medium text-blue-600">Viren Patel</h3>
                                <p class="text-sm text-gray-500">vpatel@gmail.com</p>
                            </div>
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">9</span>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/men/6.jpg" alt="Mr. Customer"
                                class="w-10 h-10 rounded-full mr-4">
                            <div>
                                <h3 class="text-sm font-medium text-blue-600">Mr. Customer</h3>
                                <p class="text-sm text-gray-500">customer@restaurant.com</p>
                            </div>
                        </div>
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">15</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
