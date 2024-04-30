<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/auth/auth-login');
});

// midlewere auth
Route::middleware(['auth'])->group(function () {
    // routes to home return view
    Route::get('/home', function () {
        return view('pages.dashboard', ['type_menu' => 'home']);
    })->name('home');

    Route::resource('users', UserController::class);
});
