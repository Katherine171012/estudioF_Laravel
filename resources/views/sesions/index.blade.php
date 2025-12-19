@extends('layouts.app')

@section('titulo', 'Listado de Sesiones')

@section('contenido')

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Sesiones Fotográficas</h2>

        <a href="{{ route('sesions.create') }}" class="btn btn-success">
            + Nueva sesión
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
            <tr>
                <th>Tipo</th>
                <th>Cliente</th>
                <th>Teléfono</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th style="width: 160px;">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @forelse($sesiones as $sesion)
                <tr>
                    <td>{{ $sesion->tipo_sesion }}</td>
                    <td>{{ $sesion->nombre_cliente }}</td>
                    <td>{{ $sesion->telefono }}</td>
                    <td>{{ \Carbon\Carbon::parse($sesion->fecha_hora)->format('d/m/Y H:i') }}</td>
                    <td>{{ ucfirst($sesion->estado) }}</td>
                    <td>
                        <a href="{{ route('sesions.edit', $sesion) }}" class="btn btn-sm btn-warning">
                            Editar
                        </a>

                        <form action="{{ route('sesions.destroy', $sesion) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Deseas eliminar esta sesión?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        No existen sesiones registradas.
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

@endsection
