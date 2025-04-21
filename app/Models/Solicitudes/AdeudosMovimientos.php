<?php
namespace App\Models\Solicitudes;
use Illuminate\Database\Eloquent\Model;
class AdeudosMovimientos extends Model
{
    protected $table = "adeudos_movimientos";
    protected $primaryKey = "id_movimiento";
    public $timestamps = false;
    public function nuevo($id_moviemiento_tipo, $id_adeudo, $movimiento_monto, $movimiento_fecha, $id_estatus)
    {
        $nuevo = new AdeudosMovimientos();
        $nuevo->id_moviemiento_tipo = $id_moviemiento_tipo;
        $nuevo->id_adeudo = $id_adeudo;
        $nuevo->movimiento_monto = $movimiento_monto;
        $nuevo->movimiento_fecha = $movimiento_fecha;
        $nuevo->id_estatus = $id_estatus;
        $nuevo->save();
        return $nuevo;
    }
}