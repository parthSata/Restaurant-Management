<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    
        // Attempt to log in as seller
        if (Auth::guard('restaurant')->attempt([
            'contact_email' => $credentials['email'],
            'password' => $credentials['password']
        ])) {
            logger()->info('Seller authenticated successfully.', ['email' => $credentials['email']]);
            $request->session()->regenerate();
            session()->flash('success', 'Seller login successful.');
            return redirect()->route('seller.sellerDashboard');
        } else {
            logger()->warning('Seller authentication failed.', ['email' => $credentials['email']]);
        }
        
        // If authentication fails, return error
        session()->flash('error', 'The provided credentials do not match our records.');
        return back()->withInput();
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
