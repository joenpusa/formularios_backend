<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtVerificacionMateriaPrimaPs extends Model
{
    use HasFactory;
    protected $table = 'ct_verificacion_materia_prima_ps';

    protected $fillable = [
        'etc',
        'fecha_visita',
        'municipio',
        'institucion',
        'sede',
        'hora_inicial',
        'hora_final',
        'operador',
        'contrato',
        'tipo_visita',
        'numero_visita',
        'num_beneficiarios',
        'descripcion_menu',
        'observaciones',
        'porcentajeCumplimiento',
        'filas',
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
        'nota1',
        'created_by'
    ];

    protected $casts = [
        'fecha_visita' => 'date',
        'hora_inicial' => 'datetime',
        'hora_final' => 'datetime',
        'filas' => 'json'
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
