<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Illuminate\Http\Request::create('/api/reporte/datos', 'POST', [
    'fecha_inicio' => '2020-01-01',
    'fecha_fin' => '2030-12-31'
]);
$response = $kernel->handle($request);
echo $response->getContent();
