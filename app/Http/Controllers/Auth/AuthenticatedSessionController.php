<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\API\AuthController;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);

        // Attempt to authenticate user
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            // Get authenticated user
            $user = Auth::user();

            // Check if the user is an admin or a regular user and redirect accordingly
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors([
            'email' => __('The provided credentials do not match our records.'),
        ]);
    }

    /**
     * Destroy an authenticated session and log out the user.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Log::info('Logout Attempt');

        // Check if the user is logged in via Sanctum API (non-admins)
        if (Auth::check()) {
            $user = Auth::user();
            
            if ($user->role !== 'admin') {
                $token = session('auth-token');

                if ($token) {
                    // Call the Sanctum API to revoke the token
                    $response = Http::withHeaders([
                        'Authorization' => 'Bearer ' . $token,
                    ])->post(env('API_URL', 'http://127.0.0.1:8000') . '/api/logout');

                    if ($response->failed()) {
                        Log::error('Logout Failed', ['response' => $response->json()]);
                        return back()->withErrors(['error' => __('Failed to log out.')]);
                    }

                    Log::info('User API Token Revoked Successfully');
                }
            }
        }

        // Logout the user and invalidate the session
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Log::info('User Logged Out Successfully');

        return redirect('/');
    }
}