<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\LicenciaController;
use App\Http\Controllers\MensualidadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ReporteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Aquí puedes registrar las rutas web para tu aplicación. Estas rutas
| son cargadas por el RouteServiceProvider y contienen el grupo "web" middleware.
*/

// Ruta para la página de inicio
Route::get('/', [HomeController::class, 'index'])->name('home');

// Ruta para la página de historia
Route::get('/historia', [HistoriaController::class, 'index'])->name('historia');

// Autenticación
Auth::routes();

// Rutas después de iniciar sesión
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas para Licencias
Route::group(['middleware' => ['auth']], function () {
    Route::get('/licencias/solicitar', [LicenciaController::class, 'create'])->name('licencias.solicitar');
    Route::post('/licencias/solicitar', [LicenciaController::class, 'store'])->name('licencias.store');
});

// Rutas para Pagos de Mensualidades
Route::group(['middleware' => ['auth']], function () {
    Route::get('/mensualidades/pagar', [MensualidadController::class, 'create'])->name('mensualidades.pagar');
    Route::post('/mensualidades/pagar', [MensualidadController::class, 'store'])->name('mensualidades.store');
});

// Ruta para asignar roles a un usuario (solo para administradores)
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/usuarios/{id}/asignar-rol', [UserController::class, 'showAssignRoleForm'])->name('usuarios.mostrar-asignar-rol');
});

// Rutas para padres de familia
Route::group(['middleware' => ['auth', 'role:padre_familia']], function () {
    Route::get('/licencias', [LicenciaController::class, 'index'])->name('licencias.index');
    Route::post('/licencias', [LicenciaController::class, 'store'])->name('licencias.store');
    
    Route::get('/pagos', [PagoController::class, 'index'])->name('pagos.index');
    Route::post('/pagos', [PagoController::class, 'store'])->name('pagos.store');
});

// Rutas para secretarias y directores
Route::group(['middleware' => ['auth', 'role:secretaria|director']], function () {
    Route::get('/aprobar-licencias', [LicenciaController::class, 'aprobar'])->name('licencias.aprobar');
    Route::get('/aprobar-pagos', [PagoController::class, 'aprobar'])->name('pagos.aprobar');
    
    Route::get('/reporte-deudores', [ReporteController::class, 'index'])->name('reportes.deudores');
});

// Rutas para secretarias y directores
Route::group(['middleware' => ['auth', 'role:secretaria|director']], function () {
    Route::get('/reporte-deudores', [ReporteController::class, 'index'])->name('reportes.deudores');
});

Route::group(['middleware' => ['auth', 'role:secretaria|director']], function () {
    Route::get('/reporte-deudores', [ReporteController::class, 'deudores'])->name('reportes.deudores');
});


