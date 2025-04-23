<?php
namespace App\Http\Controllers\Base;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Base\Aerolineas;
use Symfony\Component\Routing\DependencyInjection\AddExpressionLanguageProvidersPass;
class AerolineasController extends Controller
{
    public function index(Request $request)
    {

    }
    public function nuevo(Request $request)
    {

    }
    public function select()
    {
        $aerolineas = Aerolineas::all();
        return view("base.select_aerolineas", compact("aerolineas"));
    }
}