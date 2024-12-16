<?php

namespace App\Http\Controllers;

use App\Models\AddOnItem;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Registration;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class SellerDashboardController extends Controller
{
    public function index()
    {
        $sellerId = Auth::id(); // Get the authenticated seller's ID
    
        // Get the restaurants associated with the seller
        $restaurants = Restaurant::where('id', $sellerId)->get(['id', 'restaurant_name', 'logo', 'feature_image']);
        $restaurantIds = $restaurants->pluck('id');
    
        if ($restaurantIds->isEmpty()) {
            // Handle case where seller has no associated restaurants
            return view('seller.dashboard.sellerDashboard', [
                'totalOrders' => 0,
                'totalSales' => 0,
                'totalCustomers' => 0,
                'processingOrders' => 0,
                'readyForDeliveryOrders' => 0,
                'onTheWayOrders' => 0,
                'deliveredOrders' => 0,
                'returnedOrders' => 0,
                'cancelledOrders' => 0,
                'orderReceived' => 0,
                'recentTransactions' => [],
                'topCustomers' => [],
                'formattedSalesData' => array_fill(0, 12, 0),
            ]);
        }
    
        // Monthly Sales Data
        $monthlySales = Order::whereIn('restaurant_id', $restaurantIds)
            ->selectRaw('MONTH(created_at) as month, SUM(subtotal) as total_sales')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_sales', 'month');
    
        // Fill missing months with zero sales
        $salesData = array_fill(1, 12, 0);
        foreach ($monthlySales as $month => $total) {
            $salesData[$month] = $total;
        }
        $formattedSalesData = array_values($salesData);
    
        // Summary Metrics
        $totalOrders = Order::whereIn('restaurant_id', $restaurantIds)->count();
        $totalSales = Order::whereIn('restaurant_id', $restaurantIds)->sum('subtotal');
        $totalCustomers = Order::whereIn('restaurant_id', $restaurantIds)->distinct('customer_id')->count();
    
        // Orders by status
        $processingOrders = 0;
        $readyForDeliveryOrders = 0;
        $onTheWayOrders = 0;
    
        // $processingOrders = Order::whereIn('restaurant_id', $restaurantIds)->where('status', 'processing')->count();
        // $readyForDeliveryOrders = Order::whereIn('restaurant_id', $restaurantIds)->where('status', 'ready_for_delivery')->count();
        // $onTheWayOrders = Order::whereIn('restaurant_id', $restaurantIds)->where('status', 'on_the_way')->count();
        
        $deliveredOrders = 0; // Always 0 as per your request
        $returnedOrders = 0;  // Always 0 as per your request
        $cancelledOrders = 0; // Always 0 as per your request
    
        // Total orders received
        $orderReceived = $totalOrders;
    
        // Recent Transactions
        $recentTransactions = Order::whereIn('restaurant_id', $restaurantIds)
            ->latest()
            ->limit(5)
            ->with(['restaurant', 'customer'])
            ->get();
    
        // Top Customers
        $topCustomers = Order::whereIn('restaurant_id', $restaurantIds)
            ->select('customer_id')
            ->selectRaw('SUM(subtotal) as total_spent')
            ->groupBy('customer_id')
            ->orderBy('total_spent', 'desc')
            ->limit(5)
            ->with('customer')
            ->get()
            ->map(function ($order) {
                $order->full_name = $order->customer 
                    ? $order->customer->first_name . ' ' . $order->customer->last_name 
                    : 'Unknown Customer';
                $order->subtotal = $order->total_spent;
                return $order;
            });

        // Popular Restaurants
        $popularRestaurants = Restaurant::whereIn('id', $restaurantIds)
        ->withCount('orders') // Assuming a relationship between Restaurant and Order
        ->orderBy('orders_count', 'desc') // Sort by the number of orders
        ->limit(5)
        ->get();    

    
        return view('seller.dashboard.sellerDashboard', compact(
            'totalOrders',
            'totalSales',
            'totalCustomers',
            'popularRestaurants',
            'processingOrders',
            'readyForDeliveryOrders',
            'onTheWayOrders',
            'deliveredOrders',
            'returnedOrders',
            'cancelledOrders',
            'orderReceived',
            'recentTransactions',
            'topCustomers',
            'formattedSalesData',
            'restaurants'
        ));
    }    
}
