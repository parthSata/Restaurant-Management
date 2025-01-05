<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Request $request)
{
    // Fetch restaurants linked to the logged-in user
    $restaurants = auth()->user()->restaurants;

    // Collect all restaurant IDs
    $restaurantIds = $restaurants->pluck('id');

    // Initialize the query for orders
    $query = Order::whereIn('restaurant_id', $restaurantIds)
        ->with(['customer:id,first_name,last_name']); // Load customer data with selected columns

    // Apply search filter if a search term is provided
    if ($search = $request->input('search')) {
        $query->whereHas('customer', function ($q) use ($search) {
            $q->where('first_name', 'like', "%{$search}%")
              ->orWhere('last_name', 'like', "%{$search}%");
        });
    }

    // Fetch filtered or full list of orders with pagination
    $orders = $query->orderBy('created_at', 'desc')->paginate(10);

    // Pass data to the view
    return view('seller.orders.orders', compact('restaurants', 'orders'));
}

    
}
