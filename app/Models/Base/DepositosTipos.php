<?php
namespace App\Models\Base;
use Illuminate\Database\Eloquent\Model;
class DepositosTipos extends Model
{
    protected $table = "depositos_tipos";
    protected $primaryKey = "id_tipo";
    public $timestamps = false;
    public function nuevo($tipo_nombre)
    {
        $nuevo = new DepositosTipos();
        $nuevo->tipo_nombre = $tipo_nombre;
        $nuevo->save();
        return $nuevo;
    }
}