<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CtTomaMuestra;
use Illuminate\Http\Request;
use App\Models\Attachment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CtTomaMuestraController extends Controller
{
    public function index()
    {
        return CtTomaMuestra::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => 'nullable|string',
            'etc' => 'nullable|string',
            'operador' => 'nullable|string',
            'contrato' => 'nullable|string',
            'municipio' => 'nullable|string',
            'direccion' => 'nullable|string',
            'fecha_visita' => 'nullable|date',
            'producto' => 'nullable|string',
            'institucion' => 'nullable|string',
            'hora' => 'nullable|string',
            'cantidad_kardex' => 'nullable|string',
            'cantidad_muestra' => 'nullable|string',
            'nombre_operador' => 'nullable|string',
            'olor' => 'nullable|string',
            'color' => 'nullable|string',
            'textura' => 'nullable|string',
            'obs_olor' => 'nullable|string',
            'obs_color' => 'nullable|string',
            'obs_textura' => 'nullable|string',
            'cuarto' => 'nullable|string',
            'tanque' => 'nullable|string',
            'nevera' => 'nullable|string',
            'caba' => 'nullable|string',
            'temp_ref' => 'nullable|string',
            'temp_con' => 'nullable|string',
            'cantidad_alm' => 'nullable|string',
            'observaciones' => 'nullable|string',
            'firma1' => 'nullable|string',
            'firma2' => 'nullable|string',
            'nombre_atiende' => 'nullable|string',
            'cedula_atiende' => 'nullable|string',
            'cargo_atiende' => 'nullable|string',
            'telefono_atiende' => 'nullable|string',
            'nombre_apoyo' => 'nullable|string',
            'cedula_apoyo' => 'nullable|string',
            'cargo_apoyo' => 'nullable|string',
            'telefono_apoyo' => 'nullable|string',
            'filas' => 'nullable|json',
        ]);
        // Agregar el usuario que crea el registro
        $validated['created_by'] = Auth::id();

        // Crear el registro en la tabla ct_toma_muestras
        $ctTomaMuestra = CtTomaMuestra::create($validated);

        // Manejar los archivos (si aplica)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Guardar el archivo en el directorio correspondiente
                $filePath = $file->store('tecnico/tomaMuestra/' . $ctTomaMuestra->id, 'public');

                // Crear el registro en la tabla attachments
                Attachment::create([
                    'form_name' => 'ct_toma_muestra',
                    'form_id' => $ctTomaMuestra->id,
                    'file_path' => $filePath,
                    'original_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return response()->json([
            'message' => 'Registro creado exitosamente.',
            'data' => $ctTomaMuestra,
        ], 201);
    }

    public function show($id)
    {
        return CtTomaMuestra::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $tomaMuestra = CtTomaMuestra::findOrFail($id);

        $validated = $request->validate([
            // Los mismos campos que en store
        ]);

        $tomaMuestra->update($validated);

        return $tomaMuestra;
    }
}
