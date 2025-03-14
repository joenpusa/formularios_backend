<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formato extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_formato',
        'nombre_formato',
        'habilitado',
    ];
}

