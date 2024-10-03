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

        // Attempt to log in using the validated credentials from the 'registrations' table
        if (Auth::guard('web')->attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            \Log::info('User authenticated:', ['email' => $credentials['email']]);

            // Regenerate the session to prevent fixation attacks
            $request->session()->regenerate();
            $user = Auth::guard('web')->user();

            // Fetch the user's role (assuming 'role' is a column in your 'registrations' table)
            $role = $user->role;

            // Redirect based on role
            switch ($role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                    case 'seller':
                    return redirect()->route('seller.sellerDashboard');
                        case 'customer':
                            return redirect()->route('customer.dashboard');
                default:
                    return redirect()->route('user.home'); // Default route if no role matches
            }
        }

        // If authentication fails, return an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
