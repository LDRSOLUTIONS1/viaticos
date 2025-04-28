<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solicitudes\Depositos;
use App\Models\Base\Archivos;
use App\Models\Vistas\VisArchivosDepositos;
use App\Http\Librerias\DataSQL;
class DepositosController extends Controller
{
    protected $data;
    public function __construct()
    {
        $this->data = new DataSQL();
    }
    public function index($id_solicitud)
    {
        $depositos = VisArchivosDepositos::where('id_solicitud', $id_solicitud)->get();
        $suma_depositos = $this->data->sum("depositos", "deposito_monto", "id_solicitud = $id_solicitud");
        return view('solicitudes.depositos', compact('depositos', 'id_solicitud','suma_depositos'));
    }
    public function nuevo(Request $request)
    {
        try {
            $archivo = $request->file('archivo');
            $modelo = new Depositos();
            $nuevo = $modelo->nuevo(
                $request->id_solicitud,
                $request->id_cuenta,
                $request->id_tipo,
                $request->deposito_fecha,
                $request->deposito_monto,
                $request->deposito_comentario
            );
            if ($archivo) {
                $modelo_archivo = new Archivos();
                $nombre_archivo = $archivo->getClientOriginalName();
                $ruta = 'recursos/depositos/' . $request->id_solicitud;
                $ruta_base = 'recursos/depositos/' . $request->id_solicitud . '/' . $nombre_archivo;
                $nuevo_archivo = $modelo_archivo->nuevo(
                    $nombre_archivo,
                    $ruta_base,
                    null,
                    null,
                    $nuevo->id_deposito
                );
                $archivo->move($ruta, $nombre_archivo);
            }

            return response()->json([
                'success' => (bool) $nuevo,
                'message' => $nuevo ? 'Se creó un nuevo Depósito' : 'No se pudo crear el depósito'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}