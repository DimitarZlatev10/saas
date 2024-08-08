<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\BusinessDetails;
use App\Livewire\BusinessList;
use App\Livewire\BusinessRegister;
use App\Livewire\EditBusiness;
use App\Livewire\Home;
use App\Livewire\UserAppointments;
use App\Livewire\UserBusinesses;
use Illuminate\Support\Facades\Route;

// Authentication routes
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// User Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/my-businesses', UserBusinesses::class)->name('user.businesses');
    Route::get('/my-appointments', UserAppointments::class)->name('user.appointments');
    Route::get('/businesses/{businessId}/edit', EditBusiness::class)->name('business.edit');
});

// Home Route
Route::get('/', Home::class)->name('home');

// Business routes
Route::get('/businesses', BusinessList::class)->name('businesses.index');
Route::get('/businesses/register', BusinessRegister::class)->name('businesses.register');
Route::get('/businesses/{business}', BusinessDetails::class)->name('businesses.show');


// Additional routes
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Authentication routes (Breeze or default)
require __DIR__ . '/auth.php';
