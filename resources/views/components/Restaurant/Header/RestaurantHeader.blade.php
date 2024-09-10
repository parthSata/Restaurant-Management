<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant Header</title>
</head>

<body>
    <div className="min-h-screen bg-gray-50">
        <header className="bg-white shadow-sm">
            <div className="container mx-auto px-4 py-4 flex items-center justify-between">
                <div className="text-2xl font-bold text-orange-500">
                    Spice<span className="text-gray-700">Garden</span>
                </div>
                <nav className="hidden md:flex space-x-6">
                    <a href="#" className="text-gray-600 hover:text-gray-900">Home</a>
                    <a href="#" className="text-gray-600 hover:text-gray-900">Reservation</a>
                    <a href="#" className="text-gray-600 hover:text-gray-900">Menu</a>
                    <a href="#" className="text-gray-600 hover:text-gray-900">About Us</a>
                    <a href="#" className="text-gray-600 hover:text-gray-900">Contact Us</a>
                </nav>
                <div className="flex items-center space-x-4">
                    <button className="p-2 text-gray-600 hover:text-gray-900">
                        <ShoppingBag className="h-6 w-6" />
                    </button>
                    <button className="bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600">
                        Register
                    </button>
                    <button className="bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600">
                        Login
                    </button>
                </div>
            </div>
        </header>
</body>

</html>
