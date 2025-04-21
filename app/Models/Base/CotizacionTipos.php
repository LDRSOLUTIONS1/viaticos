<?php
namespace App\Models\Base;
use Illuminate\Database\Eloquent\Model;
class CotizacionTipos extends Model
{
    protected $table = "cotizacion_tipos";
    protected $primaryKey = "id_cotizacion_tipo";
    public $timestamps = false;
    public function nuevo($tipo_nombre)
    {
        $nuevo = new CotizacionTipos();
        $nuevo->tipo_nombre = $tipo_nombre;
        $nuevo->save();
        return $nuevo;
    }
}