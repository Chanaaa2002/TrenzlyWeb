<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

//Page Routes
Route::get('/', [PageController::class, 'index'])->name('welcome');
Route::get('/mens', [PageController::class, 'mens'])->name('pages.mens');
Route::get('/womens', [PageController::class, 'womens'])->name('pages.womens');
Route::get('/acce', [PageController::class, 'acce'])->name('pages.acce');
Route::get('/about', [PageController::class, 'about'])->name('pages.about');





Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Authenticated Routes
// Route::middleware('auth')->group(function () {
//     Route::get('/user/dashboard', [PageController::class, 'userDashboard'])->name('user.dashboard');
//     Route::get('/admin/dashboard', [PageController::class, 'adminDashboard'])->middleware('role:admin')->name('admin.dashboard');
// });

Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin/dashboard', [PageController::class, 'adminDashboard'])->name('admin.dashboard');
});

// User Routes (Only Authenticated Users)
Route::middleware(['auth', RoleMiddleware::class . ':user'])->group(function () {
    Route::get('/user/dashboard', [PageController::class, 'userDashboard'])->name('user.dashboard');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
