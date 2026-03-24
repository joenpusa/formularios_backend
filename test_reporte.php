<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $request = new Illuminate\Http\Request();
    $request->merge(['fecha_inicio' => '2020-01-01', 'fecha_fin' => '2026-12-31']);
    
    $controller = app(\App\Http\Controllers\ReporteController::class);
    $response = $controller->obtenerDatos($request);
    echo "OK: " . strlen($response->getContent()) . " bytes\n";
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString();
}
