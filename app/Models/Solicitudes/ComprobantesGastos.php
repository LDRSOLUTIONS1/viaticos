<?php
namespace App\Models\Solicitudes;
use Illuminate\Database\Eloquent\Model;
class ComprobantesGastos extends Model
{
    protected $table = "comprobantes_gastos";
    protected $primaryKey = "id_comprobante";
    public $timestamps = false;
    public function nuevo($id_cotizacion,$comprobante_gasto_ok,$comprobante_gasto_monto_deducible,
    $comprobante_gasto_monto,$comprobante_gasto_factura,$comprobante_gasto_observaciones)
    {
        $nuevo = new ComprobantesGastos();
        $nuevo->id_cotizacion = $id_cotizacion;
        $nuevo->comprobante_gasto_ok = $comprobante_gasto_ok;
        $nuevo->comprobante_gasto_monto_deducible = $comprobante_gasto_monto_deducible;
        $nuevo->comprobante_gasto_monto = $comprobante_gasto_monto;
        $nuevo->comprobante_gasto_fecha = date('Y-m-d');
        $nuevo->comprobante_gasto_factura = $comprobante_gasto_factura;
        $nuevo->comprobante_gasto_observaciones = $comprobante_gasto_observaciones;
        $nuevo->save();
        return $nuevo;
    }
}