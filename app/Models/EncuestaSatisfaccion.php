<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncuestaSatisfaccion extends Model {
    use HasFactory;

    protected $table = 'encuesta_satisfaccion';

    protected $fillable = [
        'municipio_id',
        'institucion_id',
        'sede_id',
        'complemento',
        'satisfaccion_complemento',
        'estado_complemento',
        'tiempo_complemento',
        'necesidades_complemento',
        'calidad_productos',
        'atencion_personal',
    ];

    // Definir relaciones
    public function municipio() {
        return $this->belongsTo(Municipio::class);
    }

    public function institucion() {
        return $this->belongsTo(Institucion::class);
    }

    public function sede() {
        return $this->belongsTo(Sede::class);
    }
}
