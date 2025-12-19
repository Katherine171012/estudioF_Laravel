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


    public static function crearSesion(array $data)
    {
        return self::create($data);
    }


    public function actualizarSesion(array $data)
    {
        return $this->update($data);
    }


    public function eliminarSesion()
    {
        return $this->delete();
    }

    public static function listarSesiones()
    {
        return self::all();
    }

}
