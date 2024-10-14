@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pagar Mensualidad</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('mensualidades.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="estudiante_id">Estudiante</label>
            <input type="text" name="estudiante_id" id="estudiante_id" class="form-control" value="{{ old('estudiante_id') }}" required>
            @error('estudiante_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="monto">Monto a Pagar (Bs.)</label>
            <input type="number" name="monto" id="monto" class="form-control" value="{{ old('monto') }}" required>
            @error('monto')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Registrar Pago</button>
    </form>
</div>
@endsection
