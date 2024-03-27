<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GraficoPreguntaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Pregunta 1: Ventas por territorio
Route::get('/ventas-por-territorio', [GraficoPreguntaController::class, 'showVentasPorTerritorio'])->name('ventas.por.territorio');

// Pregunta 2: Ventar por retailer --> empleado
Route::get('/ventas-por-empleado', [GraficoPreguntaController::class, 'showVentasPorEmpleado'])->name('ventas.por.empleado');

// Pregunta 3: Ventas por tiempo
Route::get('/ventas-por-tiempo', [GraficoPreguntaController::class, 'showVentasTotalesPorTiempo'])->name('ventas.por.tiempo');

// Pregunta 4: Ventas por producto
Route::get('/ventas-por-producto', [GraficoPreguntaController::class, 'showVentasPorProducto'])->name('ventas.por.producto');


