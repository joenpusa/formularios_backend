<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtCaracteristicasProducto extends Model
{
    use HasFactory;
    protected $table = 'ct_caracteristicas_productos';

    protected $fillable = [
        'etc',
        'municipio',
        'direccion',
        'fecha_visita',
        'operador',
        'contrato',
        'lugar_verificacion',
        'lugar_verificacion_otro',
        'fecha_recepcion_res',
        'cantidad_recepcionada_res',

        'proveedores_res',
        'olor_res',
        'color_res',
        'textura_res',
        'obs_olor_res',
        'obs_color_res',
        'obs_textura_res',
        'cuarto_res',
        'tanque_res',
        'nevera_res',
        'caba_res',
        'temp_ref_res',
        'temp_con_res',
        'cantidad_alm_res',
        'observaciones_res',

        'fecha_recepcion_cerdo',
        'cantidad_recepcionada_cerdo',
        'proveedores_cerdo',
        'olor_cerdo',
        'color_cerdo',
        'textura_cerdo',
        'obs_olor_cerdo',
        'obs_color_cerdo',
        'obs_textura_cerdo',
        'cuarto_cerdo',
        'tanque_cerdo',
        'nevera_cerdo',
        'caba_cerdo',
        'temp_ref_cerdo',
        'temp_con_cerdo',
        'cantidad_alm_cerdo',
        'observaciones_cerdo',

        'fecha_recepcion_pollo',
        'cantidad_recepcionada_pollo',
        'proveedores_pollo',
        'olor_pollo',
        'color_pollo',
        'textura_pollo',
        'obs_olor_pollo',
        'obs_color_pollo',
        'obs_textura_pollo',
        'cuarto_pollo',
        'tanque_pollo',
        'nevera_pollo',
        'caba_pollo',
        'temp_ref_pollo',
        'temp_con_pollo',
        'cantidad_alm_pollo',
        'observaciones_pollo',

        'observaciones_generales',
        'nombre_apoyo',
        'cedula_apoyo',
        'cargo_apoyo',
        'telefono_apoyo',
        'nombre_atiende',
        'cedula_atiende',
        'cargo_atiende',
        'telefono_atiende',
        'firma1',
        'firma2',

        'files',
        'filas_res',
        'filas_cerdo',
        'filas_pollo',
        'created_by',
    ];

    protected $casts = [
        'files' => 'array',
        'filas_res' => 'array',
        'filas_cerdo' => 'array',
        'filas_pollo' => 'array',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function data_municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio');
    }


}
