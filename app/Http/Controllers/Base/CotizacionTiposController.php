<?php
namespace App\Http\Controllers\Base;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Base\CotizacionTipos;
class CotizacionTiposController extends Controller
{
    public function index(Request $request)
    {

    }
    public function nuevo(Request $request)
    {

    }
    public function select()
    {
        $tipos = CotizacionTipos::all();
        return view("base.select_cotizacion_tipos", compact("tipos"));
    }
}