<?php

use App\Livewire\BannedIp;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Livewire\UserManagement;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route::view('user-management', 'user-management')
//     ->middleware(['auth', 'verified'])
//     ->name('user-management');

Route::get('user-management', UserManagement::class)
    ->middleware(['auth', 'verified'])
    ->name('user-management');

Route::get('banned-ip', BannedIp::class)
    ->middleware(['auth', 'verified'])
    ->name('banned-ip');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
