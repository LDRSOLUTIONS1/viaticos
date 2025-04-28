<?php
namespace App\Http\Controllers\Base;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Base\CuentasBancarias;
class CuentasBancariasController extends Controller
{
    public function index(Request $request)
    {
    }
    public function nuevo(Request $request)
    {
    }
    public function select()
    {
        $cuentas = CuentasBancarias::all();
        return view("base.select_cuentas", compact("cuentas"));
    }
}