<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAsistencia extends Model
{
    use HasFactory;

    protected $table = 'social_asistencias';

    protected $fillable = [
        'etc',
        'fecha_visita',
        'municipio',
        'institucion',
        'sede',
        'operador',
        'objetivo',
        'contrato',
        'num_beneficiarios',
        'hora_inicio',
        'hora_fin',
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
        'filas',
        'created_by',
        'tematica',
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
