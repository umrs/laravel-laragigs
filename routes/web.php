<?php

use App\Http\Controllers\ListingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

# https://laravel.com/docs/11.x/controllers#actions-handled-by-resource-controllers
Route::get('/', [ListingsController::class, 'index'])->name('listings.index');
Route::get('/listings/{listing}', [ListingsController::class, 'show'])->where('listing', '[0-9]+')->name('listings.show');
Route::get('/listings/create', [ListingsController::class, 'create'])->name('listings.create');
Route::post('/listings', [ListingsController::class, 'store'])->name('listings.store');
Route::get('/listings/{listing}/edit', [ListingsController::class, 'edit'])->name('listings.edit');
Route::put('/listings/{listing}', [ListingsController::class, 'update'])->name('listings.update');
Route::delete('/listings/{listing}', [ListingsController::class, 'destroy'])->name('listings.destroy');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');