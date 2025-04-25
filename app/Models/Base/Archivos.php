<?php
namespace App\Models\Base;
use Illuminate\Database\Eloquent\Model;
class Archivos extends Model
{
    protected $table = "archivos";
    protected $primaryKey = "id_archivo";
    public $timestamps = false;
    public function nuevo($archivo_nombre, $archivo_ruta, $id_cotizacion, $id_comprobante, $id_deposito)
    {
        $nuevo = new Archivos();
        $nuevo->archivo_nombre = $archivo_nombre;
        $nuevo->archivo_ruta = $archivo_ruta;
        $nuevo->id_cotizacion = $id_cotizacion;
        $nuevo->id_comprobante = $id_comprobante;
        $nuevo->id_deposito = $id_deposito;
        $nuevo->archivo_fecha = date('Y-m-d');
        $nuevo->save();
        return $nuevo;
    }
}