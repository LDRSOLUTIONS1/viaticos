<?php
namespace App\Models\Base;
use Illuminate\Database\Eloquent\Model;
class UsuariosAdmin extends Model
{
    protected $table = "usuarios_admin";
    protected $primaryKey = "id_usuario_admin";
    public $timestamps = false;
    public function nuevo($id_persona)
    {
        $nuevo = new UsuariosAdmin();
        $nuevo->id_persona = $id_persona;
        $nuevo->save();
        return $nuevo;
    }
}