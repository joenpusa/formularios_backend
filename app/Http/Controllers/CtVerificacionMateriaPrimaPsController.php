<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CtVerificacionMateriaPrimaPs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attachment;

class CtVerificacionMateriaPrimaPsController extends Controller
{
    public function index() {
        return response()->json(CtVerificacionMateriaPrimaPs::all());
    }

    public function store(Request $request) {
        $request->validate([
            'etc' => 'required|string',
            'fecha_visita' => 'nullable|date',
            'municipio' => 'nullable|integer',
            'institucion' => 'nullable|integer',
            'sede' => 'nullable|integer',
            'hora_inicial' => 'nullable|date_format:H:i',
            'hora_final' => 'nullable|date_format:H:i',
            'operador' => 'nullable|string',
            'contrato' => 'nullable|string',
            'tipo_visita' => 'nullable|string',
            'numero_visita' => 'nullable|string',
            'num_beneficiarios' => 'nullable|integer',
            'descripcion_menu' => 'nullable|string',
            'observaciones' => 'nullable|string',
            'porcentajeCumplimiento' => 'nullable|numeric|min:0|max:100',
            'filas' => 'nullable|json',
            'firma1' => 'nullable|string',
            'firma2' => 'nullable|string',
            'nombre_apoyo' => 'nullable|string',
            'cedula_apoyo' => 'nullable|string',
            'cargo_apoyo' => 'nullable|string',
            'telefono_apoyo' => 'nullable|string',
            'nombre_atiende' => 'nullable|string',
            'cedula_atiende' => 'nullable|string',
            'cargo_atiende' => 'nullable|string',
            'telefono_atiende' => 'nullable|string',
            'nota1' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id();

        $registro = CtVerificacionMateriaPrimaPs::create($data);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Guardar el archivo en el directorio correspondiente
                $filePath = $file->store('tecnico/ct_verificacion_materia_prima_ps/' . $registro->id, 'public');

                // Crear el registro en la tabla attachments
                Attachment::create([
                    'form_name' => 'ct_verificacion_materia_prima_ps',
                    'form_id' => $registro->id,
                    'file_path' => $filePath,
                    'original_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return response()->json([
            'message' => 'Registro creado exitosamente.',
            'data' => $registro,
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

}
