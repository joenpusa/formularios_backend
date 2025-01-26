<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormatoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\SocialVisitaController;
use App\Http\Controllers\SocialAsistenciaController;
use App\Http\Controllers\SocialVerificacionController;
use App\Http\Controllers\CtEtapaAlistamientoController;
use App\Http\Controllers\CtEtapaOperacionController;

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

     // Formatos
    Route::apiResource('formatos', FormatoController::class);

    // Rutas para usuarios
    Route::get('/users', [UserController::class, 'index']); // Listar usuarios con búsqueda y paginación
    Route::post('/users', [UserController::class, 'store']); // Crear usuario
    Route::get('/users/{user}', [UserController::class, 'show']); // Mostrar usuario específico
    Route::put('/users/{user}', [UserController::class, 'update']); // Actualizar usuario
    Route::post('/users/{id}/reset-password', [UserController::class, 'resetPassword']); // Restablecer contraseña
    Route::patch('/users/{id}/toggle-active', [UserController::class, 'toggleActive']);

    Route::prefix('attachments')->group(function () {
        Route::get('/', [AttachmentController::class, 'index']); // Obtener todos los adjuntos
        Route::post('/store', [AttachmentController::class, 'store']); // Subir un adjunto
        Route::get('/download/{id}', [AttachmentController::class, 'download']); // Descargar un adjunto
        Route::delete('/delete/{id}', [AttachmentController::class, 'destroy']); // Eliminar un adjunto
    });

    // rutas componente social
    Route::apiResource('social_visitas', SocialVisitaController::class);
    Route::apiResource('social_asistencias', SocialAsistenciaController::class);
    Route::apiResource('social_verificacion', SocialVerificacionController::class);
    // rutas componente tecnico
    Route::apiResource('ct_etapa_alistamiento', CtEtapaAlistamientoController::class);
    Route::apiResource('ct_etapa_operaciones', CtEtapaOperacionController::class);


});
