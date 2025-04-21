<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Solicitudes;
class SolicitudController extends Controller
{
    public function index($token)
    {
        if ($token == 1) {
            $solicitudes = Solicitudes::all();
            return response()->json(["mensaje" => "Correcto", "resultado" => $solicitudes]);
        } else {
            return response()->json(["mensaje" => "acceso denegado", "resultado" => null]);
        }
    }

    public function nuevo(Request $request)
    {
        if ($request->isMethod('post')) {
            $modelo=new Solicitudes();
            $modelo->nuevo($request->folio, $request->nuevo_id);
        }
    }
}