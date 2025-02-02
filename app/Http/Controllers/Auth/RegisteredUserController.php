<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        Log::info('User Registration Attempt');

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Default role
        ]);

        // Trigger Laravel's Registered event
        event(new Registered($user));

        // Automatically log the user in
        Auth::login($user);

        Log::info('User Registered and Logged In Successfully', ['email' => $user->email, 'role' => $user->role]);

        // Generate token for non-admin users
        if ($user->role !== 'admin') {
            $token = $user->createToken($user->email . 'Auth-Token')->plainTextToken;

            Log::info('Token Created for User', ['token' => $token]);

            // Store token in session for usage in web requests
            session(['auth-token' => $token]);
        }

        // Redirect based on user role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard')->with([
            'status' => true,
            'message' => 'User registered successfully',
        ]);
    }
}
