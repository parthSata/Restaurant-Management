<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Registration;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve all restaurants
        $restaurants =  auth()->user()->restaurants;
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
    
        // Return the Blade view for Seller Customer with restaurant data
        return view('seller.customers.customer', compact('customers'), ['restaurants' => $restaurants ]);
    }

    public function destroy($id)
    {
        // Find the customer by their ID and delete
        $customer = Registration::findOrFail($id);
        $customer->delete(); // Delete the customer record
    
        return redirect()->route('seller.customers.customer')->with('success', 'Customer deleted successfully!');
    }

    
    public function showEnquiries(Request $request)
    {
        $restaurants =  auth()->user()->restaurants;
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
    
        // Fetch all enquiries, you can add pagination if necessary
        $enquiries = $query->orderBy('created_at', 'desc')->paginate(10);
        // Return the Blade view for Seller Enquiries
        return view('seller.customers.enquiries',compact('restaurants','enquiries'));
    }

    public function deleteEnquiry($id)
    {
        $enquiry = Contact::findOrFail($id); // Find the enquiry by ID
        $enquiry->delete(); // Delete the enquiry
        
        return redirect()->route('customer.showEnquiries')->with('success', 'Enquiry deleted successfully.');
    }
}
