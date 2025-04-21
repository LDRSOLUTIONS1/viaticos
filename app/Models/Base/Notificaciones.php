<?php
namespace App\Models\Base;
use Illuminate\Database\Eloquent\Model;
class Notificaciones extends Model
{
    protected $table = "notificaciones";
    protected $primaryKey = "id_notificacion";
    public $timestamps = false;
    public function nuevo($id_cotizacion,$id_comprobante,$id_deposito,$id_estatus,$id_persona,$id_presupuesto,
    $notificacion_enviada,$notificacion_detalles)
    {
        $nuevo = new Notificaciones();
        $nuevo->id_cotizacion = $id_cotizacion;
        $nuevo->id_comprobante = $id_comprobante;
        $nuevo->id_deposito = $id_deposito;
        $nuevo->id_estatus = $id_estatus;
        $nuevo->id_persona = $id_persona;
        $nuevo->id_presupuesto = $id_presupuesto;
        $nuevo->notificacion_enviada = $notificacion_enviada;
        $nuevo->notificacion_detalles = $notificacion_detalles;
        $nuevo->save();
        return $nuevo;
    }
}