<?php
namespace App\Models\Solicitudes;
use Illuminate\Database\Eloquent\Model;
class Presupuestos extends Model
{
    protected $table = "presupuestos";
    protected $primaryKey = "id_presupuestos";
    public $timestamps = false;
    public function nuevo($id_area, $id_adeudo, $presupuesto_monto_inicial, $presupuesto_monto_restante)
    {
        $nuevo = new Presupuestos();
        $nuevo->id_area = $id_area;
        $nuevo->id_adeudo = $id_adeudo;
        $nuevo->presupuesto_monto_inicial = $presupuesto_monto_inicial;
        $nuevo->presupuesto_monto_restante = $presupuesto_monto_restante;
        $nuevo->save();
        return $nuevo;
    }
}