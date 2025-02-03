<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CtSeguimientoEtiquetado;
use Illuminate\Http\Request;
use App\Models\Attachment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CtSeguimientoEtiquetadoController extends Controller
{
    public function index()
    {
        return response()->json(CtSeguimientoEtiquetado::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'etc' => 'nullable|string|max:100',
            'municipio' => 'nullable|string|max:10',
            'direccion' => 'nullable|string|max:100',
            'operador' => 'nullable|string|max:100',
            'contrato' => 'nullable|string|max:50',
            'fecha_visita' => 'nullable|date',

            'marca_A_Leguminosa' => 'nullable|string|max:100',
            'contenido_A_Leguminosa' => 'nullable|string|max:100',
            'pais_A_Leguminosa' => 'nullable|string|max:100',
            'fabricante_A_Leguminosa' => 'nullable|string|max:100',
            'lote_A_Leguminosa' => 'nullable|string|max:100',
            'fecha_A_Leguminosa' => 'nullable|date',
            'registro_A_Leguminosa' => 'nullable|string|max:100',

            'marca_B_Leguminosa' => 'nullable|string|max:100',
            'contenido_B_Leguminosa' => 'nullable|string|max:100',
            'pais_B_Leguminosa' => 'nullable|string|max:100',
            'fabricante_B_Leguminosa' => 'nullable|string|max:100',
            'lote_B_Leguminosa' => 'nullable|string|max:100',
            'fecha_B_Leguminosa' => 'nullable|date',
            'registro_B_Leguminosa' => 'nullable|string|max:100',

            'marca_C_Leguminosa' => 'nullable|string|max:100',
            'contenido_C_Leguminosa' => 'nullable|string|max:100',
            'pais_C_Leguminosa' => 'nullable|string|max:100',
            'fabricante_C_Leguminosa' => 'nullable|string|max:100',
            'lote_C_Leguminosa' => 'nullable|string|max:100',
            'fecha_C_Leguminosa' => 'nullable|date',
            'registro_C_Leguminosa' => 'nullable|string|max:100',

            'marca_A_Arroz' => 'nullable|string|max:100',
            'contenido_A_Arroz' => 'nullable|string|max:100',
            'pais_A_Arroz' => 'nullable|string|max:100',
            'fabricante_A_Arroz' => 'nullable|string|max:100',
            'lote_A_Arroz' => 'nullable|string|max:100',
            'fecha_A_Arroz' => 'nullable|date',
            'registro_A_Arroz' => 'nullable|string|max:100',

            'marca_A_Azucar' => 'nullable|string|max:100',
            'contenido_A_Azucar' => 'nullable|string|max:100',
            'pais_A_Azucar' => 'nullable|string|max:100',
            'fabricante_A_Azucar' => 'nullable|string|max:100',
            'lote_A_Azucar' => 'nullable|string|max:100',
            'fecha_A_Azucar' => 'nullable|date',
            'registro_A_Azucar' => 'nullable|string|max:100',

            'marca_A_Sal' => 'nullable|string|max:100',
            'contenido_A_Sal' => 'nullable|string|max:100',
            'pais_A_Sal' => 'nullable|string|max:100',
            'fabricante_A_Sal' => 'nullable|string|max:100',
            'lote_A_Sal' => 'nullable|string|max:100',
            'fecha_A_Sal' => 'nullable|date',
            'registro_A_Sal' => 'nullable|string|max:100',

            'marca_A_Aceite' => 'nullable|string|max:100',
            'contenido_A_Aceite' => 'nullable|string|max:100',
            'pais_A_Aceite' => 'nullable|string|max:100',
            'fabricante_A_Aceite' => 'nullable|string|max:100',
            'lote_A_Aceite' => 'nullable|string|max:100',
            'fecha_A_Aceite' => 'nullable|date',
            'registro_A_Aceite' => 'nullable|string|max:100',

            'marca_A_Lechep' => 'nullable|string|max:100',
            'contenido_A_Lechep' => 'nullable|string|max:100',
            'pais_A_Lechep' => 'nullable|string|max:100',
            'fabricante_A_Lechep' => 'nullable|string|max:100',
            'lote_A_Lechep' => 'nullable|string|max:100',
            'fecha_A_Lechep' => 'nullable|date',
            'registro_A_Lechep' => 'nullable|string|max:100',

            'marca_A_Spaghetti' => 'nullable|string|max:100',
            'contenido_A_Spaghetti' => 'nullable|string|max:100',
            'pais_A_Spaghetti' => 'nullable|string|max:100',
            'fabricante_A_Spaghetti' => 'nullable|string|max:100',
            'lote_A_Spaghetti' => 'nullable|string|max:100',
            'fecha_A_Spaghetti' => 'nullable|date',
            'registro_A_Spaghetti' => 'nullable|string|max:100',

            'marca_A_PanLeche' => 'nullable|string|max:100',
            'contenido_A_PanLeche' => 'nullable|string|max:100',
            'pais_A_PanLeche' => 'nullable|string|max:100',
            'fabricante_A_PanLeche' => 'nullable|string|max:100',
            'lote_A_PanLeche' => 'nullable|string|max:100',
            'fecha_A_PanLeche' => 'nullable|date',
            'registro_A_PanLeche' => 'nullable|string|max:100',

            'marca_B_PanMantequilla' => 'nullable|string|max:100',
            'contenido_B_PanMantequilla' => 'nullable|string|max:100',
            'pais_B_PanMantequilla' => 'nullable|string|max:100',
            'fabricante_B_PanMantequilla' => 'nullable|string|max:100',
            'lote_B_PanMantequilla' => 'nullable|string|max:100',
            'fecha_B_PanMantequilla' => 'nullable|date',
            'registro_B_PanMantequilla' => 'nullable|string|max:100',

            'marca_C_PanSal' => 'nullable|string|max:100',
            'contenido_C_PanSal' => 'nullable|string|max:100',
            'pais_C_PanSal' => 'nullable|string|max:100',
            'fabricante_C_PanSal' => 'nullable|string|max:100',
            'lote_C_PanSal' => 'nullable|string|max:100',
            'fecha_C_PanSal' => 'nullable|date',
            'registro_C_PanSal' => 'nullable|string|max:100',

            'marca_D_PanDulce' => 'nullable|string|max:100',
            'contenido_D_PanDulce' => 'nullable|string|max:100',
            'pais_D_PanDulce' => 'nullable|string|max:100',
            'fabricante_D_PanDulce' => 'nullable|string|max:100',
            'lote_D_PanDulce' => 'nullable|string|max:100',
            'fecha_D_PanDulce' => 'nullable|date',
            'registro_D_PanDulce' => 'nullable|string|max:100',

            'marca_E_PanMaiz' => 'nullable|string|max:100',
            'contenido_E_PanMaiz' => 'nullable|string|max:100',
            'pais_E_PanMaiz' => 'nullable|string|max:100',
            'fabricante_E_PanMaiz' => 'nullable|string|max:100',
            'lote_E_PanMaiz' => 'nullable|string|max:100',
            'fecha_E_PanMaiz' => 'nullable|date',
            'registro_E_PanMaiz' => 'nullable|string|max:100',

            'marca_F_GlletaCasera' => 'nullable|string|max:100',
            'contenido_F_GlletaCasera' => 'nullable|string|max:100',
            'pais_F_GlletaCasera' => 'nullable|string|max:100',
            'fabricante_F_GlletaCasera' => 'nullable|string|max:100',
            'lote_F_GlletaCasera' => 'nullable|string|max:100',
            'fecha_F_GlletaCasera' => 'nullable|date',
            'registro_F_GlletaCasera' => 'nullable|string|max:100',

            'marca_A_LacheEntera' => 'nullable|string|max:100',
            'contenido_A_LacheEntera' => 'nullable|string|max:100',
            'pais_A_LacheEntera' => 'nullable|string|max:100',
            'fabricante_A_LacheEntera' => 'nullable|string|max:100',
            'lote_A_LacheEntera' => 'nullable|string|max:100',
            'fecha_A_LacheEntera' => 'nullable|date',
            'registro_A_LacheEntera' => 'nullable|string|max:100',

            'marca_B_LacteoAvena' => 'nullable|string|max:100',
            'contenido_B_LacteoAvena' => 'nullable|string|max:100',
            'pais_B_LacteoAvena' => 'nullable|string|max:100',
            'fabricante_B_LacteoAvena' => 'nullable|string|max:100',
            'lote_B_LacteoAvena' => 'nullable|string|max:100',
            'fecha_B_LacteoAvena' => 'nullable|date',
            'registro_B_LacteoAvena' => 'nullable|string|max:100',

            'marca_B_LacteoAvenaSaborMaracuya' => 'nullable|string|max:100',
            'contenido_B_LacteoAvenaSaborMaracuya' => 'nullable|string|max:100',
            'pais_B_LacteoAvenaSaborMaracuya' => 'nullable|string|max:100',
            'fabricante_B_LacteoAvenaSaborMaracuya' => 'nullable|string|max:100',
            'lote_B_LacteoAvenaSaborMaracuya' => 'nullable|string|max:100',
            'fecha_B_LacteoAvenaSaborMaracuya' => 'nullable|date',
            'registro_B_LacteoAvenaSaborMaracuya' => 'nullable|string|max:100',

            'marca_B_DulceBocadilloGuayaba' => 'nullable|string|max:100',
            'contenido_B_DulceBocadilloGuayaba' => 'nullable|string|max:100',
            'pais_B_DulceBocadilloGuayaba' => 'nullable|string|max:100',
            'fabricante_B_DulceBocadilloGuayaba' => 'nullable|string|max:100',
            'lote_B_DulceBocadilloGuayaba' => 'nullable|string|max:100',
            'fecha_B_DulceBocadilloGuayaba' => 'nullable|date',
            'registro_B_DulceBocadilloGuayaba' => 'nullable|string|max:100',

            // Otros campos
            'observaciones' => 'nullable|string',

            // Datos del apoyo
            'nombre_apoyo1' => 'nullable|string|max:120',
            'cedula_apoyo1' => 'nullable|string|max:30',
            'cargo_apoyo1' => 'nullable|string|max:100',
            'telefono_apoyo1' => 'nullable|string|max:30',
            'nombre_apoyo2' => 'nullable|string|max:120',
            'cedula_apoyo2' => 'nullable|string|max:30',
            'cargo_apoyo2' => 'nullable|string|max:100',
            'telefono_apoyo2' => 'nullable|string|max:30',

            // Datos de quien atiende
            'nombre_atiende' => 'nullable|string|max:120',
            'cedula_atiende' => 'nullable|string|max:30',
            'cargo_atiende' => 'nullable|string|max:50',
            'telefono_atiende' => 'nullable|string|max:30',

            // Firmas
            'firma1' => 'nullable|string',
            'firma2' => 'nullable|string',
            'firma3' => 'nullable|string',
        ]);

        // Agregar el usuario que crea el registro
        $validated['created_by'] = Auth::id();

        // Crear el registro en la tabla ct_seguimiento_etiquetados
        $ctSeguimientoEtiquetado = CtSeguimientoEtiquetado::create($validated);

        // Manejar los archivos (si aplica)
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Guardar el archivo en el directorio correspondiente
                $filePath = $file->store('tecnico/seguimientoEtiquetados/' . $ctSeguimientoEtiquetado->id, 'public');

                // Crear el registro en la tabla attachments
                Attachment::create([
                    'form_name' => 'ct_seguimiento_etiquetados',
                    'form_id' => $ctSeguimientoEtiquetado->id,
                    'file_path' => $filePath,
                    'original_name' => $file->getClientOriginalName(),
                    'file_type' => $file->getClientMimeType(),
                ]);
            }
        }

        return response()->json([
            'message' => 'Registro creado exitosamente.',
            'data' => $ctSeguimientoEtiquetado,
        ], 201);
    }


    public function show($id)
    {
        $registro = CtSeguimientoEtiquetado::findOrFail($id);
        return response()->json($registro, 200);
    }

    public function update(Request $request, $id)
    {
        $registro = CtSeguimientoEtiquetado::findOrFail($id);

        $data = $request->validate([
            'etc' => 'nullable|string|max:100',
            'municipio' => 'nullable|string',
            'direccion' => 'nullable|string',
            'operador' => 'nullable|string',
            'contrato' => 'nullable|string',
            'fecha_visita' => 'nullable|date',
            'observaciones' => 'nullable|string',
        ]);

        $registro->update($data);

        return response()->json($registro, 200);
    }


}
