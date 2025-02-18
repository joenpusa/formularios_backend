<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialVisita extends Model
{
    use HasFactory;

    // Especificamos el nombre de la tabla
    protected $table = 'social_visitas';

    protected $fillable = [
        'etc',
        'fechaVisita',
        'municipio',
        'institucion',
        'sede',
        'operador',
        'contrato',
        'num_visita',
        'modalidad',
        'num_beneficiarios',
        'hora_inicio',
        'hora_fin',
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
        'pre_15',
        'pre_16',
        'compromiso_1_desc',
        'compromiso_1_resp',
        'compromiso_1_fecha',
        'compromiso_1_mecanismo',
        'compromiso_2_desc',
        'compromiso_2_resp',
        'compromiso_2_fecha',
        'compromiso_2_mecanismo',
        'compromiso_3_desc',
        'compromiso_3_resp',
        'compromiso_3_fecha',
        'compromiso_3_mecanismo',
        'cedula_apoyo',
        'nombre_apoyo',
        'telefono_apoyo',
        'cargo_apoyo',
        'cedula_atiende',
        'nombre_atiende',
        'telefono_atiende',
        'cargo_atiende',
        'perc_gest_social',
        'observaciones',
        'firma1',
        'firma2',
        'created_by',
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
