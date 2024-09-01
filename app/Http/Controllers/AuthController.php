<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // For DB operations
use Illuminate\Support\Facades\Hash; // For password hashing
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        // If validation fails, return errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Attempt to authenticate the user
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('dashboard'); // Redirect to a specific page after successful login
        } else {
            // Authentication failed
            return redirect()->back()->withErrors(['login_error' => 'Invalid username or password'])->withInput();
        }
    }

    public function showRegistrationForm()
    {
        return view('auth.register'); // Ensure the view file is in resources/views/auth/register.blade.php
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // 'confirmed' requires a 'password_confirmation' field
        ]);

        // If validation fails, return errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Insert the new user into the database
        DB::table('users')->insert([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect to a specific page after successful registration
        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }
}
