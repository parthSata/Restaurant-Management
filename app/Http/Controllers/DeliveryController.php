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
    

    
    // public function processCheckout(Request $request, $slug)
    // {
    //     // Validate the payment method
    //     $request->validate([
    //         'payment_method' => 'required|in:razorpay,cod',
    //     ]);
    
    //     // Check if the user is authenticated
    //     $customerId = Auth::id();
    //     if (!$customerId) {
    //         return redirect()->route('login')->with('error', 'Please log in to place an order.');
    //     }
    
    //     // Ensure the customer exists in the database
    //     $customer = \App\Models\Registration::find($customerId);
    //     if (!$customer) {
    //         \Log::error('Customer not found with ID: ' . $customerId);
    //         return redirect()->back()->with('error', 'Customer not found. Please log in and try again.');
    //     }
    
    //     // Log the slug passed
    //     \Log::info('Slug passed: ' . $slug);
    
    //     // Fetch restaurant details by slug
    //     $restaurants = Restaurant::where('restaurant_slug', $slug)->first();
    //     if (!$restaurants) {
    //         \Log::error('Restaurant not found for slug: ' . $slug);
    //         return redirect()->back()->with('error', 'The selected restaurant is not available. Please choose another.');
    //     }
    
    //     // Fetch the selected delivery address
    //     $deliveryAddress = DeliveryAddress::where('customer_id', $customerId)
    //         ->where('restaurant_id', $restaurants->id)
    //         ->latest()
    //         ->first();
    //     if (!$deliveryAddress) {
    //         return redirect()->back()->with('error', 'Please select or add a delivery address.');
    //     }
    
    //     // Calculate the order details
    //     $cart = session()->get('cart', []);
    //     if (empty($cart)) {
    //         \Log::error('Cart is empty for customer: ' . $customerId);
    //         return redirect()->back()->with('error', 'Your cart is empty.');
    //     }
    
    //     // Calculate subtotal, delivery fee, and total
    //     $subtotal = array_sum(array_map(function ($item) {
    //         return $item['price'] * $item['quantity'];
    //     }, $cart));
    
    //     $deliveryFee = 50; // Example delivery fee
    //     $total = $subtotal + $deliveryFee;
    
    //     // Log the order details before saving
    //     \Log::info('Order Data: ', [
    //         'customer_id' => $customerId,
    //         'restaurant_id' => $restaurants->id,
    //         'order_id' => 'ORD-' . strtoupper(uniqid()),
    //         'order_status' => 'Pending',
    //         'subtotal' => $subtotal,
    //         'delivery_fee' => $deliveryFee,
    //         'order_type' => $request->payment_method,
    //         'payment_status' => ($request->payment_method === 'cod') ? 'Pending' : 'Paid',
    //         'delivery_address' => $deliveryAddress->address . ', ' . $deliveryAddress->city . ', ' . $deliveryAddress->zip_code
    //     ]);
    
    //     // Try saving the order
    //     try {
    //         // Create a new order
    //         $order = new \App\Models\Order();
    //         $order->customer_id = $customerId;  // This should match an existing customer ID
    //         $order->restaurant_id = $restaurants->id;
    //         $order->order_id = 'ORD-' . strtoupper(uniqid());
    //         $order->order_date = now();
    //         $order->order_status = 'Pending'; // Default status
    //         $order->subtotal = $subtotal;
    //         $order->delivery_fee = $deliveryFee;
    //         $order->order_type = $request->payment_method; // COD or Razorpay
    //         $order->payment_status = ($request->payment_method === 'cod') ? 'Pending' : 'Paid';
    //         $order->delivery_address = $deliveryAddress->address . ', ' . $deliveryAddress->city . ', ' . $deliveryAddress->zip_code;
    //         $order->save();
    
    //         // Optionally, clear the cart after order is placed
    //         session()->forget('cart');
    
    //         // Redirect to confirmation page
    //         return redirect()->route('order.confirmation', ['slug' => $restaurants->restaurant_slug])
    //             ->with('success', 'Order placed successfully!');
    //     } catch (\Exception $e) {
    //         // Log full exception details for debugging
    //         \Log::error('Order creation failed: ' . $e->getMessage(), ['exception' => $e]);
    
    //         // Return error message to the user
    //         return redirect()->back()->with('error', 'Failed to place the order. Please try again.');
    //     }
    // }
    
    public function confirmation($slug)
    {
        $restaurants = Restaurant::where('restaurant_slug', $slug)->firstOrFail();
        $orders = \App\Models\Order::where('customer_id', Auth::id())
            ->where('restaurant_id', $restaurants->id)
            ->latest()
            ->first();
    
        return view('components.Restaurant.Checkout.Orders.Confirmation', compact('restaurants', 'orders'));
    }
    

    
}
