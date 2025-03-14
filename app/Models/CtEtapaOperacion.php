<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtEtapaOperacion extends Model
{
    use HasFactory;

    protected $table = 'ct_etapa_operaciones';

    protected $fillable = [
        'etc',
        'municipio',
        'operador',
        'contrato',
        'direccion',
        'correo',
        'fecha_visita',
        'hora_inicio',
        'hora_fin',
        'fecha_visita2',
        'hora_inicio2',
        'hora_fin2',
        'num_visita',
        'tipo_visita',
        'fecha_certificado',
        'concepto_sanitario',
        'puntaje_esperado',
        'puntaje_obtenido',
        'porcentaje',
        'observaciones',
        'observaciones_recibe',
        'firma1',
        'firma2',
        'firma3',
        'nombre_apoyo',
        'cedula_apoyo',
        'cargo_apoyo',
        'telefono_apoyo',
        'nombre_apoyo2',
        'cedula_apoyo2',
        'cargo_apoyo2',
        'telefono_apoyo2',
        'nombre_atiende',
        'cedula_atiende',
        'cargo_atiende',
        'telefono_atiende',
        'created_by',
    ];

    /**
     * Add all 'pre_*' fields dynamically to the fillable array.
     *
     * @return array
     */
    public function getFillable()
    {
        $preFields = [];
        for ($i = 1; $i <= 66; $i++) {
            $preFields[] = "pre_{$i}";
            $preFields[] = "pre_{$i}_obs";
        }
        return array_merge(parent::getFillable(), $preFields);
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
