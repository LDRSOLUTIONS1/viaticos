<?php
namespace App\Models\Solicitudes;
use Illuminate\Database\Eloquent\Model;
class Cotizaciones extends Model
{
    protected $table = "cotizaciones";
    protected $primaryKey = "id_cotizacion";
    public $timestamps = false;
    public function nuevo($id_solicitud, $id_cotizacion_tipo, $id_aerolinea, $cotizacion_clave_reservacion, 
    $cotizacion_ruta, $cotizacion_fecha_compra, $cotizacion_fecha_inicio, $cotizacion_hora_inicio, 
    $cotizacion_fecha_fin, $cotizacion_hora_fin,$cotizacion_costo,$cotizacion_proveedor,$cotizacion_vigencia,
    $id_persona_autoriza,$cotizacion_destino)
    {
        $nuevo = new Cotizaciones();
        $nuevo->id_solicitud = $id_solicitud;
        $nuevo->id_estatus = 1;
        $nuevo->id_cotizacion_tipo = $id_cotizacion_tipo;
        $nuevo->id_aerolinea = $id_aerolinea;
        $nuevo->cotizacion_clave_reservacion = $cotizacion_clave_reservacion;
        $nuevo->cotizacion_ruta = $cotizacion_ruta;
        $nuevo->cotizacion_fecha_compra = $cotizacion_fecha_compra;
        $nuevo->cotizacion_fecha_inicio = $cotizacion_fecha_inicio;
        $nuevo->cotizacion_hora_inicio = $cotizacion_hora_inicio;
        $nuevo->cotizacion_fecha_fin = $cotizacion_fecha_fin;
        $nuevo->cotizacion_hora_fin = $cotizacion_hora_fin;
        $nuevo->cotizacion_costo = $cotizacion_costo;
        $nuevo->cotizacion_proveedor = $cotizacion_proveedor;
        $nuevo->cotizacion_vigencia = $cotizacion_vigencia;
        $nuevo->id_persona_autoriza = $id_persona_autoriza;
        $nuevo->cotizacion_destino = $cotizacion_destino;
        $nuevo->cotizacion_fecha = date('Y-m-d');
        $nuevo->save();
        return $nuevo;
    }
}