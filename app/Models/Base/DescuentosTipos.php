<?php
namespace App\Models\Base;
use Illuminate\Database\Eloquent\Model;
class DescuentosTipos extends Model
{
    protected $table = "descuentos_tipos";
    protected $primaryKey = "id_descuento_tipo";
    public $timestamps = false;
    public function nuevo($tipo_descuento_nombre)
    {
        $nuevo = new DescuentosTipos();
        $nuevo->tipo_descuento_nombre = $tipo_descuento_nombre;
        $nuevo->save();
        return $nuevo;
    }
}