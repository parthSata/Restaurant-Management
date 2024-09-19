<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:registrations',
            'password' => 'required|string|min:8|confirmed',
            'confirm_password' => 'required|string|min:8|same:password',
            'role' => 'required|string|in:customer,seller,admin',
        ]);

        // If validation fails, return with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Perform other logic (like logging, sending confirmation emails, etc.)
        // but do NOT save the user to the registrations table

        return redirect()->route('login')->with('success', 'Registration successful, but user was not stored.');
    }
}
