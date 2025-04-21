<?php
namespace App\Models\Base;
use Illuminate\Database\Eloquent\Model;
class Aerolineas extends Model
{
    protected $table = "aerolineas";
    protected $primaryKey = "id_aerolinea";
    public $timestamps = false;
    public function nuevo($aerolinea_nombre)
    {
        $nuevo = new Aerolineas();
        $nuevo->aerolinea_nombre = $aerolinea_nombre;
        $nuevo->save();
        return $nuevo;
    }
}