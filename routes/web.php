<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\Base\ConceptosController;
use App\Http\Controllers\Base\MotivosController;
use App\Http\Controllers\Base\CotizacionTiposController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\Base\AerolineasController;
use App\Http\Controllers\ComprobanteGastoController;
use App\Http\Controllers\DepositosController;
use App\Http\Controllers\Base\CuentasBancariasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/solicitudes/{token}/{id_user}', [SolicitudController::class, 'index']);
Route::get('/solicitud-detalles', function () {
    return view('solicitudes.detalles');
});
Route::get('/depositos', function () {
    return view('solicitudes.depositos');
});
Route::get('/gastos', function () {
    return view('solicitudes.gastos');
});
Route::post('/nueva-solicitud', [SolicitudController::class, 'nuevo']);
Route::get('/select-conceptos', [ConceptosController::class, 'select']);
Route::get('/select-motivos', [MotivosController::class, 'select']);
Route::get('/solicitud-detalles/{id_solicitud}', [SolicitudController::class, 'detalles']);
Route::get('/select-cotizacion-tipos', [CotizacionTiposController::class, 'select']);
Route::get('/cotizaciones/{id_solicitud}', [CotizacionController::class, 'index']);
Route::get('/select-aerolineas', [AerolineasController::class, 'select']);
Route::post('/nueva-cotizacion', [CotizacionController::class, 'nuevo']);
Route::post('/nuevo-comprobante', [ComprobanteGastoController::class, 'nuevo']);
Route::get('/ver-comprobantes/{id_cotizacion}', [ComprobanteGastoController::class, 'index']);
Route::get('/ver-depositos/{id_solicitud}', [DepositosController::class, 'index']);
Route::get('/select-cuentas', [CuentasBancariasController::class, 'select']);
Route::post('/nuevo-deposito', [DepositosController::class, 'nuevo']);
Route::get('/cotizacion-detalles/{id_cotizacion}', [CotizacionController::class, 'detalles']);
