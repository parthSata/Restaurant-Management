<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Registration; // Add the Registration model
class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        // Validate incoming request data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        // Attempt to log in as admin/customer
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::guard('web')->user();
    
            // Redirect based on role in the `registrations` table
            switch ($user->role) {
                case 'admin':
                    session()->flash('success', 'Admin login successful.');
                    return redirect()->route('admin.dashboard');
                case 'customer':
                    session()->flash('success', 'Customer login successful.');
                    return redirect()->route('customer.dashboard');
                default:
                    session()->flash('success', 'Login successful.');
                    return redirect()->route('user.home');
            }
        }
    
        $restaurant = Restaurant::first();

        if (!$restaurant) {
            return 'No restaurant found in the database!';
        }
    
        Auth::guard('restaurant')->login($restaurant);
    
        return redirect()->route('seller.sellerDashboard');
        
        // session()->flash('error', 'The provided credentials do not match our records.');
        // return redirect()->route('seller.sellerDashboard');
    }
    

    public function logout(Request $request)
    {
        if (Auth::guard('restaurant')->check()) {
            Auth::guard('restaurant')->logout(); // Logout for seller guard
        } else {
            Auth::guard('web')->logout(); // Logout for web guard
        }
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }

    
}
