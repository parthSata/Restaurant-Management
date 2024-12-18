<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
   
    // Display a list of all bookings
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    // Show the form for creating a new booking
    public function create()
    {
        return view('bookings.create');
    }

    // Store a new booking in the database
    public function store(Request $request)
    {
        $request->validate([
            'table_name' => 'required|string',
            'customer_name' => 'required|string',
            'phone' => 'required|string',
            'expected_person' => 'required|integer',
            'expected_date' => 'required|date',
            'expected_time' => 'required',
        ]);

        Booking::create($request->all());
        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    // Show a single booking
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    // Show the form for editing a booking
    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    // Update the booking in the database
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'table_name' => 'required|string',
            'customer_name' => 'required|string',
            'phone' => 'required|string',
            'expected_person' => 'required|integer',
            'expected_date' => 'required|date',
            'expected_time' => 'required',
        ]);

        $booking->update($request->all());
        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    // Delete a booking
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
