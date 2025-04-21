<?php
namespace App\Models\Base;
use Illuminate\Database\Eloquent\Model;
class MovimientosTipos extends Model
{
    protected $table = "movimiento_tipos";
    protected $primaryKey = "id_moviemiento_tipo";
    public $timestamps = false;
    public function nuevo($movimiento_tipo_nombre)
    {
        $nuevo = new MovimientosTipos();
        $nuevo->movimiento_tipo_nombre = $movimiento_tipo_nombre;
        $nuevo->save();
        return $nuevo;
    }
}