<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CtEtapaAlistamiento;
use Illuminate\Http\Request;
use App\Models\Attachment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CtEtapaAlistamientoController extends Controller
{
    public function index()
    {
        return response()->json(CtEtapaAlistamiento::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'etc' => 'nullable|string|max:255',
            'municipio' => 'nullable|string|max:255',
            'operador' => 'nullable|string|max:255',
            'contrato' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'correo' => 'nullable|string|max:255',
            'fecha_visita' => 'nullable|date',
            'hora_inicio' => 'nullable|date_format:H:i',
            'hora_fin' => 'nullable|date_format:H:i',
            'num_visita' => 'nullable|string',
            'tipo_visita' => 'nullable|string|max:255',
            'files.*' => 'nullable|file',
            'puntaje_esperado' => 'nullable|integer',
            'puntaje_obtenido' => 'nullable|integer',
            'porcentaje' => 'nullable|numeric',
            'observaciones' => 'nullable|string',
            'observaciones_recibe' => 'nullable|string',
            'firma1' => 'nullable|string',
            'firma2' => 'nullable|string',
            'telefono_apoyo' => 'nullable|string',
            'nombre_apoyo' => 'nullable|string',
            'cedula_apoyo' => 'nullable|string',
            'cargo_apoyo' => 'nullable|string',
            'telefono_atiende' => 'nullable|string',
            'nombre_atiende' => 'nullable|string',
            'cedula_atiende' => 'nullable|string',
            'cargo_atiende' => 'nullable|string',
            'fecha_certificado' => 'nullable|date',
            'concepto_sanitario' => 'nullable|string',
        ]);

        for ($i = 1; $i <= 28; $i++) {
            $validated["pre_$i"] = $request->input("pre_$i");
            if ($i != 14) {
                $validated["pre_{$i}_obs"] = $request->input("pre_{$i}_obs");
            }
        }

        $validated['created_by'] = Auth::id();

        $ctEtapaAlistamiento = CtEtapaAlistamiento::create($validated);

        // Manejar los archivos (si se subieron)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Guardar el archivo en el directorio correspondiente
                $filePath = $file->store('tecnico/EtaAlistamiento/' . $ctEtapaAlistamiento->id, 'public');

                // Crear el registro en la tabla attachments
                Attachment::create([
                    'form_name' => 'ct_etapa_alistamiento',
                    'form_id' => $ctEtapaAlistamiento->id,
                    'file_path' => $filePath,
                    'original_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Formulario de etapa de alistamiento creado con éxito',
            'data' => $ctEtapaAlistamiento,
        ], Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $ctEtapaAlistamiento = CtEtapaAlistamiento::findOrFail($id);
        return response()->json($ctEtapaAlistamiento);
    }

    public function update(Request $request, $id)
    {
        $ctEtapaAlistamiento = CtEtapaAlistamiento::findOrFail($id);

        $validated = $request->all();
        for ($i = 1; $i <= 28; $i++) {
            $validated["pre_$i"] = $request->input("pre_$i");
            $validated["pre_{$i}_obs"] = $request->input("pre_{$i}_obs");
        }

        $ctEtapaAlistamiento->update($validated);

        return response()->json($ctEtapaAlistamiento);
    }

}
