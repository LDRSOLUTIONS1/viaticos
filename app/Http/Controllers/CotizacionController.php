<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitudes\Cotizaciones;
class CotizacionController extends Controller
{
    public function index($id_solicitud)
    {
        $vuelos = Cotizaciones::where('id_solicitud', $id_solicitud)->where('id_cotizacion_tipo', "1")->get();
        $otros = Cotizaciones::where('id_solicitud', $id_solicitud)->where('id_cotizacion_tipo', "<>", "1")->get();
        return view("solicitudes.cotizaciones", compact("vuelos", "otros"));
    }
}