<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');

Route::get('/doctors/{doctor}/schedules', [ScheduleController::class, 'show'])->middleware(['auth'])->name('schedules.show');

Route::post('/bookings', [BookingController::class, 'store'])->middleware('auth')->name('bookings.store');

Route::get('/booking/success', [BookingController::class, 'success'])->middleware('auth')->name('booking.success');

Route::get('/my-bookings', [BookingController::class, 'index'])->middleware('auth')->name('bookings.index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔸 Auth bawaan Laravel Breeze/Fortify/etc
require __DIR__ . '/auth.php';
