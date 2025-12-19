<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use Illuminate\Http\Request;

class SesionController extends Controller
{

    public function index()
    {
        $sesiones = Sesion::listarSesiones();
        return view('sesions.index', compact('sesiones'));
    }


    public function create()
    {
        return view('sesions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_sesion'    => 'required|string|max:50',
            'nombre_cliente' => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:100',
            'telefono'       => 'required|numeric|digits_between:7,10',
            'ubicacion'      => 'required|string|max:150',
            'fecha_hora'     => 'required|date',
            'estado'         => 'required|string'
        ]);

        Sesion::crearSesion($request->all());

        return redirect()->route('sesions.index')
            ->with('success', 'Sesión registrada correctamente.');
    }

    public function edit(Sesion $sesion)
    {
        return view('sesions.edit', compact('sesion'));
    }

    public function update(Request $request, Sesion $sesion)
    {
        $request->validate([
            'tipo_sesion'    => 'required|string|max:50',
            'nombre_cliente' => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/|max:100',
            'telefono'       => 'required|numeric|digits_between:7,10',
            'ubicacion'      => 'required|string|max:150',
            'fecha_hora'     => 'required|date',
            'estado'         => 'required|string'
        ]);

        $sesion->actualizarSesion($request->all());

        return redirect()->route('sesions.index')
            ->with('success', 'Sesión actualizada correctamente.');
    }

    public function destroy(Sesion $sesion)
    {

        $sesion->eliminarSesion();

        return redirect()->route('sesions.index')
            ->with('success', 'Sesión eliminada correctamente.');
    }
}
