<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Reservation;
use DB;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $restaurants = auth()->user()->restaurants;
    
        $bookings = Booking::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('phone', 'like', "%$search%")
                    ->orWhere('table_type', 'like', "%$search%");
            })
            ->get();
    
        return view('seller.reservation.booking', compact('restaurants', 'bookings', 'search'));
    }

    public function showTables(Request $request)
    {
        $search = $request->input('search');
        $restaurants = auth()->user()->restaurants;

        $tables = DB::table('reservations')
            ->when($search, function ($query, $search) {
                $query->where('table_name', 'like', "%$search%")
                    ->orWhere('status', 'like', "%$search%");
            })
            ->get();

        $reservations = Reservation::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('phone', 'like', "%$search%");
            })
            ->get();

        return view('seller.reservation.tables', compact('tables', 'restaurants', 'reservations', 'search'));
    }

   

    public function checkAvailability(Request $request)
    {
        // Validate input
        $request->validate([
            'total_person' => 'required|integer|min:1',
            'expected_date' => 'required|date|after_or_equal:today',
            'expected_time' => 'required|date_format:H:i',
        ]);

        // Fetch available reservations
        $reservations = Reservation::available()->active()->get();

        // Return response
        return response()->json([
            'status' => 'success',
            'data' => $reservations,
        ]);
    }

    public function storeBooking(Request $request)
{
    // Assuming you're fetching the available table by its ID
    $reservation = Reservation::find($request->reservation_id);

    // Create a new booking
    $booking = new Booking([
        'table_name' => $reservation->title, // or any other property you wish to store
        'customer_name' => $request->customer_name,
        'phone' => $request->phone,
        'expected_person' => $request->expected_person,
        'expected_date' => $request->expected_date,
        'expected_time' => $request->expected_time,
        'reservation_id' => $reservation->id, // Associate with reservation
    ]);

    $booking->save();

    // Mark the reservation as booked
    $reservation->is_booked = true;
    $reservation->save();

    return response()->json([
        'message' => 'Table booked successfully!',
        'booking' => $booking
    ]);
}
    



    public function create()
    {
        $restaurants =  auth()->user()->restaurants;

        return view('seller.reservation.AddTable' ,compact('restaurants'));
    }
    public function store(Request $request)
    {
        // Validate input fields
        $request->validate([
            'title' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'boolean',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('reservations', 'public');
        }

        // Create the reservation
        Reservation::create([
            'title' => $request->title,
            'capacity' => $request->capacity,
            'image' => $imagePath ?? null,
            'status' => $request->status ?? 0,
        ]);

        return redirect()->route('reservation.showTables')->with('success', 'Reservation table created successfully.');
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $restaurants =  auth()->user()->restaurants;


        return view('seller.reservation.AddTable', compact('reservation','restaurants'));
    }

    // Update reservation
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $reservation = Reservation::findOrFail($id);
    
        // Update image if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('reservations', 'public');
            $reservation->image = $imagePath;
        }
    
        // Update other fields
        $reservation->update([
            'title' => $validated['title'],
            'capacity' => $validated['capacity'],
            // 'is_booked' => $request->has('is_booked') ? true : false,
            'status' => $request->has('status') ? true : false,
        ]);
    
        return redirect()->route('reservation.showTables')->with('success', 'Reservation updated successfully.');
    }
    

    // Delete reservation
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('reservation.showTables')->with('success', 'Reservation deleted successfully.');
    }   
}
