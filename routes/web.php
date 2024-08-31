<?php

use App\Http\Controllers\ListingsController;
use App\Http\Controllers\TokensController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

# https://laravel.com/docs/11.x/controllers#actions-handled-by-resource-controllers
Route::get('/', [ListingsController::class, 'index'])->name('listings.index');
Route::get('/listings/{listing}', [ListingsController::class, 'show'])->where('listing', '[0-9]+')->name('listings.show');
Route::middleware('auth')->group(function() {
    Route::get('/listings/create', [ListingsController::class, 'create'])->name('listings.create');
    Route::post('/listings', [ListingsController::class, 'store'])->name('listings.store');
    Route::get('/listings/{listing}/edit', [ListingsController::class, 'edit'])->name('listings.edit');
    Route::put('/listings/{listing}', [ListingsController::class, 'update'])->name('listings.update');
    Route::delete('/listings/{listing}', [ListingsController::class, 'destroy'])->name('listings.destroy');
    Route::get('/listings/manage', [ListingsController::class, 'manage'])->name('listings.manage');
});

Route::middleware('guest')->group(function() {
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'authenticate'])->name('login.authenticate');
});
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function() {
    Route::get('/tokens', [TokensController::class, 'index'])->name('tokens.index');
    Route::post('/tokens', [TokensController::class, 'store'])->name('tokens.store');
    Route::delete('/tokens/{token}', [TokensController::class, 'destroy'])->name('tokens.destroy');
});