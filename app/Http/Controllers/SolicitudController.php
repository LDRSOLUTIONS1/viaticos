<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Solicitudes\Solicitudes;
use App\Models\Vistas\VisSolicitudes;
use App\Models\Base\UsuariosAdmin;
use App\Models\Solicitudes\Cotizaciones;
use App\Http\Librerias\DataSQL;
use App\Models\Vistas\VisSumComprobantesSolicitud;
use Illuminate\Support\Facades\Mail;
class SolicitudController extends Controller
{
    protected $data;
    public function __construct()
    {
        $this->data = new DataSQL();
    }
    public function index($token, $id_user)
    {
        $id_user = base64_decode($id_user);
        if ($token === $this->token()) {
            $admin = UsuariosAdmin::where('id_persona', $id_user)->first();
            if ($admin) {
                $solicitudes = VisSolicitudes::all();
            } else {
                $solicitudes = VisSolicitudes::where("id_persona", $id_user)->get();
            }
            return view("solicitudes.index", compact("solicitudes", "id_user"));
        } else {
            $aviso = "Usted no tiene Acceso a este contenido";
            dd($aviso);
        }
    }

    public function nuevo(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required|integer',
            'id_motivo' => 'required|integer',
            'id_concepto' => 'required|integer',
            'solicitud_descripcion' => 'required|string|max:255',
            'solicitud_costo_estimado' => 'required|numeric',
        ]);

        try {
            $modelo = new Solicitudes();
            $nuevo = $modelo->nuevo(
                null,
                null,
                $validated['id_user'],
                $validated['id_motivo'],
                $validated['id_concepto'],
                $validated['solicitud_descripcion'],
                $validated['solicitud_costo_estimado'],
                null,
                null
            );

            // ENVÍO DEL CORREO (nueva parte añadida)
            if ($nuevo) {
                $this->enviarCorreo($nuevo);
            }

            return response()->json([
                'success' => (bool) $nuevo,
                'message' => $nuevo ? 'Se creó una nueva Solicitud de Viáticos' : 'No se pudo crear la solicitud'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function detalles($id_solicitud)
    {
        $solicitud = VisSolicitudes::where('id_solicitud', $id_solicitud)->first();
        $cotizaciones = Cotizaciones::where('id_solicitud', $id_solicitud)->get();
        $gasto_cotizado = $this->data->sum('cotizaciones', 'cotizacion_costo', "id_solicitud = $id_solicitud and id_estatus =1");
        $monto_depositado = $this->data->sum('depositos', 'deposito_monto', "id_solicitud = $id_solicitud");
        $gasto_real = VisSumComprobantesSolicitud::where("id_solicitud", $id_solicitud)->first();
        $clase = "";
        if ($gasto_cotizado > $solicitud->solicitud_costo_estimado) {
            $clase = "rojo";
        }
        return view('solicitudes.detalles', compact('solicitud', 'cotizaciones', 'gasto_cotizado', 'clase', 'monto_depositado', 'gasto_real'));
    }

    public function token()
    {
        $token = md5("ldrSolutions" . date('Ymd'));
        return $token;
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
            <title>Nueva Solicitud de Viáticos</title>
            <style>
                body { font-family: Arial, sans-serif; }
                .header { background-color: #f8f9fa; padding: 20px; }
                .content { padding: 20px; }
                .footer { background-color: #f8f9fa; padding: 10px; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class='header'>
                <h2>Nueva Solicitud de Viáticos</h2>
            </div>
            <div class='content'>
                <p>Se ha creado una nueva solicitud con los siguientes detalles:</p>
                <ul>
                    <li><strong>Usuario:</strong> ID $nuevo->id_persona</li>
                    <li><strong>Motivo:</strong> ID $nuevo->id_motivo</li>
                    <li><strong>Concepto:</strong> ID $nuevo->id_concepto</li>
                    <li><strong>Descripción:</strong> $nuevo->solicitud_descripcion</li>
                    <li><strong>Costo estimado:</strong> $nuevo->solicitud_costo_estimado</li>
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
                ->subject('Nueva Solicitud de Viáticos Creada')
                ->html($html);
        });
    }
}