<?php
namespace App\Models\Base;
use Illuminate\Database\Eloquent\Model;
class CuentasBancarias extends Model
{
    protected $table = "cuentas_bancarias";
    protected $primaryKey = "id_cuenta";
    public $timestamps = false;
    public function nuevo($id_persona,$id_banco,$cuenta_clabe,$cuenta_numero)
    {
        $nuevo = new CuentasBancarias();
        $nuevo->id_persona = $id_persona;
        $nuevo->id_banco = $id_banco;
        $nuevo->cuenta_clabe = $cuenta_clabe;
        $nuevo->cuenta_numero = $cuenta_numero;
        $nuevo->save();
        return $nuevo;
    }
}