<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Licencia;

class LicenciaController extends Controller
{
    // Mostrar el formulario para solicitar una licencia
    public function create()
    {
        return view('licencias.create');
    }

    // Guardar la solicitud de licencia en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'motivo' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        Licencia::create([
            'padre_id' => auth()->user()->id, // Padre autenticado
            'fecha_solicitud' => now(),
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'motivo' => $request->motivo,
            'estado' => 'pendiente',
        ]);

        return redirect()->route('licencias.solicitar')->with('success', 'Licencia solicitada con éxito');
    }
}

