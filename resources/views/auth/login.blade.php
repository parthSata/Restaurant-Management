@extends('layouts.app')

@section('title', 'Restaurant Page')

@section('content')

    <div class="flex justify-center min-h-screen items-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <div class="flex justify-center mb-2">
                <img src="image/Logo.png" alt="Logo" class="h-16 w-16 mr-2">
            </div>

            <h2 class="text-2xl font-semibold mb-6 text-center">Sign In</h2>

            <form class="flex flex-col gap-4" method="POST" action="{{ url('/login') }}">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email*</label>
                    <input type="email" id="email" name="email" placeholder="admin@restaurant.com"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>

                <div class="mb-4">
                    <div class="flex justify-between items-center mb-1">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password*</label>
                    </div>
                    <input type="password" id="password" name="password" placeholder="••••••"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 mb-3">Login</button>
            </form>

            <p class="text-center text-sm text-gray-600">
                New Here? <a href="/register" class="text-blue-500 hover:underline">Create an Account</a>
            </p>
        </div>
    </div>



@endsection
