<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\CtVerificacionMateriaPrima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attachment;

class CtVerificacionMateriaPrimaController extends Controller {
    public function index() {
        return response()->json(CtVerificacionMateriaPrima::all());
    }

    public function store(Request $request) {
        $request->validate([
            'etc' => 'required|string',
            'fecha_visita' => 'nullable|date',
            'municipio' => 'nullable|string',
            'institucion' => 'nullable|string',
            'sede' => 'nullable|string',
            'hora_inicial' => 'nullable|date_format:H:i',
            'hora_final' => 'nullable|date_format:H:i',
            'operador' => 'nullable|string',
            'contrato' => 'nullable|string',
            'tipo_visita' => 'nullable|string',
            'numero_visita' => 'nullable|string',
            'num_beneficiarios' => 'nullable|integer',
            'descripcion_menu' => 'nullable|string',
            'observaciones' => 'nullable|string',
            'porcentajeCumplimiento' => 'nullable|numeric|min:0|max:100',
            'filas' => 'nullable|json',
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

        $registro = CtVerificacionMateriaPrima::create($data);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Guardar el archivo en el directorio correspondiente
                $filePath = $file->store('tecnico/tomaMuestra/' . $registro->id, 'public');

                // Crear el registro en la tabla attachments
                Attachment::create([
                    'form_name' => 'ct_verificacion_materia_prima',
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

    public function show($id) {
        return response()->json(CtVerificacionMateriaPrima::findOrFail($id));
    }

    public function update(Request $request, $id) {
        $registro = CtVerificacionMateriaPrima::findOrFail($id);
        $registro->update($request->all());
        return response()->json($registro);
    }


}
