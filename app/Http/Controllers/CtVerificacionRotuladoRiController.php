<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CtVerificacionRotuladoRi;
use Illuminate\Http\Request;
use App\Models\Attachment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CtVerificacionRotuladoRiController extends Controller
{
    public function index()
    {
        return response()->json(CtVerificacionRotuladoRi::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'etc' => 'nullable|string',
            'fecha_visita' => 'required|date',
            'municipio' => 'required|string',
            'hora_inicial' => 'required',
            'hora_final' => 'required',
            'institucion' => 'required|string',
            'sede' => 'required|string',
            'numero_visita' => 'required|string',
            'tipo_visita' => 'required|string',
            'num_beneficiarios' => 'required|integer',
            'operador' => 'required|string',
            'contrato' => 'required|string',
            'nombre_apoyo' => 'required|string',
            'cedula_apoyo' => 'required|string',
            'cargo_apoyo' => 'required|string',
            'telefono_apoyo' => 'required|string',
            'nombre_atiende' => 'required|string',
            'cedula_atiende' => 'required|string',
            'cargo_atiende' => 'required|string',
            'telefono_atiende' => 'required|string',
            'filas_5109' => 'nullable|json',
            'filas_810' => 'nullable|json',
        ]);

        $request['created_by'] = auth()->user()->id;

        $registro = CtVerificacionRotuladoRi::create($request->all());

        // Manejar los archivos (si aplica)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Guardar el archivo en el directorio correspondiente
                $filePath = $file->store('tecnico/ct_verificacion_rotulado_ri/' . $registro->id, 'public');

                // Crear el registro en la tabla attachments
                Attachment::create([
                    'form_name' => 'ct_verificacion_rotulado_ri',
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
        $registro = CtVerificacionRotuladoRi::findOrFail($id);
        return response()->json($registro);
    }

    public function update(Request $request, $id)
    {
        $registro = CtVerificacionRotuladoRi::findOrFail($id);
        $registro->update($request->all());

        return response()->json($registro);
    }

}
