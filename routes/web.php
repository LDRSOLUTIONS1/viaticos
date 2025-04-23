<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\Base\ConceptosController;
use App\Http\Controllers\Base\MotivosController;

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
