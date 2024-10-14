@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Solicitar Licencia</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('licencias.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="motivo">Motivo de la Licencia</label>
            <input type="text" name="motivo" id="motivo" class="form-control" value="{{ old('motivo') }}" required>
            @error('motivo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="fecha_inicio">Fecha de Inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ old('fecha_inicio') }}" required>
            @error('fecha_inicio')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="fecha_fin">Fecha de Fin</label>
            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ old('fecha_fin') }}" required>
            @error('fecha_fin')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Solicitar Licencia</button>
    </form>
</div>
@endsection
