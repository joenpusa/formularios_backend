<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SocialVerificacion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Attachment;

class SocialVerificacionController extends Controller
{
    public function index()
    {
        $data = SocialVerificacion::all();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'etc' => 'nullable|string|max:255',
            'fecha_visita' => 'nullable|date',
            'municipio' => 'nullable|string|max:255',
            'institucion' => 'nullable|string|max:255',
            'operador' => 'nullable|string|max:255',
            'contrato' => 'nullable|string|max:255',
            'nombre_apoyo' => 'nullable|string|max:255',
            'cedula_apoyo' => 'nullable|string|max:255',
            'cargo_apoyo' => 'nullable|string|max:255',
            'telefono_apoyo' => 'nullable|string|max:255',
            'nombre_atiende' => 'nullable|string|max:255',
            'cedula_atiende' => 'nullable|string|max:255',
            'cargo_atiende' => 'nullable|string|max:255',
            'telefono_atiende' => 'nullable|string|max:255',
            'firma1' => 'nullable|string',
            'firma2' => 'nullable|string',
            'files.*' => 'nullable|file',
            'filas' => 'nullable|json',
        ]);

        $validated['created_by'] = Auth::id();

        $socialVerificacion = SocialVerificacion::create($validated);

        // Manejar los archivos (si se subieron)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Guardar el archivo en el directorio correspondiente
                $filePath = $file->store('social/verificaciones/' . $socialVerificacion->id, 'public'); // Guarda en el directorio 'storage/app/social/visitas'

                // Crear el registro en la tabla attachments
                Attachment::create([
                    'form_name' => 'social_verificaciones',
                    'form_id' => $socialVerificacion->id,
                    'file_path' => $filePath,
                    'original_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Visita verificación de personal creada con éxito',
            'data' => $socialVerificacion,
        ], Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $socialVerificacion = SocialVerificacion::findOrFail($id);
        return response()->json($socialVerificacion, 200);
    }

    public function update(Request $request, $id)
    {
        $socialVerificacion = SocialVerificacion::findOrFail($id);

        $validated = $request->validate([
            'etc' => 'nullable|string|max:255',
            'fecha_visita' => 'nullable|date',
            'municipio' => 'nullable|string|max:255',
            'institucion' => 'nullable|string|max:255',
            'operador' => 'nullable|string|max:255',
            'contrato' => 'nullable|string|max:255',
            'nombre_apoyo' => 'nullable|string|max:255',
            'cedula_apoyo' => 'nullable|string|max:255',
            'cargo_apoyo' => 'nullable|string|max:255',
            'telefono_apoyo' => 'nullable|string|max:255',
            'nombre_atiende' => 'nullable|string|max:255',
            'cedula_atiende' => 'nullable|string|max:255',
            'cargo_atiende' => 'nullable|string|max:255',
            'telefono_atiende' => 'nullable|string|max:255',
            'firma1' => 'nullable|string',
            'firma2' => 'nullable|string',
            'files.*' => 'nullable|file',
            'filas' => 'nullable|json',
        ]);

        $socialVerificacion->update($validated);

        return response()->json($socialVerificacion, 200);
    }

}
