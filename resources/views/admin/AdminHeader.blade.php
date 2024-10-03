<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Header</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header class="bg-gray-800 text-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <img src="{{ asset('image/Logo.png') }}" alt="Restaurant Logo" class="h-12 w-12 mr-3">
                <h1 class="text-3xl font-bold">Restaurant Management</h1>
            </div>
            <nav class="space-x-8">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-gray-400">Dashboard</a>
                <a href="{{ route('restaurants.index') }}" class="hover:text-gray-400">Restaurants</a>
                <a href="{{ route('customers.index') }}" class="hover:text-gray-400">Customers</a>
                <a href="{{ route('transactions.index') }}" class="hover:text-gray-400">Transactions</a>
                <a href="{{ route('coupons.index') }}" class="hover:text-gray-400">Coupon Codes</a>
            </nav>
        </div>
    </header>
</body>

</html>
