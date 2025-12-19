@extends('layouts.app')

@section('titulo', 'Editar Sesión')

@section('contenido')

    <h2 class="mb-4">Editar Sesión</h2>

    <form action="{{ route('sesions.update', $sesion) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tipo de sesión *</label>
            <select name="tipo_sesion" class="form-select" required>
                <option value="Boda" {{ $sesion->tipo_sesion == 'Boda' ? 'selected' : '' }}>Boda</option>
                <option value="Quinceañera" {{ $sesion->tipo_sesion == 'Quinceañera' ? 'selected' : '' }}>Quinceañera</option>
                <option value="Bebé" {{ $sesion->tipo_sesion == 'Bebé' ? 'selected' : '' }}>Bebé</option>
                <option value="Otro" {{ $sesion->tipo_sesion == 'Otro' ? 'selected' : '' }}>Otro</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre del cliente *</label>
            <input type="text" name="nombre_cliente" class="form-control"
                   value="{{ $sesion->nombre_cliente }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono *</label>
            <input type="text" name="telefono" class="form-control"
                   value="{{ $sesion->telefono }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Ubicación *</label>
            <input type="text" name="ubicacion" class="form-control"
                   value="{{ $sesion->ubicacion }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha y hora *</label>
            <input type="datetime-local" name="fecha_hora" class="form-control"
                   value="{{ \Carbon\Carbon::parse($sesion->fecha_hora)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Estado</label>
            <select name="estado" class="form-select">
                <option value="agendada" {{ $sesion->estado == 'agendada' ? 'selected' : '' }}>Agendada</option>
                <option value="realizada" {{ $sesion->estado == 'realizada' ? 'selected' : '' }}>Realizada</option>
                <option value="entregada" {{ $sesion->estado == 'entregada' ? 'selected' : '' }}>Fotos entregadas</option>
                <option value="cancelada" {{ $sesion->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>

        <a href="{{ route('sesions.index') }}" class="btn btn-secondary">
            Cancelar
        </a>

        <button type="submit" class="btn btn-primary">
            Actualizar
        </button>

    </form>

@endsection
