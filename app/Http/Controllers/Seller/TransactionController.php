<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        // Get the authenticated user's restaurants
        $restaurants = auth()->user()->restaurants;
    
        // Retrieve all transaction records associated with the user's restaurants
        $query = Order::whereIn('restaurant_id', $restaurants->pluck('id'));
    
        // Apply search filter if a search term is provided
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('order_id', 'like', "%{$search}%")
                  ->orWhere('order_type', 'like', "%{$search}%")
                  ->orWhere('payment_status', 'like', "%{$search}%");
            });
        }
    
        // Fetch filtered or full list of transactions with pagination
        $transactions = $query->orderBy('created_at', 'desc')->paginate(10);
    
        // Return the view with the transactions and restaurants
        return view('seller.transaction.transaction', compact('restaurants', 'transactions'));
    }
    
    
}
