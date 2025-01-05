<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Reservation;
use DB;
use Illuminate\Http\Request;
use Log;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        // Get search input from the request
        $search = $request->input('search');

        // Fetch restaurants for the authenticated user (if applicable)
        $restaurants = auth()->user()->restaurants;

        // Fetch bookings, applying search filters if provided
        $bookings = Booking::with('reservation') // Assuming a relationship exists between Booking and Reservation
            ->when($search, function ($query, $search) {
                $query->where('customer_name', 'like', "%$search%")
                    ->orWhere('phone', 'like', "%$search%")
                    ->orWhere('table_name', 'like', "%$search%");
            })
            ->get();

        // Fetch reservation data
        $reservations = Reservation::when($search, function ($query, $search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%");
        })->get();

        // Fetch tables data (if needed for additional processing)
        $tables = DB::table('reservations')
            ->when($search, function ($query, $search) {
                $query->where('table_name', 'like', "%$search%")
                    ->orWhere('status', 'like', "%$search%");
            })
            ->get();

        // Return the view with data
        return view('seller.reservation.booking', compact('restaurants', 'bookings', 'search', 'tables', 'reservations'));
    }
    public function destroyBooking($id)
    {
            // Find the booking by ID
            $booking = Booking::findOrFail($id);
    dd($booking);
            // Delete the booking
            $booking->delete();
    
            // Redirect back with a success message
            return redirect()->route('booking.index')->with('success', 'Booking deleted successfully.');
      
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
    
        // Fetch available reservations matching criteria
        $reservations = Reservation::select('id', 'title', 'capacity')
            ->where('capacity', '>=', $request->total_person)
            ->get();
    
        // Return response
        return response()->json([
            'status' => 'success',
            'data' => $reservations,
        ]);
    }    

    public function storeBooking(Request $request)
    {
        $validated = $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'expected_person' => 'required|integer|min:1',
            'expected_date' => 'required|date',
            'expected_time' => 'required|date_format:H:i',
        ]);
    
        try {
            // Fetch the reservation
            $reservation = Reservation::findOrFail($validated['reservation_id']);
    
            // Create a new booking
            $booking = new Booking([
                'reservation_id' => $reservation->id,
                'table_name' => $reservation->title,
                'customer_name' => $validated['customer_name'],
                'phone' => $validated['phone'],
                'expected_person' => $validated['expected_person'],
                'expected_date' => $validated['expected_date'],
                'expected_time' => $validated['expected_time'],
            ]);
    
            $booking->save();
    
            // Update reservation status
            $reservation->status = true;
            $reservation->save();
    
            // Redirect back with a success message
            return redirect()->route('reservation.index')->with('success', 'Table booked successfully!');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()->route('reservation.index')->with('error', 'Failed to book table. Please try again.');
        }
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
