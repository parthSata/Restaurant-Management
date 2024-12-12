<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Registration;
use App\Models\Restaurant;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
         // Fetch monthly sales data
         $monthlySales = Order::selectRaw('MONTH(created_at) as month, SUM(subtotal) as total_sales')
                                            ->groupBy('month')
                                            ->orderBy('month')
                                            ->pluck('total_sales', 'month');
     
        // Ensure sales data covers all months (even those without sales)
        $salesData = array_fill(1, 12, 0);
        foreach ($monthlySales as $month => $total) {
            $salesData[$month] = $total;
        }
        
        // Convert data to a format suitable for the chart
        $formattedSalesData = array_values($salesData);
        
        // Fetch other dashboard data (as before)
        $totalCustomers = Registration::where('role', 'Customer')->count();
        $recentTransactions = Transaction::latest()->limit(5)->get();
        
        $totalCustomers = Registration::where('role', 'Customer')->count(); 
        $recentTransactions = Order::latest() // Fetch the most recent orders
        ->limit(5) // Limit to the 5 most recent orders
        ->with('restaurant', 'customer') // Eager load related restaurant and customer data
        ->get();
        
        $topCustomers = Order::select('customer_id')
            ->selectRaw('SUM(subtotal) as total_spent')
            ->groupBy('customer_id')
            ->orderBy('total_spent', 'desc')
            ->limit(5)
            ->with('customer') // Fetch associated customer data
            ->get()
            ->map(function ($order) {
                $order->full_name = $order->customer->first_name . ' ' . $order->customer->last_name;
                return $order;
            });
    
        // 4. Fetch popular restaurants with the most orders
        $popularRestaurants = Restaurant::withCount('orders')
        ->orderBy('orders_count', 'desc') // Change 'asc' to 'desc' for descending order
        ->limit(5)
        ->get();
    
    
        // Other calculations
        $totalSales = Order::sum('subtotal');
        $totalRestaurants = Restaurant::count();
        $orderReceived = Order::count();
    
        return view('admin.dashboard.dashboard', compact(
            'totalSales',
            'totalRestaurants',
            'totalCustomers',
            'orderReceived',
            'popularRestaurants',
            'topCustomers',
            'recentTransactions',
            'formattedSalesData',
        ));
    }
    
}
