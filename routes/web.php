<?php

use App\Http\Controllers\ListingsController;
use Illuminate\Support\Facades\Route;

# https://laravel.com/docs/11.x/controllers#actions-handled-by-resource-controllers
Route::get('/', [ListingsController::class, 'index'])->name('listings.index');
Route::get('/listings/{listing}', [ListingsController::class, 'show'])->where('listing', '[0-9]+')->name('listings.show');
Route::get('/listings/create', [ListingsController::class, 'create'])->name('listings.create');
Route::post('/listings', [ListingsController::class, 'store'])->name('listings.store');