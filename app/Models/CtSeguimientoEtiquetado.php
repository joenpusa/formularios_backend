<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtSeguimientoEtiquetado extends Model
{
    use HasFactory;

    protected $table = 'ct_seguimiento_etiquetados';

    protected $fillable = [
        'etc',
        'municipio',
        'direccion',
        'operador',
        'contrato',
        'fecha_visita',
        'observaciones',
        'nombre_atiende',
        'cedula_atiende',
        'cargo_atiende',
        'telefono_atiende',
        'firma1',
        'firma2',
        'firma3',
        'created_by',
    ];

    /**
     * Add all dynamic fields to the fillable array.
     *
     * @return array
     */
    public function getFillable()
    {
        $dynamicFields = [];

        // Campos dinámicos relacionados con productos específicos
        $fields = [
            'A_Leguminosa', 'B_Leguminosa', 'C_Leguminosa',
            'A_Arroz', 'A_Azucar', 'A_Sal', 'A_Aceite',
            'A_Lechep', 'A_Spaghetti', 'A_PanLeche',
            'B_PanMantequilla', 'C_PanSal', 'D_PanDulce', 'E_PanMaiz',
            'F_GlletaCasera', 'A_LacheEntera', 'B_LacteoAvena',
            'B_LacteoAvenaSaborMaracuya', 'B_DulceBocadilloGuayaba'
        ];

        foreach ($fields as $field) {
            $dynamicFields[] = "marca_{$field}";
            $dynamicFields[] = "contenido_{$field}";
            $dynamicFields[] = "pais_{$field}";
            $dynamicFields[] = "fabricante_{$field}";
            $dynamicFields[] = "lote_{$field}";
            $dynamicFields[] = "fecha_{$field}";
            $dynamicFields[] = "registro_{$field}";
        }

        // Campos dinámicos relacionados con "Apoyo"
        for ($i = 1; $i <= 2; $i++) {
            $dynamicFields[] = "nombre_apoyo{$i}";
            $dynamicFields[] = "cedula_apoyo{$i}";
            $dynamicFields[] = "cargo_apoyo{$i}";
            $dynamicFields[] = "telefono_apoyo{$i}";
        }

        return array_merge(parent::getFillable(), $dynamicFields);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function data_municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio');
    }


}
