<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Management Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        
        {{-- <img src="https://brijesh2534.github.io/ipodetails/ipodetails.jpeg" style="width:50px;height: 50px; border-style:solid;"> --}}
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">Restaurant Management Login</h2>
        <form action="/login" method="POST">
            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="username">Username</label>
                <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500"
                    type="text" id="username" name="username" placeholder="Enter your username">
            </div>
            <div class="mb-6">
                <label class="block text-gray-600 text-sm font-semibold mb-2" for="password">Password</label>
                <input class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500"
                    type="password" id="password" name="password" placeholder="Enter your password">
            </div>
            <div class="flex items-center justify-between">
                <div>
                    <input class="mr-1" type="checkbox" id="remember_me" name="remember_me">
                    <label class="text-sm text-gray-600" for="remember_me">Remember Me</label>
                </div>
                <a href="#" class="text-sm text-blue-500 hover:underline">Forgot Password?</a>
            </div>
            <button
                class="w-full bg-blue-500 text-white py-2 mt-6 rounded-lg hover:bg-blue-600 transition duration-200">Login</button>
        </form>
        <div class="mt-4 text-center flex justify-center items-center gap-2">
            <p class="text-sm text-gray-600">Don't have an account?</p>
            <a href="/register" class="text-blue-500 hover:underline">Register</a>
        </div>
    </div>
</body>

</html>
