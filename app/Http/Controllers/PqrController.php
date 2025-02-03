<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pqr;
use Illuminate\Http\Request;
use App\Models\Attachment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PqrController extends Controller
{
    public function index()
    {
        return Pqr::with('user')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'municipio' => 'required|string',
            'operador' => 'required|string',
            'contrato' => 'required|string',
            'institucion' => 'required|string',
            'sede' => 'required|string',
            'direccion' => 'required|string',
            'telefono' => 'nullable|string',
            'fecha_visita' => 'nullable|date',
            'hora_inicio' => 'nullable|date_format:H:i',
            'hora_final' => 'nullable|date_format:H:i',
            'tipo_visita' => 'required|string',
            'num_visita' => 'required|integer',
            'modalidad' => 'required|string',
            'num_programados' => 'required|integer',
            'num_atendidos' => 'required|integer',
            'descripcion' => 'required|string',
            'fechaReporte' => 'required|date',
            'medio_recepcion' => 'required|string',
            'situacion' => 'required|string',
            'compromisos' => 'required|string',
            'recomendaciones' => 'required|string',
            'estado_final' => 'required|string',
            'files' => 'nullable|array',
            'firma1' => 'nullable|string',
            'firma2' => 'nullable|string',
            'firma3' => 'nullable|string',
            'firma4' => 'nullable|string',
            'fir_cargo1' => 'nullable|string',
            'fir_cargo2' => 'nullable|string',
            'fir_cargo3' => 'nullable|string',
            'fir_cargo4' => 'nullable|string',
            'fir_telefono1' => 'nullable|string',
            'fir_telefono2' => 'nullable|string',
            'fir_telefono3' => 'nullable|string',
            'fir_telefono4' => 'nullable|string',
            'fir_cedula1' => 'nullable|string',
            'fir_cedula2' => 'nullable|string',
            'fir_cedula3' => 'nullable|string',
            'fir_cedula4' => 'nullable|string',
            'fir_nombre1' => 'nullable|string',
            'fir_nombre2' => 'nullable|string',
            'fir_nombre3' => 'nullable|string',
            'fir_nombre4' => 'nullable|string',
        ]);

        $validated['created_by'] = Auth::id();

        $pqr = Pqr::create($validated);

        // Manejar los archivos (si se subieron)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filePath = $file->store('pqrs/' . $pqr->id, 'public');
                Attachment::create([
                    'form_name' => 'pqrs',
                    'form_id' => $pqr->id,
                    'file_path' => $filePath,
                    'original_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'PQRS creado con éxito',
            'data' => $pqr,
        ], Response::HTTP_CREATED);
    }

    public function show(Pqr $pqr)
    {
        return $pqr->load('user');
    }

    public function update(Request $request, Pqr $pqr)
    {
        $pqr->update($request->all());
        return response()->json($pqr);
    }
}
