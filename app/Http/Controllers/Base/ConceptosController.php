<?php
namespace App\Http\Controllers\Base;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Base\Conceptos;
class ConceptosController extends Controller
{
    public function index(Request $request)
    {
    }
    public function select()
    {
        $conceptos = Conceptos::all();
        return view("base.select_conceptos", compact("conceptos"));
    }
}