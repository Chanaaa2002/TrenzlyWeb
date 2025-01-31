<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;


// Public Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Token Management
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/tokens/create', function (Request $request) {
        $token = $request->user()->createToken($request->token_name);
        return ['token' => $token->plainTextToken];
    });

    Route::get('/tokens', function (Request $request) {
        return $request->user()->tokens;
    })->name('tokens.index');
});

// Protected Routes (Authenticated Only)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);

    Route::get('/user', function (Request $request) {
        return response()->json([
            'id' => $request->user()->id,
            'name' => $request->user()->name,
            'email' => $request->user()->email,
            'role' => $request->user()->role, // Include role
        ]);
    });
});

// Admin Routes
Route::middleware(['auth:sanctum', \App\Http\Middleware\RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return response()->json(['message' => 'Welcome to the Admin Dashboard']);
    });
});

// User Routes
Route::middleware(['auth:sanctum', \App\Http\Middleware\RoleMiddleware::class . ':user'])->group(function () {
    Route::get('user.dashboard', function () {
        return response()->json(['message' => 'Welcome to the User Dashboard']);
    });
});