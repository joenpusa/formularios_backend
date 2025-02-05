<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CtSeguimientoLocal;
use Illuminate\Http\Request;
use App\Models\Attachment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CtSeguimientoLocalController extends Controller
{
    public function index()
    {
        return response()->json(CtSeguimientoLocal::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
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
            'observaciones' => 'nullable|string',
            'fecha_visita' => 'nullable|date',
            'municipio' => 'nullable|string|max:255',
            'institucion' => 'nullable|string|max:255',
            'sede' => 'nullable|string|max:255',
            'etc' => 'nullable|string|max:255',
            'operador' => 'nullable|string|max:255',
            'contrato' => 'nullable|string|max:255',
            'supervisor' => 'nullable|string|max:255',
            'num_beneficiarios' => 'nullable|integer',
            'hora_inicio' => 'nullable|string',
            'hora_fin' => 'nullable|string',
            'chk_ps' => 'nullable|string',
            'chk_i' => 'nullable|string',
            'chk_cct' => 'nullable|string',
            'firma1' => 'nullable|string',
            'firma2' => 'nullable|string',
            'nombre_apoyo' => 'nullable|string|max:255',
            'cedula_apoyo' => 'nullable|string|max:255',
            'cargo_apoyo' => 'nullable|string|max:255',
            'telefono_apoyo' => 'nullable|string|max:255',
            'nombre_atiende' => 'nullable|string|max:255',
            'cedula_atiende' => 'nullable|string|max:255',
            'cargo_atiende' => 'nullable|string|max:255',
            'telefono_atiende' => 'nullable|string|max:255',
        ]);

        // Agregar el usuario que crea el registro
        $data['created_by'] = Auth::id();
        // Convertir valores "true"/"false" a 1/0
        $data['chk_ps'] = isset($data['chk_ps']) ? (int) filter_var($data['chk_ps'], FILTER_VALIDATE_BOOLEAN) : 0;
        $data['chk_i'] = isset($data['chk_i']) ? (int) filter_var($data['chk_i'], FILTER_VALIDATE_BOOLEAN) : 0;
        $data['chk_cct'] = isset($data['chk_cct']) ? (int) filter_var($data['chk_cct'], FILTER_VALIDATE_BOOLEAN) : 0;

        $seguimiento = CtSeguimientoLocal::create($data);

        // Manejar los archivos (si se subieron)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filePath = $file->store('tecnico/ct_seguimiento_local/' . $seguimiento->id, 'public');
                Attachment::create([
                    'form_name' => 'ct_seguimiento_locales',
                    'form_id' => $seguimiento->id,
                    'file_path' => $filePath,
                    'original_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Seguimiento local creado con éxito',
            'data' => $seguimiento,
        ], Response::HTTP_CREATED);
    }

    public function show(CtSeguimientoLocal $seguimiento)
    {
        return response()->json($seguimiento);
    }

    public function update(Request $request, CtSeguimientoLocal $seguimiento)
    {
        $seguimiento->update($request->all());
        return response()->json($seguimiento);
    }
}
