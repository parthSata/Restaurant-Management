<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller
{
    public function boot()
{
    Paginator::useTailwind();
}
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'message' => 'required|string|max:1000',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Your message has been sent!');
    }

    // Fetch customers and pass them to the view
      public function index(Request $request)
    {
        $query = Registration::where('role', 'customer');
    
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
         // Paginate the results (e.g., 10 records per page)
        $customers = $query->select('id', 'first_name', 'last_name', 'email')
                           ->withCount('orders')
                           ->paginate(10);

    
        return view('admin.customers.customers', compact('customers'));
    }


    // Destroy a customer
    public function destroy($id)
    {
        // Find the customer by their ID and delete
        $customer = Registration::findOrFail($id);
        $customer->delete(); // Delete the customer record
    
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }

    // Example of enquiries method (if applicable)
    public function showEnquiries(Request $request)
    {
        $query = Contact::query(); // Start a query on the Contact model

    // Check if the search parameter is provided in the request
    if ($search = $request->input('search')) {
        // Add conditions to search for name, email, phone, or message
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('phone', 'like', "%{$search}%")
              ->orWhere('message', 'like', "%{$search}%");
        });
    }

    // Fetch enquiries with pagination
    $enquiries = $query->orderBy('created_at', 'desc')->paginate(10); // 10 entries per page

    return view('admin.customers.enquiries', compact('enquiries'));
    }
    // Delete a specific enquiry
    public function deleteEnquiry($id)
    {
        $enquiry = Contact::findOrFail($id); // Find the enquiry by ID
        dd($enquiry);
        $enquiry->delete(); // Delete the enquiry
        
        return redirect()->route('customers.showEnquiries')->with('success', 'Enquiry deleted successfully.');
    }
}
