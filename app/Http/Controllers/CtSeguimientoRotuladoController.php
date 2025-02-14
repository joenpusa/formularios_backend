<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CtSeguimientoRotulado;
use Illuminate\Http\Request;
use App\Models\Attachment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CtSeguimientoRotuladoController extends Controller
{
    public function index()
    {
        return response()->json(CtSeguimientoRotulado::all(), 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'etc' => 'string',
            'fecha_visita' => 'date|nullable',
            'municipio' => 'required|string',
            'institucion' => 'required|string',
            'sede' => 'required|string',
            'hora_inicial' => 'date_format:H:i|nullable',
            'hora_final' => 'date_format:H:i|nullable',
            'modalidad' => 'required|string',
            'operador' => 'required|string',
            'contrato' => 'required|string',
            'supervisor' => 'string|nullable',
            'observaciones' => 'string|nullable',
            'filas' => 'json|nullable',
            'firma1' => 'string|nullable',
            'firma2' => 'string|nullable',
            'nombre_apoyo' => 'string|nullable',
            'cedula_apoyo' => 'string|nullable',
            'cargo_apoyo' => 'string|nullable',
            'telefono_apoyo' => 'string|nullable',
            'nombre_atiende' => 'string|nullable',
            'cedula_atiende' => 'string|nullable',
            'cargo_atiende' => 'string|nullable',
            'telefono_atiende' => 'string|nullable',
        ]);

        $validatedData['created_by'] = Auth::id();

        $registro = CtSeguimientoRotulado::create($validatedData);

        // Manejar los archivos (si se subieron)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filePath = $file->store('tecnico/ct_seguimiento_rotulado/' . $registro->id, 'public');
                Attachment::create([
                    'form_name' => 'ct_seguimiento_rotulado',
                    'form_id' => $registro->id,
                    'file_path' => $filePath,
                    'original_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Seguimiento rotulado creado con éxito',
            'data' => $registro,
        ], Response::HTTP_CREATED);

    }

    public function show($id)
    {
        $registro = CtSeguimientoRotulado::findOrFail($id);
        return response()->json($registro, 200);
    }

    public function update(Request $request, $id)
    {
        $registro = CtSeguimientoRotulado::findOrFail($id);

        $validatedData = $request->validate([
            'etc' => 'string',
            'fecha_visita' => 'date|nullable',
            'municipio' => 'required|string',
            'institucion' => 'required|string',
            'sede' => 'required|string',
            'hora_inicial' => 'date_format:H:i|nullable',
            'hora_final' => 'date_format:H:i|nullable',
            'modalidad' => 'required|string',
            'operador' => 'required|string',
            'contrato' => 'required|string',
            'supervisor' => 'string|nullable',
            'observaciones' => 'string|nullable',
            'files' => 'array|nullable',
            'filas' => 'array|nullable',
            'firma1' => 'string|nullable',
            'firma2' => 'string|nullable',
            'nombre_apoyo' => 'string|nullable',
            'cedula_apoyo' => 'string|nullable',
            'cargo_apoyo' => 'string|nullable',
            'telefono_apoyo' => 'string|nullable',
            'nombre_atiende' => 'string|nullable',
            'cedula_atiende' => 'string|nullable',
            'cargo_atiende' => 'string|nullable',
            'telefono_atiende' => 'string|nullable',
        ]);

        $registro->update($validatedData);

        return response()->json($registro, 200);
    }

}
