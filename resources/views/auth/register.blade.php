@extends('layouts.app')

@section('title', 'Register Page')

<!-- resources/views/auth/register.blade.php -->

     <!-- Assuming you have a layout file -->

@section('content')
<div class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-4xl font-bold text-center text-indigo-900 mb-8">Registration</h1>

        <!-- Form starts here -->
        <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-4">
            @csrf

            <div class="grid grid-cols-2 gap-4 ">
                <div class="flex flex-col gap-2">
                    <label for="firstName" class="block text-sm font-medium text-gray-700">First Name: *</label>
                    <input type="text" id="firstName" name="first_name" placeholder="Enter First Name"
                        value="{{ old('first_name') }}"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                    @error('first_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="lastName" class="block text-sm font-medium text-gray-700">Last Name: *</label>
                    <input type="text" id="lastName" name="last_name" placeholder="Enter Last Name"
                        value="{{ old('last_name') }}"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                    @error('last_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Email: *</label>
                <input type="email" id="email" name="email" placeholder="Enter Email Address"
                    value="{{ old('email') }}"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="flex flex-col gap-2">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password: *</label>
                    <input type="password" id="password" name="password" placeholder="Enter Password"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirm Password: *</label>
                    <input type="password" id="confirmPassword" name="password_confirmation" placeholder="Confirm Password"
                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                </div>
            </div>
            <div class="grid-col flex-col gap-2">
                <label for="role" class="block text-sm font-medium text-gray-700">Role: *</label>
                <select id="role" name="role"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-500">
                    <option value="customer">Customer</option>
                    <option value="seller">Seller</option>
                    <option value="admin">Admin</option>
                </select>
            </div>


            <button type="submit"
                class="w-full bg-yellow-400 text-white py-2 px-4 rounded-md hover:bg-yellow-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">
                Create Account
            </button>
        </form>
        {{-- <p class="mt-4 text-center text-sm text-gray-600">
            Already have an account? <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-500">Sign in here</a>
        </p> --}}
    </div>
</div>
@endsection

