@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reporte de Deudores</h1>

        @if ($deudores->isEmpty())
            <p>No hay deudores en este momento.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Meses Pendientes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deudores as $deudor)
                        <tr>
                            <td>{{ $deudor->name }}</td>
                            <td>{{ $deudor->email }}</td>
                            <td>{{ $deudor->telefono }}</td> <!-- Asumiendo que tienes un campo 'telefono' -->
                            <td>{{ $deudor->mensualidades->where('pagado', false)->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
