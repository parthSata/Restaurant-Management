<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer; 

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all(); // Fetch all customers from the database
        return view('admin.customers.customers', compact('customers'));
    }

    // Display a specific customer by ID
    public function show($id)
    {
        $customer = Customer::findOrFail($id); // Find a customer by ID
        return view('admin.customers.show', compact('customer'));
    }
}
