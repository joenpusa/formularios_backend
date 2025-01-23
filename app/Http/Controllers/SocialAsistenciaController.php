<?php

namespace App\Http\Controllers;

use App\Models\SocialAsistencia;
use Illuminate\Http\Request;
use App\Models\Attachment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SocialAsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(SocialAsistencia::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'etc' => 'nullable|string',
            'fecha_visita' => 'nullable|date',
            'municipio' => 'nullable|string',
            'institucion' => 'nullable|string',
            'sede' => 'nullable|string',
            'operador' => 'nullable|string',
            'objetivo' => 'nullable|string',
            'contrato' => 'nullable|string',
            'num_beneficiarios' => 'required|integer',
            'hora_inicio' => 'nullable|date_format:H:i',
            'hora_fin' => 'nullable|date_format:H:i',
            'nombre_apoyo' => 'nullable|string',
            'cedula_apoyo' => 'nullable|string',
            'cargo_apoyo' => 'nullable|string',
            'telefono_apoyo' => 'nullable|string',
            'nombre_atiende' => 'nullable|string',
            'cedula_atiende' => 'nullable|string',
            'cargo_atiende' => 'nullable|string',
            'telefono_atiende' => 'nullable|string',
            'firma1' => 'nullable|string',
            'firma2' => 'nullable|string',
            'filas' => 'nullable|json',
            'files.*' => 'nullable|file',

        ]);

        // Obtener el ID del usuario que creó la visita
        $validated['created_by'] = Auth::id();
        // Crear la visita
        $socialAsistencia = SocialAsistencia::create($validated);

        // Manejar los archivos (si se subieron)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Guardar el archivo en el directorio correspondiente
                $filePath = $file->store('social/asistencias/' . $socialAsistencia->id, 'public'); // Guarda en el directorio 'storage/app/social/asistencias'

                // Crear el registro en la tabla attachments
                Attachment::create([
                    'form_name' => 'social_asistencias',
                    'form_id' => $socialAsistencia->id,
                    'file_path' => $filePath,
                    'original_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Asistencia creada con éxito',
            'data' => $socialAsistencia,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $socialAsistencia = SocialAsistencia::findOrFail($id);
        return response()->json($socialAsistencia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

}
