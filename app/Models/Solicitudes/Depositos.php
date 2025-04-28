<?php
namespace App\Models\Solicitudes;
use Illuminate\Database\Eloquent\Model;
class Depositos extends Model
{
    protected $table = "depositos";
    protected $primaryKey = "id_deposito";
    public $timestamps = false;
    public function nuevo($id_solicitud,$id_cuenta,$id_tipo,
    $deposito_fecha,$deposito_monto,$deposito_comentario)
    {
        $nuevo = new Depositos();
        $nuevo->id_solicitud = $id_solicitud;
        $nuevo->id_cuenta = $id_cuenta;
        $nuevo->id_tipo = $id_tipo;
        $nuevo->deposito_fecha = $deposito_fecha;
        $nuevo->deposito_monto = $deposito_monto;
        $nuevo->deposito_comentario = $deposito_comentario;
        $nuevo->deposito_ok = null;
        $nuevo->save();
        return $nuevo;
    }
}