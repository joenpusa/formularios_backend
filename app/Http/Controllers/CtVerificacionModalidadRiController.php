<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CtVerificacionModalidadRi;
use Illuminate\Http\Request;
use App\Models\Attachment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CtVerificacionModalidadRiController extends Controller
{
    public function index()
    {
        return response()->json(CtVerificacionModalidadRi::all(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'etc' => 'nullable|string',
            'municipio' => 'nullable|string',
            'fecha_visita' => 'nullable|date',
            'hora_inicial' => 'nullable|date_format:H:i',
            'hora_final' => 'nullable|date_format:H:i',
            'institucion' => 'nullable|string',
            'sede' => 'nullable|string',
            'numero_visita' => 'nullable|string',
            'operador' => 'nullable|string',
            'contrato' => 'nullable|string',
            'num_beneficiarios' => 'nullable|integer',
            'tipo_visita' => 'nullable|string',
            'indicador1' => 'nullable|string',
            'indicador2' => 'nullable|string',
            'indicador3' => 'nullable|string',
            'observaciones' => 'nullable|string',
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
            'filas' => 'nullable|json',
            'pre_1' => 'nullable|string',
            'pre_1_obs' => 'nullable|string',
            'pre_2' => 'nullable|string',
            'pre_2_obs' => 'nullable|string',
            'pre_3' => 'nullable|string',
            'pre_3_obs' => 'nullable|string',
            'pre_4' => 'nullable|string',
            'pre_4_obs' => 'nullable|string',
            'pre_5' => 'nullable|string',
            'pre_5_obs' => 'nullable|string',
            'pre_6' => 'nullable|string',
            'pre_6_obs' => 'nullable|string',
            'pre_7' => 'nullable|string',
            'pre_7_obs' => 'nullable|string',
            'pre_8' => 'nullable|string',
            'pre_8_obs' => 'nullable|string',
            'pre_9' => 'nullable|string',
            'pre_9_obs' => 'nullable|string',
            'pre_10' => 'nullable|string',
            'pre_10_obs' => 'nullable|string',
            'pre_11' => 'nullable|string',
            'pre_11_obs' => 'nullable|string',
            'pre_12' => 'nullable|string',
            'pre_12_obs' => 'nullable|string',
            'pre_13' => 'nullable|string',
            'pre_13_obs' => 'nullable|string',
            'pre_14' => 'nullable|string',
            'pre_14_obs' => 'nullable|string',
            'pre_15' => 'nullable|string',
            'pre_15_obs' => 'nullable|string',
            'pre_16' => 'nullable|string',
            'pre_16_obs' => 'nullable|string',
            'pre_17' => 'nullable|string',
            'pre_17_obs' => 'nullable|string',
            'pre_18' => 'nullable|string',
            'pre_18_obs' => 'nullable|string',
            'pre_19' => 'nullable|string',
            'pre_19_obs' => 'nullable|string',
            'pre_20' => 'nullable|string',
            'pre_20_obs' => 'nullable|string',
            'pre_21' => 'nullable|string',
            'pre_21_obs' => 'nullable|string',
            'pre_22' => 'nullable|string',
            'pre_22_obs' => 'nullable|string',
            'pre_23' => 'nullable|string',
            'pre_23_obs' => 'nullable|string'
        ]);


        $data['created_by'] = Auth::id();

        $registro = CtVerificacionModalidadRi::create($data);

         // Manejar los archivos (si aplica)
         if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Guardar el archivo en el directorio correspondiente
                $filePath = $file->store('tecnico/ct_verificacion_modalidad_ri/' . $registro->id, 'public');

                // Crear el registro en la tabla attachments
                Attachment::create([
                    'form_name' => 'ct_verificacion_modalidad_ri',
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

    public function show($id)
    {
        return response()->json(CtVerificacionModalidadRi::findOrFail($id), 200);
    }

    public function update(Request $request, $id)
    {
        $registro = CtVerificacionModalidadRi::findOrFail($id);
        $registro->update($request->all());

        return response()->json($registro, 200);
    }
}
