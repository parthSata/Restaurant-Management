<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Customer; 
use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all(); // Fetch all customers from the database
        return view('admin.customers.customers', compact('customers'));
    }

    // Display a specific customer by ID
    // public function show($id)
    // {
    //     $customer = Customer::findOrFail($id); // Find a customer by ID
    //     return view('admin.customers.show', compact('customer'));
    // }

    public function showEnquiries()
    {
        // Return the Blade view for Seller Enquiries
        return view('admin.customers.enquiries');
    }

// Customer's Routes
public function dashboard()
{
    $customer = auth()->user(); // Fetch the authenticated customer
    $user = Auth::user();  // Retrieve the authenticated user
    $fullName = $user->first_name . ' ' . $user->last_name;// Fetch the authenticated customer
    return view('user.dashboard.customerDashboard', ['customer' => $customer], compact('user','fullName'));
}

    public function orders($id)
    {
        // Fetch orders for the specific customer ID
        $orders = Order::where('customer_id', $id)->get();

        // Pass the orders to the view
        return view('user.orders.orders', compact('orders'));
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logs the user out
        $request->session()->invalidate(); // Invalidates the session
        $request->session()->regenerateToken(); // Regenerates CSRF token

        return redirect('/login'); // Redirect to login
    }

}
