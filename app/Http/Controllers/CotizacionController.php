<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitudes\Cotizaciones;
use App\Models\Vistas\VisCotizaciones;
use Illuminate\Support\Facades\Mail;
class CotizacionController extends Controller
{
    public function index($id_solicitud)
    {
        $vuelos = VisCotizaciones::where('id_solicitud', $id_solicitud)->where('id_cotizacion_tipo', "9")->get();
        $otros = VisCotizaciones::where('id_solicitud', $id_solicitud)->where('id_cotizacion_tipo', "<>", "9")->get();
        return view("solicitudes.cotizaciones", compact("vuelos", "otros", "id_solicitud"));
    }
    public function detalles($id_cotizacion)
    {
        $cotizacion = Cotizaciones::find($id_cotizacion);
        return view("solicitudes.cotizacion_detalles", compact("cotizacion"));
    }
    public function nuevo(Request $request)
    {

        if ($request->id_cotizacion_tipo == 9) {
            $nuevo = $this->vuelo($request);
        } else {
            $nuevo = $this->otros($request);
        }
        if ($nuevo) {
            $this->enviarCorreo($nuevo);
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
                'cotizacion_ruta' => 'required|string|max:50',
            ]);

            $modelo = new Cotizaciones();
            $nuevo = $modelo->nuevo(
                $validated['id_solicitud'],
                $validated['id_cotizacion_tipo'],
                $validated['id_aerolinea'],
                $request->cotizacion_clave_reservacion,
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
                'cotizacion_costo' => 'required|numeric'
            ]);

            $modelo = new Cotizaciones();
            $nuevo = $modelo->nuevo(
                $validated['id_solicitud'],
                $validated['id_cotizacion_tipo'],
                null,
                null,
                null,
                null,
                $request->cotizacion_fecha_otros,
                null,
                null,
                null,
                $validated['cotizacion_costo'],
                null,
                null,
                null,
                $request->cotizacion_destino
            );
            return $nuevo;
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function enviarCorreo($nuevo)
    {
        $destinatarios = [
            'ivan.villa@ldrsolutions.com.mx'
            // 'contabilidad@empresa.com',
        ];

        $html = "
        <html>
        <head>
            <title>Nueva Cotización de Viáticos</title>
            <style>
                body { font-family: Arial, sans-serif; }
                .header { background-color: #f8f9fa; padding: 20px; }
                .content { padding: 20px; }
                .footer { background-color: #f8f9fa; padding: 10px; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class='header'>
                <h2>Nueva Cotización de Viáticos</h2>
            </div>
            <div class='content'>
                <p>Se ha creado una nueva cotización con los siguientes detalles:</p>
                <ul>
                    <li><strong>Folio Solicitud:</strong> ID $nuevo->id_solicitud</li>
                    <li><strong>Tipo:</strong> ID $nuevo->id_cotizacion_tipo</li>
                    <li><strong>Costo:</strong> $ $nuevo->cotizacion_costo</li>
                </ul>
            </div>
            <div class='footer'>
                Este es un mensaje automático, por favor no responder.
            </div>
        </body>
        </html>
    ";

        Mail::send([], [], function ($message) use ($html, $destinatarios) {
            $message->to($destinatarios)
                ->subject('Nueva Cotización de Viáticos Creada')
                ->html($html);
        });
    }
}