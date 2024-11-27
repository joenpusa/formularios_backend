<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormatoController;
use App\Http\Controllers\UserController;

Route::post('/login', [AuthController::class, 'login']);


// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {
     // Auth
     Route::post('/logout', [AuthController::class, 'logout']);
     Route::post('/refresh-token', [AuthController::class, 'refreshToken']);
     Route::post('/register', [AuthController::class, 'register']);

     // Información del usuario autenticado
     Route::get('/user', function (Request $request) {
         return $request->user();
     });

     // Usuarios
     Route::get('/users', [UserController::class, 'index']);

     // Formatos
     Route::apiResource('formatos', FormatoController::class);
});
