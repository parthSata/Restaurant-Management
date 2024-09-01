<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Management Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Create an Account</h2>
        <form action="/register" method="POST">
            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="username">Username</label>
                <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500"
                    type="text" id="username" name="username" placeholder="Choose a username">
            </div>
            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="email">Email</label>
                <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500"
                    type="email" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="mb-6">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="password">Password</label>
                <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500"
                    type="password" id="password" name="Password" placeholder="Password">
            </div>
            <div class="mb-6">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="password">Confirm Password</label>
                <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500"
                    type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
            </div>
            <button
                class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 transition duration-200">Register</button>
        </form>
        <div class="mt-4 text-center flex justify-center items-center gap-2">
            <p class="text-sm text-gray-600">Already have an account?</p>
            <a href="/login" class="text-blue-500 hover:underline">Login</a>
        </div>
    </div>
</body>

</html>
