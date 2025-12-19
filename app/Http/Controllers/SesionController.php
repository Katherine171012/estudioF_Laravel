<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use Illuminate\Http\Request;

class SesionController extends Controller
{
    public function index()
    {
        $sesiones = Sesion::all();
        return view('sesions.index', compact('sesiones'));
    }

    public function create()
    {
        return view('sesions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_sesion'     => 'required',
            'nombre_cliente'  => 'required',
            'telefono'        => 'required',
            'ubicacion'       => 'required',
            'fecha_hora'      => 'required'
        ]);

        Sesion::create($request->all());

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
            'tipo_sesion'     => 'required',
            'nombre_cliente'  => 'required',
            'telefono'        => 'required',
            'ubicacion'       => 'required',
            'fecha_hora'      => 'required'
        ]);

        $sesion->update($request->all());

        return redirect()->route('sesions.index')
            ->with('success', 'Sesión actualizada correctamente.');
    }

    public function destroy(Sesion $sesion)
    {
        $sesion->delete();

        return redirect()->route('sesions.index')
            ->with('success', 'Sesión eliminada correctamente.');
    }
}
