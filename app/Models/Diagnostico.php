<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Municipio;
use App\Models\Institucion;
use App\Models\Sede;

class Diagnostico extends Model
{
    use HasFactory;

    protected $fillable = [
        'sede_id',
        'etc',
        'municipio',
        'institucion',
        'sede',
        'fecha_visita',
        'hora_visita',
        'zona_geografica',
        'modalidad_atencion',
        'tipo_servicio',
        'vias_acceso',
        'transporte_alimentos',
        'zona_conflicto',
        'frecuencia_conflicto',
        'area_almacenamiento',
        'area_preparacion',
        'area_consumo',
        'unidades_sanitarias',
        'cuarto_residuos',
        'energia_electrica',
        'acueducto_agua',
        'tipo_gas',
        'recoleccion_basura',
        'equipos_almacenamiento',
        'equipos_preparacion',
        'menaje_dotacion',
        'recip_sani',
        'banos_exc',
        'lav_exc',
        'modelo_implementar',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function data_municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio');
    }

    public function data_institucion()
    {
        return $this->belongsTo(Institucion::class, 'institucion');
    }

    public function data_sede()
    {
        return $this->belongsTo(Sede::class, 'sede');
    }
}
