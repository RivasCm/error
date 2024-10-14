<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensualidad;  // Asumiendo que tienes un modelo Mensualidad
use App\Models\User;  // Asumiendo que los usuarios están conectados a los pagos

class ReporteController extends Controller
{
    // Muestra el reporte de deudores
    public function index()
    {
        // Obtener todos los usuarios que tienen mensualidades pendientes
        $deudores = User::whereHas('mensualidades', function ($query) {
            $query->where('pagado', false);  // 'pagado' es un campo que indica si la mensualidad está pagada o no
        })->get();

        // Retorna una vista con los usuarios deudores
        return view('reportes.deudores', compact('deudores'));
    }
    public function deudores()
    {
        // Obtener los deudores
        $deudores = User::whereHas('mensualidades', function ($query) {
            $query->where('pagado', false);
        })->get();

        // Generar PDF
        $pdf = PDF::loadView('reportes.deudores', compact('deudores'));

        return $pdf->download('deudores.pdf'); // Descarga el archivo PDF
    }
}
