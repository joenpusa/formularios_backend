<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);


// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::middleware('auth:sanctum')->post('/refresh-token', [AuthController::class, 'refreshToken']);


    Route::post('/register', [AuthController::class, 'register']);

    // Otras rutas protegidas pueden ir aquí
    Route::get('/user', function(Request $request) {
        return $request->user();
    });
});
