<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiagnosticoController extends Controller
{
    public function index()
    {
        return response()->json(Diagnostico::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'sede_id' => 'nullable|string',
            'etc' => 'nullable|string',
            'municipio' => 'nullable|string',
            'institucion' => 'nullable|string',
            'sede' => 'nullable|string',
            'fecha_visita' => 'nullable|date',
            'hora_visita' => 'nullable|date_format:H:i',
            'zona_geografica' => 'nullable|string',
            'modalidad_atencion' => 'nullable|string',
            'tipo_servicio' => 'nullable|string',
            'vias_acceso' => 'nullable|string',
            'transporte_alimentos' => 'nullable|string',
            'zona_conflicto' => 'nullable|string',
            'frecuencia_conflicto' => 'nullable|string',
            'area_almacenamiento' => 'nullable|string',
            'area_preparacion' => 'nullable|string',
            'area_consumo' => 'nullable|string',
            'unidades_sanitarias' => 'nullable|string',
            'cuarto_residuos' => 'nullable|string',
            'energia_electrica' => 'nullable|string',
            'acueducto_agua' => 'nullable|string',
            'tipo_gas' => 'nullable|string',
            'recoleccion_basura' => 'nullable|string',
            'equipos_almacenamiento' => 'nullable|string',
            'equipos_preparacion' => 'nullable|string',
            'menaje_dotacion' => 'nullable|string',
            'recip_sani' => 'nullable|string',
            'banos_exc' => 'nullable|string',
            'lav_exc' => 'nullable|string',
            'modelo_implementar' => 'nullable|string',
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
        ]);

        $data = $request->all();
        $data['created_by'] = Auth::id();

        $registro = Diagnostico::create($data);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Guardar el archivo en el directorio correspondiente
                $filePath = $file->store('tecnico/diagnostico/' . $registro->id, 'public');

                // Crear el registro en la tabla attachments
                Attachment::create([
                    'form_name' => 'diagnostico',
                    'form_id' => $registro->id,
                    'file_path' => $filePath,
                    'original_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return response()->json([
            'message' => 'Diagnóstico creado exitosamente.',
            'data' => $registro,
        ], 201);
    }

    public function show($id)
    {
        return response()->json(Diagnostico::findOrFail($id));
    }
}
