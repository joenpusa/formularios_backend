<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialVerificacion extends Model
{
    protected $table = 'social_verificaciones';

    protected $fillable = [
        'etc',
        'fecha_visita',
        'municipio',
        'institucion',
        'operador',
        'contrato',
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
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    protected $casts = [
        'files' => 'array',
    ];
}
