<?php
namespace App\Http\Controllers\Base;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Base\Motivos;
class MotivosController extends Controller{
    public function index(Request $request){
    }
    public function select(){
        $motivos = Motivos::all();
        return view("base.select_motivos",compact("motivos"));
    }
}