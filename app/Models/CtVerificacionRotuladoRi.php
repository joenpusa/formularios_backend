<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CtVerificacionRotuladoRi extends Model
{
    use HasFactory;
    protected $table = 'ct_verificacion_rotulado_ri';

    protected $fillable = [
        'etc',
        'created_by',
        'fecha_visita',
        'municipio',
        'hora_inicial',
        'hora_final',
        'institucion',
        'sede',
        'numero_visita',
        'tipo_visita',
        'num_beneficiarios',
        'operador',
        'contrato',
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
        'filas_5109',
        'filas_810'
    ];

    protected $casts = [
        'fecha_visita' => 'date',
        'hora_inicial' => 'datetime:H:i',
        'hora_final' => 'datetime:H:i',
        'filas_5109' => 'json',
        'filas_810' => 'json',
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
