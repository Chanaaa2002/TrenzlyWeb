<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\API\AuthController;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request using Sanctum API.
     */
    public function store(Request $request)
{
    $request->validate([
        'email' => 'required|email|max:255',
        'password' => 'required|string|min:8|max:255',
    ]);

    // Call the login method of AuthController directly
    $authController = new AuthController();
    $response = $authController->login($request);

    if ($response->status() !== 200) {
        return back()->withErrors(['email' => __('Invalid credentials.')]);
    }

    $data = $response->getData();
    session(['auth-token' => $data->token]);
    session(['role' => $data->role]);

    if ($data->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('user.dashboard');
}

    /**
     * Destroy an authenticated session and log out using Sanctum API.
     */
    public function destroy(Request $request)
    {
        // Get the token from the session
        $token = session('auth-token');

        if ($token) {
            // Call the Sanctum API to revoke the token
            Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->post(url('/api/logout'));

            // Clear the token and role from the session
            session()->forget('auth-token');
            session()->forget('role');
        }

        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}