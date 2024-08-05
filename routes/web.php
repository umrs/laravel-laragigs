<?php

use App\Http\Controllers\ListingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

# https://laravel.com/docs/11.x/controllers#actions-handled-by-resource-controllers
Route::get('/', [ListingsController::class, 'index'])->name('listings.index');
Route::get('/listings/{listing}', [ListingsController::class, 'show'])->where('listing', '[0-9]+')->name('listings.show');
Route::get('/listings/create', [ListingsController::class, 'create'])->middleware('auth')->name('listings.create');
Route::post('/listings', [ListingsController::class, 'store'])->middleware('auth')->name('listings.store');
Route::get('/listings/{listing}/edit', [ListingsController::class, 'edit'])->middleware('auth')->name('listings.edit');
Route::put('/listings/{listing}', [ListingsController::class, 'update'])->middleware('auth')->name('listings.update');
Route::delete('/listings/{listing}', [ListingsController::class, 'destroy'])->middleware('auth')->name('listings.destroy');

Route::get('/register', [UserController::class, 'register'])->middleware('guest')->name('register');
Route::post('/register', [UserController::class, 'store'])->middleware('guest')->name('register.store');
Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->middleware('guest')->name('login.authenticate');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');