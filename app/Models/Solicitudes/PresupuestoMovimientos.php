<?php
namespace App\Models\Solicitudes;
use Illuminate\Database\Eloquent\Model;
class PresupuestoMovimientos extends Model
{
    protected $table = "presupuesto_movimientos";
    protected $primaryKey = "id_movimiento";
    public $timestamps = false;
    public function nuevo($id_presupuesto, $id_moviemiento_tipo, $id_solicitud, $movimiento_monto, 
    $movimiento_fecha, $movimiento_motivo_exceso, $id_persona)
    {
        $nuevo = new PresupuestoMovimientos();
        $nuevo->id_presupuesto = $id_presupuesto;
        $nuevo->id_moviemiento_tipo = $id_moviemiento_tipo;
        $nuevo->id_solicitud = $id_solicitud;
        $nuevo->movimiento_monto = $movimiento_monto;
        $nuevo->movimiento_fecha = $movimiento_fecha;
        $nuevo->movimiento_motivo_exceso = $movimiento_motivo_exceso;
        $nuevo->id_persona = $id_persona;
        $nuevo->save();
        return $nuevo;
    }
}