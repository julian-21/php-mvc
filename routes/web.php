<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();

Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // Account routes for admins only
    Route::resource('accounts', AccountController::class)->middleware('role:admin');

    // Post routes for both admins and authors
    Route::resource('posts', PostController::class)->middleware('role:author,admin');
});
