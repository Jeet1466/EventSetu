<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientRequestController;
use App\Http\Controllers\AdminRequestController;
use App\Http\Controllers\VendorResponseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Redirect dashboard to role-specific dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Client Routes
Route::middleware(['auth', 'role:client'])->prefix('client')->name('client.')->group(function () {
    Route::get('/requests', [ClientRequestController::class, 'index'])->name('requests.index');
    Route::get('/requests/create', [ClientRequestController::class, 'create'])->name('requests.create');
    Route::post('/requests', [ClientRequestController::class, 'store'])->name('requests.store');
    Route::get('/requests/{id}', [ClientRequestController::class, 'show'])->name('requests.show');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/requests', [AdminRequestController::class, 'index'])->name('requests.index');
    Route::get('/requests/{id}', [AdminRequestController::class, 'show'])->name('requests.show');
});

// Vendor Routes
Route::middleware(['auth', 'role:vendor'])->prefix('vendor')->name('vendor.')->group(function () {
    Route::get('/dashboard', [VendorResponseController::class, 'index'])->name('dashboard');
    Route::get('/profile', [VendorResponseController::class, 'profile'])->name('profile');
    Route::post('/profile', [VendorResponseController::class, 'updateProfile'])->name('profile.update');
    Route::get('/accept/{requestItemId}', [VendorResponseController::class, 'accept'])->name('accept');
    Route::post('/response', [VendorResponseController::class, 'store'])->name('response.store');
});

require __DIR__.'/auth.php';
