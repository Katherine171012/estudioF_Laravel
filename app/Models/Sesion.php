<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    protected $table = 'sesions';

    protected $fillable = [
        'tipo_sesion',
        'nombre_cliente',
        'telefono',
        'ubicacion',
        'fecha_hora',
        'estado'
    ];
}
