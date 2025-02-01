<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use MongoDB\Laravel\Sanctum\HasApiTokens;


class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:255|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Default role
        ]);

        // Automatically log in and generate token
        if ($user) 
        {
            $token = $user->createToken($user->email.'Auth-Token')->plainTextToken;

            return response()->json([
                'message' => 'Registration Successful',
                'token_type' => 'Bearer',
                'token' => $token,
            ], 201);
        } 
        else 
        {
            return response()->json([
                'message' => 'Something went wrong! While registration. ',
            ], 500);
        }
    }

    /**
     * Login an existing user and generate a new token.
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials.'], 401);
        }

        // Remove old tokens and create a new one
        $user->tokens()->delete();
        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'role' => $user->role,
            'token' => $token,
        ], 200);
    }

    /**
     * Logout the user and revoke tokens.
     */
    public function logout(Request $request): JsonResponse
    {
        $user = $request->user();

        if ($user) {
            $user->tokens()->delete(); // Revoke all tokens
            return response()->json(['message' => 'Logout successful'], 200);
        }

        return response()->json(['message' => 'No authenticated user found.'], 401);
    }

    /**
     * Fetch authenticated user profile.
     */
    public function profile(Request $request): JsonResponse
    {
        $user = $request->user();

        if ($user) {
            return response()->json([
                'message' => 'Profile retrieved successfully',
                'data' => $user,
            ], 200);
        }

        return response()->json(['message' => 'Not authenticated'], 401);
    }
}
