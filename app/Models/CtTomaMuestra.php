<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtTomaMuestra extends Model
{
    use HasFactory;
    protected $table = 'ct_toma_muestras';
    protected $fillable = [
        'tipo',
        'etc',
        'operador',
        'contrato',
        'municipio',
        'direccion',
        'fecha_visita',
        'producto',
        'institucion',
        'hora',
        'cantidad_kardex',
        'cantidad_muestra',
        'nombre_operador',
        'olor',
        'color',
        'textura',
        'obs_olor',
        'obs_color',
        'obs_textura',
        'cuarto',
        'tanque',
        'nevera',
        'caba',
        'temp_ref',
        'temp_con',
        'cantidad_alm',
        'observaciones',
        'firma1',
        'firma2',
        'nombre_atiende',
        'cedula_atiende',
        'cargo_atiende',
        'telefono_atiende',
        'nombre_apoyo',
        'cedula_apoyo',
        'cargo_apoyo',
        'telefono_apoyo',
        'filas',
        'created_by',
    ];

    protected $casts = [
        'files' => 'array',
        'filas' => 'array',
        'fecha_visita' => 'date',
    ];
}
