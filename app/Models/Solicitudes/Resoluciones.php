<?php
namespace App\Models\Solicitudes;
use Illuminate\Database\Eloquent\Model;
class Resoluciones extends Model
{
    protected $table = "resoluciones";
    protected $primaryKey = "id_resolucion";
    public $timestamps = false;
    public function nuevo($id_cotizacion, $id_persona, $id_estatus, $id_tipo, $resolucion_fecha, 
    $resolucion_motivo)
    {
        $nuevo = new Resoluciones();
        $nuevo->id_cotizacion = $id_cotizacion;
        $nuevo->id_persona = $id_persona;
        $nuevo->id_estatus = $id_estatus;
        $nuevo->id_tipo = $id_tipo;
        $nuevo->resolucion_fecha = $resolucion_fecha;
        $nuevo->save();
        return $nuevo;
    }
}