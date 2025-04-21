<?php
namespace App\Models\Solicitudes;
use Illuminate\Database\Eloquent\Model;
class Adeudos extends Model
{
    protected $table = "adeudos";
    protected $primaryKey = "id_adeudo";
    public $timestamps = false;
    public function nuevo($id_persona, $id_estatus, $id_area, $id_resolucion, $adeudo_monto, 
    $adeudo_fecha, $adeudo_fecha_real)
    {
        $nuevo = new Adeudos();
        $nuevo->id_persona = $id_persona;
        $nuevo->id_estatus = $id_estatus;
        $nuevo->id_area = $id_area;
        $nuevo->id_resolucion = $id_resolucion;
        $nuevo->adeudo_monto = $adeudo_monto;
        $nuevo->adeudo_fecha = $adeudo_fecha;
        $nuevo->adeudo_fecha_real = $adeudo_fecha_real;
        $nuevo->save();
        return $nuevo;
    }
}