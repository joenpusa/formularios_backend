<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtEtapaAlistamiento extends Model
{
    use HasFactory;

    protected $table = 'ct_etapa_alistamiento';

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
        'nombre_apoyo',
        'cedula_apoyo',
        'cargo_apoyo',
        'telefono_apoyo',
        'nombre_atiende',
        'cedula_atiende',
        'cargo_atiende',
        'telefono_atiende',
        'created_by',
    ];

    // Add all pre fields dynamically
    public function getFillable()
    {
        $preFields = [];
        for ($i = 1; $i <= 28; $i++) {
            $preFields[] = "pre_{$i}";
            // Exclude the 14th field
            if ($i != 14) {
                $preFields[] = "pre_{$i}_obs";
            }
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
