<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CtCaracteristicasProducto;
use Illuminate\Http\Request;
use App\Models\Attachment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CtCaracteristicasProductoController extends Controller
{
    public function index()
    {
        return response()->json(CtCaracteristicasProducto::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'etc' => 'nullable|string|max:255',
            'municipio' => 'nullable|string|max:255',
            'direccion' => 'nullable|string|max:255',
            'fecha_visita' => 'nullable|date',
            'operador' => 'nullable|string|max:255',
            'contrato' => 'nullable|string|max:255',
            'lugar_verificacion' => 'nullable|string|max:255',
            'lugar_verificacion_otro' => 'nullable|string|max:255',
            'fecha_recepcion_res' => 'nullable|date',
            'cantidad_recepcionada_res' => 'nullable|integer',
            'proveedores_res' => 'nullable|string|max:255',
            'olor_res' => 'nullable|string|max:255',
            'color_res' => 'nullable|string|max:255',
            'textura_res' => 'nullable|string|max:255',
            'obs_olor_res' => 'nullable|string|max:255',
            'obs_color_res' => 'nullable|string|max:255',
            'obs_textura_res' => 'nullable|string|max:255',
            'cuarto_res' => 'nullable|string|max:255',
            'tanque_res' => 'nullable|string|max:255',
            'nevera_res' => 'nullable|string|max:255',
            'caba_res' => 'nullable|string|max:255',
            'temp_ref_res' => 'nullable|numeric',
            'temp_con_res' => 'nullable|numeric',
            'cantidad_alm_res' => 'nullable|string|max:255',
            'observaciones_res' => 'nullable|string|max:255',
            'fecha_recepcion_cerdo' => 'nullable|date',
            'cantidad_recepcionada_cerdo' => 'nullable|integer',
            'proveedores_cerdo' => 'nullable|string|max:255',
            'olor_cerdo' => 'nullable|string|max:255',
            'color_cerdo' => 'nullable|string|max:255',
            'textura_cerdo' => 'nullable|string|max:255',
            'obs_olor_cerdo' => 'nullable|string|max:255',
            'obs_color_cerdo' => 'nullable|string|max:255',
            'obs_textura_cerdo' => 'nullable|string|max:255',
            'cuarto_cerdo' => 'nullable|string|max:255',
            'tanque_cerdo' => 'nullable|string|max:255',
            'nevera_cerdo' => 'nullable|string|max:255',
            'caba_cerdo' => 'nullable|string|max:255',
            'temp_ref_cerdo' => 'nullable|numeric',
            'temp_con_cerdo' => 'nullable|numeric',
            'cantidad_alm_cerdo' => 'nullable|string|max:255',
            'observaciones_cerdo' => 'nullable|string|max:255',
            'fecha_recepcion_pollo' => 'nullable|date',
            'cantidad_recepcionada_pollo' => 'nullable|integer',
            'proveedores_pollo' => 'nullable|string|max:255',
            'olor_pollo' => 'nullable|string|max:255',
            'color_pollo' => 'nullable|string|max:255',
            'textura_pollo' => 'nullable|string|max:255',
            'obs_olor_pollo' => 'nullable|string|max:255',
            'obs_color_pollo' => 'nullable|string|max:255',
            'obs_textura_pollo' => 'nullable|string|max:255',
            'cuarto_pollo' => 'nullable|string|max:255',
            'tanque_pollo' => 'nullable|string|max:255',
            'nevera_pollo' => 'nullable|string|max:255',
            'caba_pollo' => 'nullable|string|max:255',
            'temp_ref_pollo' => 'nullable|numeric',
            'temp_con_pollo' => 'nullable|numeric',
            'cantidad_alm_pollo' => 'nullable|string|max:255',
            'observaciones_pollo' => 'nullable|string|max:255',
            'observaciones_generales' => 'nullable|string|max:255',
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
            'filas_res' => 'nullable|json',
            'filas_cerdo' => 'nullable|json',
            'filas_pollo' => 'nullable|json',
        ]);
        // Agregar el usuario que crea el registro
        $data['created_by'] = Auth::id();

        $ct_caracteristicas_producto = CtCaracteristicasProducto::create($data);

        // Manejar los archivos (si se subieron)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Guardar el archivo en el directorio correspondiente
                $filePath = $file->store('tecnico/CaracteristicasProducto/' . $ct_caracteristicas_producto->id, 'public');

                // Crear el registro en la tabla attachments
                Attachment::create([
                    'form_name' => 'ct_caracteristicas_productos',
                    'form_id' => $ct_caracteristicas_producto->id,
                    'file_path' => $filePath,
                    'original_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Formulario de caracteristicas de producto creado con éxito',
            'data' => $ct_caracteristicas_producto,
        ], Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $producto = CtCaracteristicasProducto::findOrFail($id);
        return response()->json($producto);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            // Valida los campos aquí
        ]);

        $producto = CtCaracteristicasProducto::findOrFail($id);
        $producto->update($data);

        return response()->json($producto);
    }

}
