<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'home'])->name('home');
Route::get('/badsite-checker', [GuestController::class, 'bad_site_checker'])->name('badsite-checker');
Route::get('/url-protocol', [GuestController::class, 'url_protocol'])->name('url-protocol');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile-picture/{id}', [ProfileController::class, 'updateProfilePicture'])->name('profile.picture.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Settings Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/settings', [ProfileController::class, 'settings'])->name('settings');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
