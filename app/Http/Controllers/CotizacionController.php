<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitudes\Cotizaciones;
use App\Models\Vistas\VisCotizaciones;
class CotizacionController extends Controller
{
    public function index($id_solicitud)
    {
        $vuelos = VisCotizaciones::where('id_solicitud', $id_solicitud)->where('id_cotizacion_tipo', "9")->get();
        $otros = VisCotizaciones::where('id_solicitud', $id_solicitud)->where('id_cotizacion_tipo', "<>", "9")->get();
        return view("solicitudes.cotizaciones", compact("vuelos", "otros","id_solicitud"));
    }
    public function nuevo(Request $request)
    {

        if ($request->id_cotizacion_tipo == 9) {
            $nuevo = $this->vuelo($request);
        } else {
            $nuevo = $this->otros($request);
        }
        return response()->json([
            'success' => (bool) $nuevo,
            'message' => $nuevo ? 'Se creó una nueva Cotización de Viáticos' : 'No se pudo crear la cotización'
        ]);


    }

    public function vuelo($request)
    {
        try {
            $validated = $request->validate([
                'id_solicitud' => 'required|integer',
                'id_cotizacion_tipo' => 'required|integer',
                'cotizacion_costo' => 'required|numeric',
                'cotizacion_destino' => 'required|string|max:90',
                'id_aerolinea' => 'required|integer',
                'cotizacion_clave_reservacion' => 'required|string|max:50',
                'cotizacion_ruta' => 'required|string|max:50',
            ]);

            $modelo = new Cotizaciones();
            $nuevo = $modelo->nuevo(
                $validated['id_solicitud'],
                $validated['id_cotizacion_tipo'],
                $validated['id_aerolinea'],
                $validated['cotizacion_clave_reservacion'],
                $validated['cotizacion_ruta'],
                $request->cotizacion_fecha_compra,
                $request->cotizacion_fecha_inicio,
                $request->cotizacion_hora_inicio,
                $request->cotizacion_fecha_fin,
                $request->cotizacion_hora_fin,
                $validated['cotizacion_costo'],
                null,
                null,
                null,
                $validated['cotizacion_destino']
            );
            return $nuevo;
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
    public function otros($request)
    {
        try {
            $validated = $request->validate([
                'id_solicitud' => 'required|integer',
                'id_cotizacion_tipo' => 'required|integer',
                'cotizacion_costo' => 'required|numeric',
                'cotizacion_destino' => 'required|string|max:90'
            ]);

            $modelo = new Cotizaciones();
            $nuevo = $modelo->nuevo(
                $validated['id_solicitud'],
                $validated['id_cotizacion_tipo'],
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                $validated['cotizacion_costo'],
                null,
                null,
                null,
                null
            );
            return $nuevo;
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}