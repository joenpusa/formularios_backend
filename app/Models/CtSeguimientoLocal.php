<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtSeguimientoLocal extends Model
{
    use HasFactory;

    protected $table = 'ct_seguimiento_locales';
    protected $fillable = [
        'pre_1',
        'pre_2',
        'pre_3',
        'pre_4',
        'pre_5',
        'pre_6',
        'pre_7',
        'pre_8',
        'pre_9',
        'pre_10',
        'pre_11',
        'pre_12',
        'pre_13',
        'pre_14',
        'observaciones',
        'fecha_visita',
        'municipio',
        'institucion',
        'sede',
        'etc',
        'operador',
        'contrato',
        'supervisor',
        'num_beneficiarios',
        'hora_inicio',
        'hora_fin',
        'chk_ps',
        'chk_i',
        'chk_cct',
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
        'created_by'
    ];

    protected $casts = [
        'files' => 'array',
        'chk_ps' => 'boolean',
        'chk_i' => 'boolean',
        'chk_cct' => 'boolean',
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
