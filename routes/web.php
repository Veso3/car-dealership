<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Employee\CarController;
use App\Http\Controllers\Employee\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cars/{car}', [HomeController::class, 'show'])->name('cars.show');
Route::get('/search', [HomeController::class, 'search'])->name('cars.search');

// Static pages
Route::get('/kontakt', [PageController::class, 'kontakt'])->name('pages.kontakt');
Route::get('/anfahrt', [PageController::class, 'anfahrt'])->name('pages.anfahrt');
Route::get('/impressum', [PageController::class, 'impressum'])->name('pages.impressum');
Route::get('/ueber-uns', [PageController::class, 'ueberUns'])->name('pages.ueber-uns');
Route::get('/service', [PageController::class, 'service'])->name('pages.service');

// Employee routes
Route::middleware(['auth', 'employee'])->prefix('employee')->name('employee.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('cars', CarController::class);
    Route::post('/cars/{car}/images', [CarController::class, 'uploadImage'])->name('cars.images.store');
    Route::delete('/cars/images/{image}', [CarController::class, 'deleteImage'])->name('cars.images.destroy');
});

// Default dashboard - redirect admins to admin dashboard
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('employee.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Breeze auth routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
