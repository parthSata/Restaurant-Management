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
                <span class="text-3xl font-bold">Restaurant Management</span>
                {{-- <img src="{{ asset('/storage/Uploaded_Images/' . $restaurants->logo) }}"
                alt="{{ $restaurants->restaurant_name }}" class="inline-block h-10 w-10 rounded-full" />
                {{ $restaurants->restaurant_name }} --}}
            </div>
            <nav class="space-x-8">
                <a href="{{ route('seller.sellerDashboard') }}" class="hover:text-gray-400">Dashboard</a>
                <a href="{{ route('customer.index') }}" class="hover:text-gray-400">Customers</a>
                <a href="{{ route('orders.index') }}" class="hover:text-gray-400">Orders</a>
                <a href="{{ route('transactions.index') }}" class="hover:text-gray-400">Transactions</a>
                <a href="{{ route('reservation.index') }}" class="hover:text-gray-400">Reservation</a>
                <a href="{{ route('addOns.index') }}" class="hover:text-gray-400">Add Ons</a>
                <a href="{{ route('menu.index') }}" class="hover:text-gray-400">Menu</a>
                <a href="{{ route('couponcodes.index') }}" class="hover:text-gray-400">Coupon Codes</a>
            </nav>
        </div>
    </header>
</body>

</html>
