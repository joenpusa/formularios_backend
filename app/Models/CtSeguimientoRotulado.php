<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtSeguimientoRotulado extends Model
{
    use HasFactory;

    protected $table = 'ct_seguimiento_rotulado';

    protected $fillable = [
        'etc', 'fecha_visita', 'municipio', 'institucion', 'sede', 'hora_inicial', 'hora_final',
        'modalidad', 'operador', 'contrato', 'supervisor', 'observaciones', 'files', 'filas',
        'firma1', 'firma2', 'nombre_apoyo', 'cedula_apoyo', 'cargo_apoyo', 'telefono_apoyo',
        'nombre_atiende', 'cedula_atiende', 'cargo_atiende', 'telefono_atiende', 'created_by'
    ];

    protected $casts = [
        'filas' => 'array',
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
