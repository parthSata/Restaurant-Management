<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DeliveryAddress;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;


class MenuController extends Controller
{
    // Show menu for a specific restaurant
    public function showMenu($slug)
    {
        $restaurants = Restaurant::where('restaurant_slug', $slug)->firstOrFail();
        $categories = Category::with('addOnItems')
            ->whereHas('addOnItems') // Filter categories with at least one item
            ->get();
    
        return view('components.Restaurant.Menu.Restaurant_Menu', [
            'restaurants' => $restaurants,
            'categories' => $categories,
        ]);
    }
    
    // Checkout page
    public function checkout($slug)
    {
        $restaurants = Restaurant::where('restaurant_slug', $slug)->firstOrFail();
        $cart = session('cart', []);
        $user = Auth::user();
        $fullName = $user->first_name . ' ' . $user->last_name;
    
        $customerId = Auth::id();
        $addresses = DeliveryAddress::where('customer_id', $customerId)
            ->where('restaurant_id', $restaurants->id)
            ->get();
    
        // Calculate totals
        $itemTotal = collect($cart)->sum(fn($item) => $item['quantity'] * $item['price']);
        $deliveryFee = 50;
        $toPay = $itemTotal + $deliveryFee;
    
        // Razorpay integration
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $orderData = [
            'receipt'         => 'rcptid_' . uniqid(),
            'amount'          => $toPay * 100, // Amount in paisa
            'currency'        => 'INR',
            'payment_capture' => 1,
        ];
    
        $razorpayOrder = $api->order->create($orderData);
    
        // Pass the Razorpay Key ID explicitly
        $razorpayOrder['key'] = env('RAZORPAY_KEY');
    
        return view('components.Restaurant.Checkout.Checkout', compact(
            'restaurants', 'user','razorpayOrder', 'cart', 'fullName', 'addresses', 'itemTotal', 'deliveryFee', 'toPay'
        ));
    }
    


    public function syncCart(Request $request)
    {
        // Validate cart items
        $validated = $request->validate([
            'cart' => 'required|array',
            'cart.*.id' => 'required|integer',
            'cart.*.name' => 'required|string',
            'cart.*.price' => 'required|numeric',
            'cart.*.quantity' => 'required|integer',
        ]);
    
        // Store cart items in the session
        session(['cart' => $validated['cart']]);
    
        return response()->json(['message' => 'Cart synced successfully'], 200);
    }
}
