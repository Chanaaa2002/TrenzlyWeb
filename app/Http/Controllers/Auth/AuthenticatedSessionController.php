<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\API\AuthController;
use Illuminate\Auth\Events\Login;

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
    public function store(Request $request): JsonResponse|RedirectResponse
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
    
            // Generate token for non-admin users only
            if ($user->role !== 'admin') {
                $token = $user->createToken('auth-token')->plainTextToken;
    
                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => 'Login successful',
                        'role' => $user->role,
                        'token' => $token,
                    ], 200);
                }
    
                // Save token in session for web users (optional)
                session(['auth-token' => $token]);
            }
    
            // Redirect based on user role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
    
            return redirect()->route('user.dashboard');
        }
    
        // Return error response for failed login
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'The provided credentials do not match our records.',
            ], 401);
        }
    
        return back()->withErrors([
            'email' => __('The provided credentials do not match our records.'),
        ]);
    }
    
    /**
     * Destroy an authenticated session and log out the user.
     */
    public function destroy(Request $request): JsonResponse|RedirectResponse
{
    // Revoke tokens only for non-admin users
    if (Auth::check() && Auth::user()->role !== 'admin') {
        Auth::user()->tokens()->delete();
    }

    if ($request->hasSession()) {
        // Clear session tokens and invalidate session
        $request->session()->forget('auth-token');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    // Logout user
    Auth::logout();

    $response = [
        'message' => 'Logged out successfully',
    ];

    if ($request->expectsJson()) {
        return response()->json($response, 200);
    }

    return redirect('/')->with('status', 'Logged out successfully');
}

}