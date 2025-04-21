<?php
namespace App\Models\Base;
use Illuminate\Database\Eloquent\Model;
class ResolucionTipos extends Model
{
    protected $table = "resolucion_tipos";
    protected $primaryKey = "id_tipo";
    public $timestamps = false;
    public function nuevo($resolucion_nombre)
    {
        $nuevo = new ResolucionTipos();
        $nuevo->resolucion_nombre = $resolucion_nombre;
        $nuevo->save();
        return $nuevo;
    }
}