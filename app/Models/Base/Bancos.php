<?php
namespace App\Models\Base;
use Illuminate\Database\Eloquent\Model;
class Bancos extends Model
{
    protected $table = "bancos";
    protected $primaryKey = "id_banco";
    public $timestamps = false;
    public function nuevo($banco_nombre)
    {
        $nuevo = new Bancos();
        $nuevo->banco_nombre = $banco_nombre;
        $nuevo->save();
        return $nuevo;
    }
}