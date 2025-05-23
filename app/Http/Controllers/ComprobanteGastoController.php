<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitudes\ComprobantesGastos;
use App\Models\Base\Archivos;
use App\Models\Solicitudes\Cotizaciones;
use App\Http\Librerias\DataSQL;
use App\Models\Vistas\VisArchivosComprobantes;
use App\Models\Vistas\VisCotizaciones;
use Illuminate\Support\Facades\Mail;
class ComprobanteGastoController extends Controller
{
    protected $data;
    public function __construct()
    {
        $this->data = new DataSQL();
    }
    public function index($id_cotizacion)
    {
        $cotizacion = VisCotizaciones::where('id_cotizacion', $id_cotizacion)->get()->first();
        $comprobantes = VisArchivosComprobantes::where("id_cotizacion", $id_cotizacion)->get();
        $suma_gastos = $this->data->sum("comprobantes_gastos", "comprobante_gasto_monto", "id_cotizacion = $id_cotizacion");
        return view('solicitudes.comprobantes_gastos', compact('cotizacion', 'comprobantes', 'suma_gastos'));
    }
    public function nuevo(Request $request)
    {
        try {
            $archivo = $request->file('archivo');
            $modelo = new ComprobantesGastos();
            if ($request->comprobante_gasto_factura) {
                $comprobante_gasto_factura = true;
            }
            $nuevo = $modelo->nuevo(
                $request->id_cotizacion,
                null,
                $request->comprobante_gasto_monto_deducible,
                $request->comprobante_gasto_monto,
                $comprobante_gasto_factura,
                $request->comprobante_gasto_observaciones
            );
            if ($archivo) {
                $modelo_archivo = new Archivos();
                $nombre_archivo = $archivo->getClientOriginalName();
                $ruta = 'recursos/comprobantes/' . $nuevo->id_cotizacion;
                $ruta_base = 'recursos/comprobantes/' . $nuevo->id_cotizacion . '/' . $nombre_archivo;
                $nuevo_archivo = $modelo_archivo->nuevo(
                    $nombre_archivo,
                    $ruta_base,
                    null,
                    $nuevo->id_comprobante,
                    null
                );
                $archivo->move($ruta, $nombre_archivo);
            }
            if ($nuevo) {
                $this->enviarCorreo($nuevo);
            }
            return response()->json([
                'success' => (bool) $nuevo,
                'message' => $nuevo ? 'Se subió un nuevo Comprobante de Gasto' : 'No se pudo subir el comprobante'
            ]);

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
            <title>Nuevo Comprobante de gastos</title>
            <style>
                body { font-family: Arial, sans-serif; }
                .header { background-color: #f8f9fa; padding: 20px; }
                .content { padding: 20px; }
                .footer { background-color: #f8f9fa; padding: 10px; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class='header'>
                <h2>Nuevo Comprobante de Gastos</h2>
            </div>
            <div class='content'>
                <p>Se ha creado un nuevo comprobante de gastos con los siguientes detalles:</p>
                <ul>
                    <li><strong>Folio Cotización:</strong> ID $nuevo->id_cotizacion</li>
                    <li><strong>Observaciones:</strong> $nuevo->comprobante_gasto_observaciones</li>
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
                ->subject('Nuevo Comprobante de Gastos Creado')
                ->html($html);
        });
    }
}