<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Rep;
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
        $tipo = $request->input('tipo');

        if (!in_array($tipo, ['usuarios', 'ventas', 'productos'])) {
            return response()->json(['error' => 'Tipo de reporte inválido'], 400);
        }

        $data = $this->getData($tipo);

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
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
