<?php

namespace App\Http\Controllers;

use App\Models\SocialVisita;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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
        // dd($request->file('files'));
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
            'pre_4' => 'nullable|string',
            'pre_5' => 'nullable|string',
            'pre_6' => 'nullable|string',
            'pre_7' => 'nullable|string',
            'pre_8' => 'nullable|string',
            'pre_9' => 'nullable|string',
            'pre_10' => 'nullable|string',
            'pre_11' => 'nullable|string',
            'pre_12' => 'nullable|string',
            'pre_13' => 'nullable|string',
            'pre_14' => 'nullable|string',
            'pre_15' => 'nullable|string',
            'pre_16' => 'nullable|string',
            'compromiso_1_desc' => 'nullable|string',
            'compromiso_1_resp' => 'nullable|string',
            'compromiso_1_fecha' => 'nullable|date',
            'compromiso_1_mecanismo' => 'nullable|string',
            'compromiso_2_desc' => 'nullable|string',
            'compromiso_2_resp' => 'nullable|string',
            'compromiso_2_fecha' => 'nullable|date',
            'compromiso_2_mecanismo' => 'nullable|string',
            'compromiso_3_desc' => 'nullable|string',
            'compromiso_3_resp' => 'nullable|string',
            'compromiso_3_fecha' => 'nullable|date',
            'compromiso_3_mecanismo' => 'nullable|string',
            'cedula_apoyo' => 'nullable|string',
            'nombre_apoyo' => 'nullable|string',
            'telefono_apoyo' => 'nullable|string',
            'cargo_apoyo' => 'nullable|string',
            'cedula_atiende' => 'nullable|string',
            'nombre_atiende' => 'nullable|string',
            'telefono_atiende' => 'nullable|string',
            'cargo_atiende' => 'nullable|string',
            'perc_gest_social' => 'nullable|integer',
            'observaciones' => 'nullable|string',
            'firma1' => 'nullable|string',
            'firma2' => 'nullable|string',
            'files.*' => 'nullable|file',
        ]);

        // Obtener el ID del usuario que creó la visita
        $data['created_by'] = Auth::id();
        // Crear la visita
        $visita = SocialVisita::create($data);

        // Manejar los archivos (si se subieron)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Guardar el archivo en el directorio correspondiente
                $filePath = $file->store('social/visitas/' . $visita->id, 'public'); // Guarda en el directorio 'storage/app/social/visitas'

                // Crear el registro en la tabla attachments
                Attachment::create([
                    'form_name' => 'social_visitas',
                    'form_id' => $visita->id,
                    'file_path' => $filePath,
                    'original_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }
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
