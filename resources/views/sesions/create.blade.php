@extends('layouts.app')

@section('titulo', 'Nueva Sesión')

@section('contenido')

    <h2 class="mb-4">Registrar Nueva Sesión</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sesions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Tipo de sesión *</label>
            <select name="tipo_sesion" class="form-select" required>
                <option value="">Seleccione...</option>
                <option value="Boda">Boda</option>
                <option value="Quinceañera">Quinceañera</option>
                <option value="Bebé">Bebé</option>
                <option value="Otro">Otro</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre del cliente *</label>
            <input type="text" name="nombre_cliente" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono *</label>
            <input type="text" name="telefono" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Ubicación *</label>
            <input type="text" name="ubicacion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha y hora *</label>
            <input type="datetime-local" name="fecha_hora" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Estado</label>
            <select name="estado" class="form-select">
                <option value="agendada">Agendada</option>
                <option value="realizada">Realizada</option>
                <option value="entregada">Fotos entregadas</option>
                <option value="cancelada">Cancelada</option>
            </select>
        </div>

        <a href="{{ route('sesions.index') }}" class="btn btn-secondary">
            Cancelar
        </a>

        <button type="submit" class="btn btn-primary">
            Guardar
        </button>

    </form>

@endsection
