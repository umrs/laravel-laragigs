<?php

use App\Http\Controllers\Api\ListingsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group( function () {
    Route::apiResource('/listings', ListingsController::class);
});
