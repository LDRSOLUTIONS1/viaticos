<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitudes\Cotizaciones;
class CotizacionController extends Controller
{
    public function index($id_solicitud)
    {
        $vuelos = Cotizaciones::where('id_solicitud', $id_solicitud)->where('id_cotizacion_tipo', "9")->get();
        $otros = Cotizaciones::where('id_solicitud', $id_solicitud)->where('id_cotizacion_tipo', "<>", "9")->get();
        return view("solicitudes.cotizaciones", compact("vuelos", "otros"));
    }
    public function nuevo(Request $request)
    {
        $validated = $request->validate([
            'id_solicitud' => 'required|integer',
            'id_cotizacion_tipo' => 'required|integer',
            'cotizacion_costo' => 'required|numeric',
            'cotizacion_destino' => 'required|string|max:90',
            'id_aerolinea' => 'required|integer',
            'cotizacion_clave_reservacion' => 'required|string|max:50',
            'cotizacion_ruta' => 'required|string|max:50',
            'cotizacion_fecha_compra' => 'required|date_format:Y-m-d',
            'cotizacion_fecha_inicio' => 'required|date',
            'cotizacion_hora_inicio' => 'required|date_format:H:m:s',
            'cotizacion_fecha_fin' => 'required|date',
            'cotizacion_hora_fin' => 'required|date_format:H:m:s',
        ]);

        try {
            $modelo = new Cotizaciones();
            $nuevo = $modelo->nuevo(
                $validated['id_solicitud'],
                $validated['id_cotizacion_tipo'],
                $validated['id_aerolinea'],
                $validated['cotizacion_clave_reservacion'],
                $validated['cotizacion_ruta'],
                $validated['cotizacion_fecha_compra'],
                $validated['cotizacion_fecha_inicio'],
                $validated['cotizacion_hora_inicio'],
                $validated['cotizacion_fecha_fin'],
                $validated['cotizacion_hora_fin'],
                $validated['cotizacion_costo'],
                null,
                null,
                null,
                $validated['cotizacion_destino']
            );

            return response()->json([
                'success' => (bool) $nuevo,
                'message' => $nuevo ? 'Se creó una nueva Cotización de Viáticos' : 'No se pudo crear la cotización'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}