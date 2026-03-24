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
            'sede_id' => 'nullable',
            'etc' => 'nullable',
            'municipio' => 'nullable',
            'institucion' => 'nullable',
            'sede' => 'nullable',
            'fecha_visita' => 'nullable|date',
            'hora_visita' => 'nullable|date_format:H:i',
            'zona_geografica' => 'nullable',
            'modalidad_atencion' => 'nullable',
            'modelo_atencion' => 'nullable',
            'tipo_complemento' => 'nullable',
            'ind_area_comedor' => 'nullable',
            'ind_area_produccion' => 'nullable',
            'ind_agua_potable' => 'nullable',
            'cerca_contaminacion' => 'nullable',
            'zona_conflicto' => 'nullable',
            'frecuencia_conflicto' => 'nullable',
            'esp_almacenamiento' => 'nullable',
            'mat_techo_alm' => 'nullable',
            'mat_piso_alm' => 'nullable',
            'mat_paredes_alm' => 'nullable',
            'est_almacenamiento' => 'nullable',
            'esp_preparacion' => 'nullable',
            'mat_techo_prep' => 'nullable',
            'mat_piso_prep' => 'nullable',
            'mat_paredes_prep' => 'nullable',
            'est_preparacion' => 'nullable',
            'esp_consumo' => 'nullable',
            'est_consumo' => 'nullable',
            'area_residuos' => 'nullable',
            'banos_manipuladores' => 'nullable',
            'electricidad' => 'nullable',
            'acceso_agua' => 'nullable',
            'fuente_agua' => 'nullable',
            'alcantarillado' => 'nullable',
            'combustible' => 'nullable',
            'espacio_gas' => 'nullable',
            'recoleccion_basura' => 'nullable',
            'disp_organicos' => 'nullable',
            'disp_no_organicos' => 'nullable',
            'clasi_residuos' => 'nullable',
            'cant_neveras' => 'nullable',
            'func_neveras' => 'nullable',
            'tamano_neveras' => 'nullable',
            'cant_conge' => 'nullable',
            'func_conge' => 'nullable',
            'tamano_conge' => 'nullable',
            'almacena_estibas' => 'nullable',
            'elementos_alm' => 'nullable',
            'cant_bas' => 'nullable',
            'cap_bas' => 'nullable',
            'uni_bas' => 'nullable',
            'term_fun' => 'nullable',
            'ollas_pre' => 'nullable',
            'cap_ollas_pre' => 'nullable',
            'ollas_pre_fun' => 'nullable',
            'cant_ral' => 'nullable',
            'cant_exp' => 'nullable',
            'cant_tab_pic' => 'nullable',
            'cant_estufas' => 'nullable',
            'total_quemadores' => 'nullable',
            'quemadores_fun' => 'nullable',
            'cant_lic' => 'nullable',
            'lic_fun' => 'nullable',
            'lic_ind' => 'nullable',
            'ollas_exc' => 'nullable',
            'ollas_util' => 'nullable',
            'pailas_util' => 'nullable',
            'calderos_util' => 'nullable',
            'tam_calderos' => 'nullable',
            'cuch_exc' => 'nullable',
            'cuch_util' => 'nullable',
            'cuchara_serv' => 'nullable',
            'cap_ninos' => 'nullable',
            'cant_platos' => 'nullable',
            'pla_lla' => 'nullable',
            'pla_hon' => 'nullable',
            'portas' => 'nullable',
            'vasos' => 'nullable',
            'cucharas' => 'nullable',
            'tenedores' => 'nullable',
            'recip_sani' => 'nullable',
            'banos_exc' => 'nullable',
            'lav_exc' => 'nullable',
            'modelo_implementar' => 'nullable',
            'firma1' => 'nullable',
            'firma2' => 'nullable',
            'nombre_apoyo' => 'nullable',
            'cedula_apoyo' => 'nullable',
            'cargo_apoyo' => 'nullable',
            'telefono_apoyo' => 'nullable',
            'nombre_atiende' => 'nullable',
            'cedula_atiende' => 'nullable',
            'cargo_atiende' => 'nullable',
            'telefono_atiende' => 'nullable',
        ]);

        $data = $request->all();
        $data['created_by'] = auth()->user()->id;

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
