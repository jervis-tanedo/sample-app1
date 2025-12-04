<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

Route::post('login', [AuthController::class, 'login']);

Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('users', UserController::class);
        Route::apiResource('users/{userId}/address', AddressController::class);
        Route::apiResource('users/{userId}/contact', ContactController::class);
    });
});