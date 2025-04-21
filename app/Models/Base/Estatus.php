<?php
namespace App\Models\Base;
use Illuminate\Database\Eloquent\Model;
class Estatus extends Model
{
    protected $table = "estatus";
    protected $primaryKey = "id_estatus";
    public $timestamps = false;
    public function nuevo($estatus_nombre)
    {
        $nuevo = new Estatus();
        $nuevo->estatus_nombre = $estatus_nombre;
        $nuevo->save();
        return $nuevo;
    }
}