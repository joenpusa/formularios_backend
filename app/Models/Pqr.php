<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pqr extends Model
{
    use HasFactory;

    protected $fillable = [
        'municipio', 'operador', 'contrato', 'institucion', 'sede', 'direccion',
        'telefono', 'fecha_visita', 'hora_inicio', 'hora_final', 'tipo_visita',
        'num_visita', 'modalidad', 'num_programados', 'num_atendidos', 'descripcion',
        'fechaReporte', 'medio_recepcion', 'situacion', 'compromisos', 'recomendaciones',
        'estado_final', 'firma1', 'firma2', 'firma3', 'firma4', 'fir_cargo1', 'fir_cargo2',
        'fir_cargo3', 'fir_cargo4', 'fir_telefono1', 'fir_telefono2', 'fir_telefono3',
        'fir_telefono4', 'fir_cedula1', 'fir_cedula2', 'fir_cedula3', 'fir_cedula4',
        'fir_nombre1', 'fir_nombre2', 'fir_nombre3', 'fir_nombre4', 'files', 'created_by'
    ];

    protected $casts = [
        'files' => 'array',
        'fecha_visita' => 'date',
        'fechaReporte' => 'date',
        'hora_inicio' => 'datetime:H:i:s',
        'hora_final' => 'datetime:H:i:s'
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
