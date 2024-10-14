@extends('layouts.app') <!-- Esto asume que estás usando una plantilla base llamada app.blade.php -->

@section('content')
<div class="container">
    <h2>Asignar Rol a {{ $user->name }}</h2>
    <form action="{{ route('usuarios.asignar-rol', ['id' => $user->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="role">Seleccionar Rol:</label>
            <select name="role" id="role" class="form-control">
                <option value="padre_familia">Padre de Familia</option>
                <option value="secretaria">Secretaria</option>
                <option value="director">Director</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Asignar Rol</button>
    </form>
</div>
@endsection
