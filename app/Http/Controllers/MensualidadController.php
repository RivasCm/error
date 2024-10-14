<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensualidad;

class MensualidadController extends Controller
{
    // Mostrar el formulario para pagar la mensualidad
    public function create()
    {
        return view('mensualidades.create');
    }

    // Guardar el pago en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'monto' => 'required|numeric|min:0',
        ]);

        Mensualidad::create([
            'estudiante_id' => $request->estudiante_id,
            'monto' => $request->monto,
            'estado' => 'pagado',
            'fecha_pago' => now(),
        ]);

        return redirect()->route('mensualidades.pagar')->with('success', 'Pago registrado con éxito');
    }
}
