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
use App\Http\Controllers\CtSeguimientoEtiquetadoController;
use App\Http\Controllers\CtCaracteristicasProductoController;
use App\Http\Controllers\CtTomaMuestraController;
use App\Http\Controllers\CtVerificacionMateriaPrimaController;
use App\Http\Controllers\CtVerificacionMateriaPrimaPsController;
use App\Http\Controllers\CtSeguimientoLocalController;
use App\Http\Controllers\PqrController;
use App\Http\Controllers\CtVerificacionCctController;
use App\Http\Controllers\CtVerificacionModalidadRpsController;
use App\Http\Controllers\CtVerificacionRotuladoRiController;
use App\Http\Controllers\CtVerificacionModalidadRiController;
use App\Http\Controllers\CtSeguimientoRotuladoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\EncuestaSatisfaccionController;



Route::post('/login', [AuthController::class, 'login']);
Route::post('/encuestas', [EncuestaSatisfaccionController::class, 'store']);

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
    // rutas componente tecnico - administrativo
    Route::apiResource('ct_etapa_alistamiento', CtEtapaAlistamientoController::class);
    Route::apiResource('ct_etapa_operaciones', CtEtapaOperacionController::class);
    Route::apiResource('ct_seguimiento_etiquetado', CtSeguimientoEtiquetadoController::class);
    Route::apiResource('ct_caracteristicas_productos', CtCaracteristicasProductoController::class);
    Route::apiResource('ct_toma_muestras', CtTomaMuestraController::class);
    // rutas componente tecnico - coordiandores de campo
    Route::apiResource('ct_verificacion_materia_prima', CtVerificacionMateriaPrimaController::class);
    Route::apiResource('ct_verificacion_materia_prima_ps', CtVerificacionMateriaPrimaPsController::class);
    Route::apiResource('ct_verificacion_cct', CtVerificacionCctController::class);
    Route::apiResource('ct_verificacion_modalidad_rps', CtVerificacionModalidadRpsController::class);
    Route::apiResource('ct_verificacion_rotulado_ri', CtVerificacionRotuladoRiController::class);
    Route::apiResource('ct_verificacion_modalidad_ri', CtVerificacionModalidadRiController::class);
    // rutas componente tecnico - supervisores de campo
    Route::apiResource('ct_seguimientos_locales', CtSeguimientoLocalController::class);
    Route::apiResource('ct_seguimiento_rotulado', CtSeguimientoRotuladoController::class);
    // tutas generales
    Route::apiResource('pqrs', PqrController::class);
    // rutas para reportes
    Route::post('/reporte/datos', [ReporteController::class, 'obtenerDatos']);
    Route::post('/reporte/excel', [ReporteController::class, 'generarExcel']);
    Route::post('/reporte/individual', [ReporteController::class, 'generarIndividual']);

});
