<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CtVerificacionModalidadRps;
use Illuminate\Http\Request;
use App\Models\Attachment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CtVerificacionModalidadRpsController extends Controller
{
    public function index()
    {
        return response()->json(CtVerificacionModalidadRps::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'etc' => 'nullable|string',
            'files' => 'nullable|array',
            'fecha_visita' => 'nullable|date',
            'hora_inicial' => 'nullable|string',
            'hora_final' => 'nullable|string',
            'institucion' => 'nullable|string',
            'municipio' => 'nullable|string',
            'sede' => 'nullable|string',
            'numero_visita' => 'nullable|string',
            'tipo_visita' => 'nullable|string',
            'num_beneficiarios' => 'nullable|integer',
            'operador' => 'nullable|string',
            'contrato' => 'nullable|string',
            'observaciones' => 'nullable|string',
            'fecha_ultima_fumiga' => 'nullable|date',
            'fecha_ultima_limpieza' => 'nullable|date',
            'fecha_ultima_visita' => 'nullable|date',
            'concepto_emitido' => 'nullable|string',
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
            'condi_1' => 'nullable|string',
            'condi_1_obs' => 'nullable|string',
            'condi_2' => 'nullable|string',
            'condi_2_obs' => 'nullable|string',
            'condi_3' => 'nullable|string',
            'condi_3_obs' => 'nullable|string',
            'condi_4' => 'nullable|string',
            'condi_4_obs' => 'nullable|string',
            'condi_5' => 'nullable|string',
            'condi_5_obs' => 'nullable|string',
            'condi_6' => 'nullable|string',
            'condi_6_obs' => 'nullable|string',
            'condi_7' => 'nullable|string',
            'condi_7_obs' => 'nullable|string',
            'condi_8' => 'nullable|string',
            'condi_8_obs' => 'nullable|string',
            'condi_9' => 'nullable|string',
            'condi_9_obs' => 'nullable|string',
            'condi_10' => 'nullable|string',
            'condi_10_obs' => 'nullable|string',
            'condi_11' => 'nullable|string',
            'condi_11_obs' => 'nullable|string',
            'condi_12' => 'nullable|string',
            'condi_12_obs' => 'nullable|string',
            'condi_13' => 'nullable|string',
            'condi_13_obs' => 'nullable|string',
            'condi_14' => 'nullable|string',
            'condi_14_obs' => 'nullable|string',
            'condi_15' => 'nullable|string',
            'condi_15_obs' => 'nullable|string',
            'condi_16' => 'nullable|string',
            'condi_16_obs' => 'nullable|string',
            'condi_17' => 'nullable|string',
            'condi_17_obs' => 'nullable|string',
            'condi_18' => 'nullable|string',
            'condi_18_obs' => 'nullable|string',
            'condi_19' => 'nullable|string',
            'condi_19_obs' => 'nullable|string',
            'condi_20' => 'nullable|string',
            'condi_20_obs' => 'nullable|string',
            'condi_21' => 'nullable|string',
            'condi_21_obs' => 'nullable|string',
            'condi_22' => 'nullable|string',
            'condi_22_obs' => 'nullable|string',
            'condi_23' => 'nullable|string',
            'condi_23_obs' => 'nullable|string',
            'condi_24' => 'nullable|string',
            'condi_24_obs' => 'nullable|string',
            'condi_25' => 'nullable|string',
            'condi_25_obs' => 'nullable|string',
            'condi_26' => 'nullable|string',
            'condi_26_obs' => 'nullable|string',
            'condi_27' => 'nullable|string',
            'condi_27_obs' => 'nullable|string',
            'condi_28' => 'nullable|string',
            'condi_28_obs' => 'nullable|string',
            'condi_29' => 'nullable|string',
            'condi_29_obs' => 'nullable|string',
            'condi_30' => 'nullable|string',
            'condi_30_obs' => 'nullable|string',
            'condi_31' => 'nullable|string',
            'condi_31_obs' => 'nullable|string',
            'condi_32' => 'nullable|string',
            'condi_32_obs' => 'nullable|string',
            'condi_33' => 'nullable|string',
            'condi_33_obs' => 'nullable|string',
            'condi_34' => 'nullable|string',
            'condi_34_obs' => 'nullable|string',
            'condi_35' => 'nullable|string',
            'condi_35_obs' => 'nullable|string',
            'condi_36' => 'nullable|string',
            'condi_36_obs' => 'nullable|string',
            'condi_37' => 'nullable|string',
            'condi_37_obs' => 'nullable|string',
            'condi_38' => 'nullable|string',
            'condi_38_obs' => 'nullable|string',
            'condi_39' => 'nullable|string',
            'condi_39_obs' => 'nullable|string',
            'condi_40' => 'nullable|string',
            'condi_40_obs' => 'nullable|string',
            'condi_41' => 'nullable|string',
            'condi_41_obs' => 'nullable|string',
            'condi_42' => 'nullable|string',
            'condi_42_obs' => 'nullable|string',
            'condi_43' => 'nullable|string',
            'condi_43_obs' => 'nullable|string',
            'condi_44' => 'nullable|string',
            'condi_44_obs' => 'nullable|string',
            'condi_45' => 'nullable|string',
            'condi_45_obs' => 'nullable|string',
            'condi_46' => 'nullable|string',
            'condi_46_obs' => 'nullable|string',
            'condi_47' => 'nullable|string',
            'condi_47_obs' => 'nullable|string',
            'condi_48' => 'nullable|string',
            'condi_48_obs' => 'nullable|string',
            'condi_49' => 'nullable|string',
            'condi_49_obs' => 'nullable|string',
            'condi_50' => 'nullable|string',
            'condi_50_obs' => 'nullable|string',
            'condi_51' => 'nullable|string',
            'condi_51_obs' => 'nullable|string',
            'condi_52' => 'nullable|string',
            'condi_52_obs' => 'nullable|string',
            'condi_53' => 'nullable|string',
            'condi_53_obs' => 'nullable|string',
            'condi_54' => 'nullable|string',
            'condi_54_obs' => 'nullable|string',
            'condi_55' => 'nullable|string',
            'condi_55_obs' => 'nullable|string',
            'condi_56' => 'nullable|string',
            'condi_56_obs' => 'nullable|string',
            'condi_57' => 'nullable|string',
            'condi_57_obs' => 'nullable|string',
            'condi_58' => 'nullable|string',
            'condi_58_obs' => 'nullable|string',
            'condi_59' => 'nullable|string',
            'condi_59_obs' => 'nullable|string',
            'condi_60' => 'nullable|string',
            'condi_60_obs' => 'nullable|string',
            'alimento1_1' => 'nullable|string',
            'alimento1_2' => 'nullable|string',
            'alimento1_3' => 'nullable|string',
            'alimento1_4' => 'nullable|string',
            'alimento1_5' => 'nullable|string',
            'alimento1_6' => 'nullable|string',
            'alimento1_7' => 'nullable|string',
            'alimento1_8' => 'nullable|string',
            'alimento1_9' => 'nullable|string',
            'alimento2_1' => 'nullable|string',
            'alimento2_2' => 'nullable|string',
            'alimento2_3' => 'nullable|string',
            'alimento2_4' => 'nullable|string',
            'alimento2_5' => 'nullable|string',
            'alimento2_6' => 'nullable|string',
            'alimento2_7' => 'nullable|string',
            'alimento2_8' => 'nullable|string',
            'alimento2_9' => 'nullable|string',
            'alimento3_1' => 'nullable|string',
            'alimento3_2' => 'nullable|string',
            'alimento3_3' => 'nullable|string',
            'alimento3_4' => 'nullable|string',
            'alimento3_5' => 'nullable|string',
            'alimento3_6' => 'nullable|string',
            'alimento3_7' => 'nullable|string',
            'alimento3_8' => 'nullable|string',
            'alimento3_9' => 'nullable|string',
            'alimento4_1' => 'nullable|string',
            'alimento4_2' => 'nullable|string',
            'alimento4_3' => 'nullable|string',
            'alimento4_4' => 'nullable|string',
            'alimento4_5' => 'nullable|string',
            'alimento4_6' => 'nullable|string',
            'alimento4_7' => 'nullable|string',
            'alimento4_8' => 'nullable|string',
            'alimento4_9' => 'nullable|string',
            'alimento5_1' => 'nullable|string',
            'alimento5_2' => 'nullable|string',
            'alimento5_3' => 'nullable|string',
            'alimento5_4' => 'nullable|string',
            'alimento5_5' => 'nullable|string',
            'alimento5_6' => 'nullable|string',
            'alimento5_7' => 'nullable|string',
            'alimento5_8' => 'nullable|string',
            'alimento5_9' => 'nullable|string',
            'porcentaje1' => 'nullable|string',
            'porcentaje2' => 'nullable|string',
            'porcentaje3' => 'nullable|string',
            'proteico1' => 'nullable|string',
            'proteico2' => 'nullable|string',
            'proteico3' => 'nullable|string',
            'proteico4' => 'nullable|string',
            'proteico5' => 'nullable|string',
            'proteico6' => 'nullable|string',
            'proteico7' => 'nullable|string',
            'proteico8' => 'nullable|string',
            'leguminosa1' => 'nullable|string',
            'leguminosa2' => 'nullable|string',
            'leguminosa3' => 'nullable|string',
            'leguminosa4' => 'nullable|string',
            'leguminosa5' => 'nullable|string',
            'leguminosa6' => 'nullable|string',
            'leguminosa7' => 'nullable|string',
            'leguminosa8' => 'nullable|string',
            'cereal1' => 'nullable|string',
            'cereal2' => 'nullable|string',
            'cereal3' => 'nullable|string',
            'cereal4' => 'nullable|string',
            'cereal5' => 'nullable|string',
            'cereal6' => 'nullable|string',
            'cereal7' => 'nullable|string',
            'cereal8' => 'nullable|string',
            'tuberculo1' => 'nullable|string',
            'tuberculo2' => 'nullable|string',
            'tuberculo3' => 'nullable|string',
            'tuberculo4' => 'nullable|string',
            'tuberculo5' => 'nullable|string',
            'tuberculo6' => 'nullable|string',
            'tuberculo7' => 'nullable|string',
            'tuberculo8' => 'nullable|string',
            'verdura1' => 'nullable|string',
            'verdura2' => 'nullable|string',
            'verdura3' => 'nullable|string',
            'verdura4' => 'nullable|string',
            'verdura5' => 'nullable|string',
            'verdura6' => 'nullable|string',
            'verdura7' => 'nullable|string',
            'verdura8' => 'nullable|string',
            'jugo1' => 'nullable|string',
            'jugo2' => 'nullable|string',
            'jugo3' => 'nullable|string',
            'jugo4' => 'nullable|string',
            'jugo5' => 'nullable|string',
            'jugo6' => 'nullable|string',
            'jugo7' => 'nullable|string',
            'jugo8' => 'nullable|string',
        ]);

        $data['user_id'] = Auth::id();

        $registro = CtVerificacionModalidadRps::create($data);

        // Manejar los archivos (si aplica)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Guardar el archivo en el directorio correspondiente
                $filePath = $file->store('tecnico/ct_verificacion_modalidad_rps/' . $registro->id, 'public');

                // Crear el registro en la tabla attachments
                Attachment::create([
                    'form_name' => 'ct_verificacion_modalidad_rps',
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

    public function show(CtVerificacionModalidadRps $registro)
    {
        return response()->json($registro);
    }

    public function update(Request $request, CtVerificacionModalidadRps $registro)
    {
        $registro->update($request->all());
        return response()->json($registro);
    }

}
