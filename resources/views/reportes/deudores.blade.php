<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Deudores</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Reporte de Deudores</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Deuda Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deudores as $deudor)
                <tr>
                    <td>{{ $deudor->id }}</td>
                    <td>{{ $deudor->name }}</td>
                    <td>{{ $deudor->email }}</td>
                    <td>{{ $deudor->mensualidades()->where('pagado', false)->sum('monto') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
