<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EncuestaSatisfaccion;
use Illuminate\Http\JsonResponse;

class EncuestaSatisfaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse {
        $validated = $request->validate([
            'municipio_id' => 'required|exists:municipios,id',
            'institucion_id' => 'required|exists:instituciones,id',
            'sede_id' => 'required|exists:sedes,id',
            'complemento' => 'required|in:I,PS,CCT',
            'satisfaccion_complemento' => 'required|in:Muy satisfecho,Satisfecho,Poco satisfecho',
            'estado_complemento' => 'required|in:Muy satisfecho,Satisfecho,Poco satisfecho',
            'tiempo_complemento' => 'required|in:Muy satisfecho,Satisfecho,Poco satisfecho',
            'necesidades_complemento' => 'required|in:Sí,No',
            'calidad_productos' => 'required|in:Muy satisfecho,Satisfecho,Poco satisfecho',
            'atencion_personal' => 'required|in:Muy satisfecho,Satisfecho,Poco satisfecho',
        ]);

        $encuesta = EncuestaSatisfaccion::create($validated);

        return response()->json([
            'message' => 'Encuesta guardada correctamente',
            'data' => $encuesta
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
