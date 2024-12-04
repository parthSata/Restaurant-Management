<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Customer;
use Illuminate\Http\Request;

class ContactController extends Controller
{
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
    public function index()
    {
        $contacts = Customer::all(); // Fetch all customers from the database
        return view('admin.customers.customers', compact('contacts'));
    }
    // Destroy a customer
    public function destroy($id)
    {
        $contacts = Contact::findOrFail($id);
        $contacts->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }

    public function show()
    {
        $contacts = Contact::all(); // Fetch all enquiries (assuming you're using the Contact model)
        return view('admin.customers.customers', compact('contacts')); // Pass data to view
    }

    // Example of enquiries method (if applicable)
    public function showEnquiries()
    {
        $enquiries = Contact::whereNotNull('message')->get();
        return view('admin.customers.enquiries', compact('enquiries'));
    }
}
