<?php
namespace App\Models\Solicitudes;
use Illuminate\Database\Eloquent\Model;
class Descuentos extends Model
{
    protected $table = "descuentos";
    protected $primaryKey = "id_descuento";
    public $timestamps = false;
    public function nuevo($id_persona, $id_estatus, $id_adeudo, $descuento_monto, $descuento_fecha, 
    $id_descuento_tipo, $descuento_motivo)
    {
        $nuevo = new Descuentos();
        $nuevo->id_persona = $id_persona;
        $nuevo->id_estatus = $id_estatus;
        $nuevo->id_adeudo = $id_adeudo;
        $nuevo->descuento_monto = $descuento_monto;
        $nuevo->descuento_fecha = $descuento_fecha;
        $nuevo->id_descuento_tipo = $id_descuento_tipo;
        $nuevo->descuento_motivo = $descuento_motivo;
        $nuevo->save();
        return $nuevo;
    }
}