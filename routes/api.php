<?php

use App\Http\Controllers\Api\ListingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group( function () {
    Route::apiResource('/listings', ListingsController::class);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
