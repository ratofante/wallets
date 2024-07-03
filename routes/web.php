<?php

use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');
    Route::resource('wallets', WalletController::class);
});

require __DIR__ . '/auth.php';
