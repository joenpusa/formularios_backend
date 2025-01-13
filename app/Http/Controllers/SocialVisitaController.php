<?php

namespace App\Http\Controllers;

use App\Models\SocialVisita;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SocialVisitaController extends Controller
{
    // Listar todas las visitas (paginadas)
    public function index()
    {
        $visitas = SocialVisita::paginate(10);

        return response()->json([
            'success' => true,
            'data' => $visitas,
        ], Response::HTTP_OK);
    }

    // Crear una nueva visita
    public function store(Request $request)
    {
        $data = $request->validate([
            'etc' => 'required|string',
            'fechaVisita' => 'nullable|date',
            'municipio' => 'nullable|string',
            'institucion' => 'nullable|string',
            'sede' => 'nullable|string',
            'operador' => 'nullable|string',
            'contrato' => 'nullable|string',
            'num_visita' => 'nullable|string',
            'modalidad' => 'nullable|string',
            'num_beneficiarios' => 'nullable|integer',
            'hora_inicio' => 'nullable|date_format:H:i',
            'hora_fin' => 'nullable|date_format:H:i',
            'pre_1' => 'nullable|string',
            'pre_2' => 'nullable|string',
            'pre_3' => 'nullable|string',
            // Agrega validaciones para todos los demás campos...
            'observaciones' => 'nullable|string',
            'firstSignature' => 'nullable|string',
            'secondSignature' => 'nullable|string',
        ]);

        $visita = SocialVisita::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Visita creada con éxito',
            'data' => $visita,
        ], Response::HTTP_CREATED);
    }

    // Mostrar una visita específica
    public function show($id)
    {
        $visita = SocialVisita::find($id);

        if (!$visita) {
            return response()->json([
                'success' => false,
                'message' => 'Visita no encontrada',
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'data' => $visita,
        ], Response::HTTP_OK);
    }

    // Actualizar una visita específica
    public function update(Request $request, $id)
    {
        $visita = SocialVisita::find($id);

        if (!$visita) {
            return response()->json([
                'success' => false,
                'message' => 'Visita no encontrada',
            ], Response::HTTP_NOT_FOUND);
        }

        $data = $request->validate([
            'etc' => 'required|string',
            'fechaVisita' => 'nullable|date',
            'municipio' => 'nullable|string',
            'institucion' => 'nullable|string',
            'sede' => 'nullable|string',
            // Agrega validaciones para todos los demás campos...
            'observaciones' => 'nullable|string',
        ]);

        $visita->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Visita actualizada con éxito',
            'data' => $visita,
        ], Response::HTTP_OK);
    }

}
