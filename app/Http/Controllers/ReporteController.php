<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Rep;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Schema;

use App\Models\SocialVisita;
use App\Models\SocialVerificacion;
use App\Models\SocialAsistencia;
use App\Models\User;
use App\Models\CtVerificacionMateriaPrima;
use App\Models\CtVerificacionMateriaPrimaPs;
use App\Models\CtVerificacionCct;
use App\Models\CtVerificacionModalidadRps;
use App\Models\CtVerificacionRotuladoRi;
use App\Models\CtVerificacionModalidadRi;
use App\Models\CtSeguimientoEtiquetado;
use App\Models\CtCaracteristicasProducto;
use App\Models\CtTomaMuestra;

use App\Models\CtEtapaAlistamiento;
use App\Models\CtEtapaOperacion;
use App\Models\CtSeguimientoLocal;
use App\Models\CtSeguimientoRotulado;

use App\Models\Pqr;


class ReporteController extends Controller
{
    public function obtenerDatos(Request $request)
    {
        // Validar las fechas recibidas
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $fechaInicio = $request->fecha_inicio;
        $fechaFin = $request->fecha_fin;
        $municipioId = $request->municipio; // Puede ser opcional
        $usuarioId = $request->usuario; // Puede ser opcional

        // Construir la primera consulta con JOIN
        $query1 = SocialVisita::select(
                'municipios.nombre as municipio',
                'instituciones.nombre as institucion',
                'users.name as creado_por',
                'social_visitas.fechaVisita as fecha_visita',
                'social_visitas.id',
                DB::raw('"social_visitas" as tipo_reporte')
            )
            ->join('municipios', 'social_visitas.municipio', '=', 'municipios.id')
            ->join('instituciones', 'social_visitas.institucion', '=', 'instituciones.id')
            ->join('users', 'social_visitas.created_by', '=', 'users.id')
            ->whereBetween('social_visitas.fechaVisita', [$fechaInicio, $fechaFin]);

        // Aplicar filtros opcionales
        if (is_numeric($municipioId)) {
            $query1->where('social_visitas.municipio', $municipioId);
        }
        if (!empty($usuarioId)) {
            $query1->where('social_visitas.created_by', $usuarioId);
        }

        // Segunda consulta
        $query2 = SocialVerificacion::select(
                'municipios.nombre as municipio',
                'instituciones.nombre as institucion',
                'users.name as creado_por',
                'social_verificaciones.fecha_visita',
                'social_verificaciones.id',
                DB::raw('"social_verificaciones" as tipo_reporte')
            )
            ->join('municipios', 'social_verificaciones.municipio', '=', 'municipios.id')
            ->join('instituciones', 'social_verificaciones.institucion', '=', 'instituciones.id')
            ->join('users', 'social_verificaciones.created_by', '=', 'users.id')
            ->whereBetween('social_verificaciones.fecha_visita', [$fechaInicio, $fechaFin])
            ->union($query1);

            if (is_numeric($municipioId)) {
                $query2->where('social_verificaciones.municipio', $municipioId);
        }
        if (!empty($usuarioId)) {
            $query2->where('social_verificaciones.created_by', $usuarioId);
        }

        // Tercera consulta
        $query3 = SocialAsistencia::select(
                'municipios.nombre as municipio',
                'instituciones.nombre as institucion',
                'users.name as creado_por',
                'social_asistencias.fecha_visita',
                'social_asistencias.id',
                DB::raw('"social_asistencias" as tipo_reporte')

            )
            ->join('municipios', 'social_asistencias.municipio', '=', 'municipios.id')
            ->join('instituciones', 'social_asistencias.institucion', '=', 'instituciones.id')
            ->join('users', 'social_asistencias.created_by', '=', 'users.id')
            ->whereBetween('social_asistencias.fecha_visita', [$fechaInicio, $fechaFin])
            ->union($query2);

            if (is_numeric($municipioId)) {
                $query3->where('social_asistencias.municipio', $municipioId);
        }
        if (!empty($usuarioId)) {
            $query3->where('social_asistencias.created_by', $usuarioId);
        }

        $query4 = CtVerificacionMateriaPrima::select(
            'municipios.nombre as municipio',
            'instituciones.nombre as institucion',
            'users.name as creado_por',
            'ct_verificacion_materia_prima.fecha_visita',
            'ct_verificacion_materia_prima.id',
            DB::raw('"ct_verificacion_materia_prima" as tipo_reporte')

        )
        ->join('municipios', 'ct_verificacion_materia_prima.municipio', '=', 'municipios.id')
        ->join('instituciones', 'ct_verificacion_materia_prima.institucion', '=', 'instituciones.id')
        ->join('users', 'ct_verificacion_materia_prima.created_by', '=', 'users.id')
        ->whereBetween('ct_verificacion_materia_prima.fecha_visita', [$fechaInicio, $fechaFin])
        ->union($query3);

        if (is_numeric($municipioId)) {
            $query4->where('ct_verificacion_materia_prima.municipio', $municipioId);
        }
        if (!empty($usuarioId)) {
            $query4->where('ct_verificacion_materia_prima.created_by', $usuarioId);
        }

        $query5 = CtVerificacionMateriaPrimaPs::select(
            'municipios.nombre as municipio',
            'instituciones.nombre as institucion',
            'users.name as creado_por',
            'ct_verificacion_materia_prima_ps.fecha_visita',
            'ct_verificacion_materia_prima_ps.id',
            DB::raw('"ct_verificacion_materia_prima_ps" as tipo_reporte')

        )
        ->join('municipios', 'ct_verificacion_materia_prima_ps.municipio', '=', 'municipios.id')
        ->join('instituciones', 'ct_verificacion_materia_prima_ps.institucion', '=', 'instituciones.id')
        ->join('users', 'ct_verificacion_materia_prima_ps.created_by', '=', 'users.id')
        ->whereBetween('ct_verificacion_materia_prima_ps.fecha_visita', [$fechaInicio, $fechaFin])
        ->union($query4);

        if (is_numeric($municipioId)) {
            $query5->where('ct_verificacion_materia_prima_ps.municipio', $municipioId);
        }
        if (!empty($usuarioId)) {
            $query5->where('ct_verificacion_materia_prima_ps.created_by', $usuarioId);
        }

        $query6 = CtVerificacionCct::select(
            'municipios.nombre as municipio',
            'instituciones.nombre as institucion',
            'users.name as creado_por',
            'ct_verificacion_cct.fecha_visita',
            'ct_verificacion_cct.id',
            DB::raw('"ct_verificacion_cct" as tipo_reporte')

        )
        ->join('municipios', 'ct_verificacion_cct.municipio', '=', 'municipios.id')
        ->join('instituciones', 'ct_verificacion_cct.institucion', '=', 'instituciones.id')
        ->join('users', 'ct_verificacion_cct.created_by', '=', 'users.id')
        ->whereBetween('ct_verificacion_cct.fecha_visita', [$fechaInicio, $fechaFin])
        ->union($query5);

        if (is_numeric($municipioId)) {
            $query6->where('ct_verificacion_cct.municipio', $municipioId);
        }
        if (!empty($usuarioId)) {
            $query6->where('ct_verificacion_cct.created_by', $usuarioId);
        }

        $query7 = CtVerificacionModalidadRps::select(
            'municipios.nombre as municipio',
            'instituciones.nombre as institucion',
            'users.name as creado_por',
            'ct_verificacion_modalidad_rps.fecha_visita',
            'ct_verificacion_modalidad_rps.id',
            DB::raw('"ct_verificacion_modalidad_rps" as tipo_reporte')

        )
        ->join('municipios', 'ct_verificacion_modalidad_rps.municipio', '=', 'municipios.id')
        ->join('instituciones', 'ct_verificacion_modalidad_rps.institucion', '=', 'instituciones.id')
        ->join('users', 'ct_verificacion_modalidad_rps.created_by', '=', 'users.id')
        ->whereBetween('ct_verificacion_modalidad_rps.fecha_visita', [$fechaInicio, $fechaFin])
        ->union($query6);

        if (is_numeric($municipioId)) {
            $query7->where('ct_verificacion_modalidad_rps.municipio', $municipioId);
        }
        if (!empty($usuarioId)) {
            $query7->where('ct_verificacion_modalidad_rps.created_by', $usuarioId);
        }

        $query8 = CtVerificacionRotuladoRi::select(
            'municipios.nombre as municipio',
            'instituciones.nombre as institucion',
            'users.name as creado_por',
            'ct_verificacion_rotulado_ri.fecha_visita',
            'ct_verificacion_rotulado_ri.id',
            DB::raw('"ct_verificacion_rotulado_ri" as tipo_reporte')

        )
        ->join('municipios', 'ct_verificacion_rotulado_ri.municipio', '=', 'municipios.id')
        ->join('instituciones', 'ct_verificacion_rotulado_ri.institucion', '=', 'instituciones.id')
        ->join('users', 'ct_verificacion_rotulado_ri.created_by', '=', 'users.id')
        ->whereBetween('ct_verificacion_rotulado_ri.fecha_visita', [$fechaInicio, $fechaFin])
        ->union($query7);

        if (is_numeric($municipioId)) {
            $query8->where('ct_verificacion_rotulado_ri.municipio', $municipioId);
        }
        if (!empty($usuarioId)) {
            $query8->where('ct_verificacion_rotulado_ri.created_by', $usuarioId);
        }

        $query9 = CtVerificacionModalidadRi::select(
            'municipios.nombre as municipio',
            'instituciones.nombre as institucion',
            'users.name as creado_por',
            'ct_verificacion_modalidad_ri.fecha_visita',
            'ct_verificacion_modalidad_ri.id',
            DB::raw('"ct_verificacion_modalidad_ri" as tipo_reporte')

        )
        ->join('municipios', 'ct_verificacion_modalidad_ri.municipio', '=', 'municipios.id')
        ->join('instituciones', 'ct_verificacion_modalidad_ri.institucion', '=', 'instituciones.id')
        ->join('users', 'ct_verificacion_modalidad_ri.created_by', '=', 'users.id')
        ->whereBetween('ct_verificacion_modalidad_ri.fecha_visita', [$fechaInicio, $fechaFin])
        ->union($query8);

        if (is_numeric($municipioId)) {
            $query9->where('ct_verificacion_modalidad_ri.municipio', $municipioId);
        }
        if (!empty($usuarioId)) {
            $query9->where('ct_verificacion_modalidad_ri.created_by', $usuarioId);
        }

        $query10 = CtSeguimientoEtiquetado::select(
            'municipios.nombre as municipio',
            DB::raw('"NO APLICA" as institucion'),
            'users.name as creado_por',
            'ct_seguimiento_etiquetados.fecha_visita',
            'ct_seguimiento_etiquetados.id',
            DB::raw('"ct_seguimiento_etiquetados" as tipo_reporte')

        )
        ->join('municipios', 'ct_seguimiento_etiquetados.municipio', '=', 'municipios.id')
        ->join('users', 'ct_seguimiento_etiquetados.created_by', '=', 'users.id')
        ->whereBetween('ct_seguimiento_etiquetados.fecha_visita', [$fechaInicio, $fechaFin])
        ->union($query9);

        if (is_numeric($municipioId)) {
            $query10->where('ct_seguimiento_etiquetados.municipio', $municipioId);
        }
        if (!empty($usuarioId)) {
            $query10->where('ct_seguimiento_etiquetados.created_by', $usuarioId);
        }

        $query11 = CtCaracteristicasProducto::select(
            'municipios.nombre as municipio',
            DB::raw('"NO APLICA" as institucion'),
            'users.name as creado_por',
            'ct_caracteristicas_productos.fecha_visita',
            'ct_caracteristicas_productos.id',
            DB::raw('"ct_caracteristicas_productos" as tipo_reporte')

        )
        ->join('municipios', 'ct_caracteristicas_productos.municipio', '=', 'municipios.id')
        ->join('users', 'ct_caracteristicas_productos.created_by', '=', 'users.id')
        ->whereBetween('ct_caracteristicas_productos.fecha_visita', [$fechaInicio, $fechaFin])
        ->union($query10);

        if (is_numeric($municipioId)) {
            $query11->where('ct_caracteristicas_productos.municipio', $municipioId);
        }
        if (!empty($usuarioId)) {
            $query11->where('ct_caracteristicas_productos.created_by', $usuarioId);
        }

        $query12 = CtTomaMuestra::select(
            'municipios.nombre as municipio',
            'instituciones.nombre as institucion',
            'users.name as creado_por',
            'ct_toma_muestras.fecha_visita',
            'ct_toma_muestras.id',
            DB::raw('"ct_toma_muestras" as tipo_reporte')

        )
        ->join('municipios', 'ct_toma_muestras.municipio', '=', 'municipios.id')
        ->join('instituciones', 'ct_toma_muestras.institucion', '=', 'instituciones.id')
        ->join('users', 'ct_toma_muestras.created_by', '=', 'users.id')
        ->whereBetween('ct_toma_muestras.fecha_visita', [$fechaInicio, $fechaFin])
        ->union($query11);

        if (!empty($municipioId)) {
            $query12->where('ct_toma_muestras.municipio', $municipioId);
        }
        if (!empty($usuarioId)) {
            $query12->where('ct_toma_muestras.created_by', $usuarioId);
        }

        $query13 = CtEtapaAlistamiento::select(
            'municipios.nombre as municipio',
            DB::raw('"NO APLICA" as institucion'),
            'users.name as creado_por',
            'ct_etapa_alistamiento.fecha_visita',
            'ct_etapa_alistamiento.id',
            DB::raw('"ct_etapa_alistamiento" as tipo_reporte')

        )
        ->join('municipios', 'ct_etapa_alistamiento.municipio', '=', 'municipios.id')
        ->join('users', 'ct_etapa_alistamiento.created_by', '=', 'users.id')
        ->whereBetween('ct_etapa_alistamiento.fecha_visita', [$fechaInicio, $fechaFin])
        ->union($query12);

        if (is_numeric($municipioId)) {
            $query13->where('ct_etapa_alistamiento.municipio', $municipioId);
        }
        if (!empty($usuarioId)) {
            $query13->where('ct_etapa_alistamiento.created_by', $usuarioId);
        }

        $query14 = CtEtapaOperacion::select(
            'municipios.nombre as municipio',
            DB::raw('"NO APLICA" as institucion'),
            'users.name as creado_por',
            'ct_etapa_operaciones.fecha_visita',
            'ct_etapa_operaciones.id',
            DB::raw('"ct_etapa_operaciones" as tipo_reporte')

        )
        ->join('municipios', 'ct_etapa_operaciones.municipio', '=', 'municipios.id')
        ->join('users', 'ct_etapa_operaciones.created_by', '=', 'users.id')
        ->whereBetween('ct_etapa_operaciones.fecha_visita', [$fechaInicio, $fechaFin])
        ->union($query13);

        if (is_numeric($municipioId)) {
            $query14->where('ct_etapa_operaciones.municipio', $municipioId);
        }
        if (!empty($usuarioId)) {
            $query14->where('ct_etapa_operaciones.created_by', $usuarioId);
        }

        $query15 = CtSeguimientoLocal::select(
            'municipios.nombre as municipio',
            'instituciones.nombre as institucion',
            'users.name as creado_por',
            'ct_seguimiento_locales.fecha_visita',
            'ct_seguimiento_locales.id',
            DB::raw('"ct_seguimiento_locales" as tipo_reporte')

        )
        ->join('municipios', 'ct_seguimiento_locales.municipio', '=', 'municipios.id')
        ->join('instituciones', 'ct_seguimiento_locales.institucion', '=', 'instituciones.id')
        ->join('users', 'ct_seguimiento_locales.created_by', '=', 'users.id')
        ->whereBetween('ct_seguimiento_locales.fecha_visita', [$fechaInicio, $fechaFin])
        ->union($query14);

        if (is_numeric($municipioId)) {
            $query15->where('ct_seguimiento_locales.municipio', $municipioId);
        }
        if (!empty($usuarioId)) {
            $query15->where('ct_seguimiento_locales.created_by', $usuarioId);
        }

        $query16 = CtSeguimientoRotulado::select(
            'municipios.nombre as municipio',
            'instituciones.nombre as institucion',
            'users.name as creado_por',
            'ct_seguimiento_rotulado.fecha_visita',
            'ct_seguimiento_rotulado.id',
            DB::raw('"ct_seguimiento_rotulado" as tipo_reporte')

        )
        ->join('municipios', 'ct_seguimiento_rotulado.municipio', '=', 'municipios.id')
        ->join('instituciones', 'ct_seguimiento_rotulado.institucion', '=', 'instituciones.id')
        ->join('users', 'ct_seguimiento_rotulado.created_by', '=', 'users.id')
        ->whereBetween('ct_seguimiento_rotulado.fecha_visita', [$fechaInicio, $fechaFin])
        ->union($query15);

        if (!empty($municipioId)) {
            $query16->where('ct_seguimiento_rotulado.municipio', $municipioId);
        }
        if (!empty($usuarioId)) {
            $query16->where('ct_seguimiento_rotulado.created_by', $usuarioId);
        }

        // Obtener los resultados ordenados y con paginación
        $registros = $query16->orderBy('fecha_visita', 'desc')->get();

        return response()->json($registros);
    }

    public function generarExcel(Request $request)
    {
        $tipo = $request->input('tipo');

        if (!in_array($tipo, ['usuarios', 'ventas', 'productos'])) {
            return response()->json(['error' => 'Tipo de reporte inválido'], 400);
        }

        $fileName = "Reporte_{$tipo}_" . date('Ymd_His') . ".xlsx";

        return Excel::download(new ReporteExport($tipo), $fileName);
    }

    public function generarIndividual(Request $request)
    {
        try {
            // Validar los datos del request
            $request->validate([
                'tipo_reporte' => 'required|string',
                'id' => 'required|integer'
            ]);

            $tipoReporte = $request->input('tipo_reporte');
            $id = $request->input('id');

            // Definir las tablas y modelos disponibles
            $modelos = [
                'ct_seguimiento_rotulado' => CtSeguimientoRotulado::class,
                'ct_etapa_alistamiento' => CtEtapaAlistamiento::class,
                'ct_verificacion_materia_prima' => CtVerificacionMateriaPrima::class,
                'ct_verificacion_modalidad_rps' => CtVerificacionModalidadRps::class,
                'ct_verificacion_rotulado_ri' => CtVerificacionRotuladoRi::class,
                'ct_verificacion_modalidad_ri' => CtVerificacionModalidadRi::class,
                'pqr' => Pqr::class,
                'social_visitas' => SocialVisita::class,
                'social_asistencias' => SocialAsistencia::class,
                'social_verificaciones' => SocialVerificacion::class,
                'ct_verificacion_materia_prima_ps' => CtVerificacionMateriaPrimaPs::class,
                'ct_verificacion_cct' => CtVerificacionCct::class,
                'ct_seguimiento_etiquetado' => CtSeguimientoEtiquetado::class,
                'ct_caracteristicas_productos' => CtCaracteristicasProducto::class,
                'ct_toma_muestras' => CtTomaMuestra::class,
                'ct_etapa_operaciones' => CtEtapaOperacion::class,
                'ct_seguimiento_locales' => CtSeguimientoLocal::class,
            ];

            // Verificar si el tipo de reporte es válido
            if (!array_key_exists($tipoReporte, $modelos)) {
                return response()->json([
                    'message' => 'Tipo de reporte inválido'
                ], 400);
            }

            // Obtener el modelo correspondiente
            $modelo = $modelos[$tipoReporte];

            // Obtener las relaciones del modelo
            $relaciones = [];

            if (Schema::hasColumn((new $modelo)->getTable(), 'municipio')) {
                $relaciones[] = 'data_municipio';
            }
            if (Schema::hasColumn((new $modelo)->getTable(), 'institucion')) {
                $relaciones[] = 'data_institucion';
            }
            if (Schema::hasColumn((new $modelo)->getTable(), 'sede')) {
                $relaciones[] = 'data_sede';
            }

            // Consultar el registro con sus relaciones (si las tiene)
            $registro = count($relaciones) > 0
                ? $modelo::with($relaciones)->find($id)
                : $modelo::find($id);

            // Validar si se encontró el registro
            if (!$registro) {
                return response()->json([
                    'message' => 'Registro no encontrado'
                ], 404);
            }

            // Seleccionar la vista según el tipo de reporte
            $vista = "export.{$tipoReporte}_pdf";

            // Generar el PDF
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView($vista, compact('registro'));

            $pdfContent = $pdf->output();

            return response($pdfContent, 200)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', "attachment; filename={$tipoReporte}_{$id}.pdf");

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al generar el PDF',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function getData($tipo)
    {
        // switch ($tipo) {
            // case 'usuarios':
            //     return User::select('id', 'name', 'email', 'created_at')->get();
            // case 'ventas':
            //     return Venta::select('id', 'cliente', 'monto', 'fecha')->get();
            // case 'productos':
            //     return Producto::select('id', 'nombre', 'precio', 'stock')->get();
            // default:
                return collect([]);
        // }
    }
}
