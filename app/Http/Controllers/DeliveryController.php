<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAddress;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Razorpay\Api\Api;


class DeliveryController extends Controller
{
    protected $razorpayApiKey = 'rzp_test_eFufbivICL2J9n';
    protected $razorpaySecretKey = 'mRgia0i8MPKcNq4di2FiiBO5';
    public function store(Request $request, $slug)
    {
        // Get the logged-in user's ID
        $customerId = Auth::id();
        if (!$customerId) {
            return redirect()->route('login')->with('error', 'Please log in to continue');
        }
        
        // Retrieve the restaurant by its slug
        // $restaurant = Restaurant::where('restaurant_slug', $slug)->firstOrFail();
        $restaurant = Restaurant::where('restaurant_slug', $slug)->first();
        if (!$restaurant) {
            return redirect()->route('restaurants.index')->with('error', 'Restaurant not found');
        }
        // Validate the delivery address data
        $request->validate([
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'zip_code' => 'required|string|max:20',
        ]);
    
        // Store the delivery address with the customer_id and restaurant_id
        $delivery = new DeliveryAddress();
        $delivery->customer_id = $customerId; // Make sure this links to the customer correctly
        $delivery->restaurant_id = $restaurant->id;
        $delivery->address = $request->address;
        $delivery->city = $request->city;
        $delivery->zip_code = $request->zip_code;
        $delivery->save();
    
        return redirect()->route('checkout', ['slug' => $slug])->with('success', 'Delivery address saved successfully!');
    }
    
    public function show($slug)
    {
        $customerId = Auth::id();
        $user = Auth::user();  // Retrieve the authenticated user
        $fullName = $user->first_name . ' ' . $user->last_name;
        
        // Retrieve the restaurant by its slug
        $restaurants = Restaurant::where('restaurant_slug', $slug)->firstOrFail();
        
        // Fetch all delivery addresses for the logged-in user and the given restaurant
        $addresses = DeliveryAddress::where('customer_id', $customerId)
                                    ->where('restaurant_id', $restaurants->id)
                                    ->get();
        $amountToPay = 20000; // Replace with actual amount in paise (e.g., ₹200 = 20000 paise)
        $razorpayOrder = $this->createRazorpayOrder($amountToPay);
                                    
        
        // Optional: Check if addresses are found
        if ($addresses->isEmpty()) {
            return redirect()->back()->with('error', 'No delivery addresses found.');
        }
        
        // Pass user details to the view
        return view('checkout', compact('restaurants', 'addresses', 'user', 'fullName','razorpayOrder'));
    }
    

    private function createRazorpayOrder($amount)
    {
        $api = new Api($this->razorpayApiKey, $this->razorpaySecretKey);
        $order = $api->order->create([
            'receipt' => uniqid(),
            'amount' => $amount,
            'currency' => 'INR',
        ]);
        return $order;
    }

    public function handlePayment(Request $request)
    {
        $api = new Api($this->razorpayApiKey, $this->razorpaySecretKey);

        try {
            $payment = $api->payment->fetch($request->razorpay_payment_id);
            if ($payment->status == 'captured') {
                return redirect()->route('success')->with('success', 'Payment successful!');
            }
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', 'Payment failed! ' . $e->getMessage());
        }
    }
    
    
}
