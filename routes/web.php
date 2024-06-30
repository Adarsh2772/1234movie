<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\FaceSwap;
use App\Livewire\UserTable;
use Laravel\Socialite\Facades\Socialite;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('google')->user();

    // Find or create user logic here

    // Log the user in
    Auth::login($user);

    return redirect('/'); // or any other page
});

Route::get('/', FaceSwap::class)->name('faceswap');

Route::get('/visitors', UserTable::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
