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
    $request->validate([
        'total-person' => 'required|integer|min:1',
        'expected-date' => 'required|date',
        'expected-time' => 'required|date_format:H:i',
    ]);

    $totalPersons = $request->input('total-person');

    // Fetch tables that match the requested capacity
    $availableTables = Table::where('capacity', '<=', $totalPersons)
        ->whereDoesntHave('reservations', function ($query) use ($request) {
            $query->where('expected_date', $request->input('expected-date'))
                  ->where('expected_time', $request->input('expected-time'));
        })->get();

    return response()->json([
        'tables' => $availableTables,
    ]);
}


    public function storeBooking(Request $request)
    {
        $validated = $request->validate([
            'table_id' => 'required|exists:tables,id',
            'customer_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'expected_person' => 'required|integer|min:1',
            'expected_date' => 'required|date',
            'expected_time' => 'required',
        ]);
    
        // Fetch the table's capacity
        $table = Reservation::findOrFail($validated['table_id']);
    
        // Check if the table can accommodate the requested guests
        if ($validated['expected_person'] > $table->capacity) {
            return redirect()->back()->with('error', 'The table cannot accommodate the number of guests.');
        }
    
        // Store the booking if capacity is sufficient
        Booking::create([
            'table_name' => $table->name,
            'customer_name' => $validated['customer_name'],
            'phone' => $validated['phone'],
            'expected_person' => $validated['expected_person'],
            'expected_date' => $validated['expected_date'],
            'expected_time' => $validated['expected_time'],
        ]);
    
        return redirect()->back()->with('success', 'Booking successful!');
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
