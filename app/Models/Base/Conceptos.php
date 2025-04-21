<?php
namespace App\Models\Base;
use Illuminate\Database\Eloquent\Model;
class Conceptos extends Model
{
    protected $table = "conceptos";
    protected $primaryKey = "id_concepto";
    public $timestamps = false;
    public function nuevo($concepto_nombre)
    {
        $nuevo = new Conceptos();
        $nuevo->concepto_nombre = $concepto_nombre;
        $nuevo->save();
        return $nuevo;
    }
}