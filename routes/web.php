<?php

use App\Http\Controllers\ListingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ListingsController::class, 'index'])->name('listings.index');
Route::get('/listings/{listing}', [ListingsController::class, 'show'])->name('listings.show');