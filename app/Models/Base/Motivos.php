<?php
namespace App\Models\Base;
use Illuminate\Database\Eloquent\Model;
class Motivos extends Model
{
    protected $table = "motivos";
    protected $primaryKey = "id_motivo";
    public $timestamps = false;
    public function nuevo($motivo_nombre, $motivo_descripcion)
    {
        $nuevo = new Motivos();
        $nuevo->motivo_nombre = $motivo_nombre;
        $nuevo->motivo_descripcion = $motivo_descripcion;
        $nuevo->save();
        return $nuevo;
    }
}