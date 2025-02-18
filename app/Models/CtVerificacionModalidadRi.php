<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtVerificacionModalidadRi extends Model
{
    use HasFactory;

    protected $table = 'ct_verificacion_modalidad_ri';

    protected $fillable = [
        'etc',
        'municipio',
        'fecha_visita',
        'hora_inicial',
        'hora_final',
        'institucion',
        'sede',
        'numero_visita',
        'operador',
        'contrato',
        'num_beneficiarios',
        'tipo_visita',
        'indicador1',
        'indicador2',
        'indicador3',
        'observaciones',
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
        'filas',
        'pre_1',
        'pre_1_obs',
        'pre_2',
        'pre_2_obs',
        'pre_3',
        'pre_3_obs',
        'pre_4',
        'pre_4_obs',
        'pre_5',
        'pre_5_obs',
        'pre_6',
        'pre_6_obs',
        'pre_7',
        'pre_7_obs',
        'pre_8',
        'pre_8_obs',
        'pre_9',
        'pre_9_obs',
        'pre_10',
        'pre_10_obs',
        'pre_11',
        'pre_11_obs',
        'pre_12',
        'pre_12_obs',
        'pre_13',
        'pre_13_obs',
        'pre_14',
        'pre_14_obs',
        'pre_15',
        'pre_15_obs',
        'pre_16',
        'pre_16_obs',
        'pre_17',
        'pre_17_obs',
        'pre_18',
        'pre_18_obs',
        'pre_19',
        'pre_19_obs',
        'pre_20',
        'pre_20_obs',
        'pre_21',
        'pre_21_obs',
        'pre_22',
        'pre_22_obs',
        'pre_23',
        'pre_23_obs',
        'created_by'
    ];

    protected $casts = [
        'filas' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio');
    }

    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'institucion');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede');
    }
}
