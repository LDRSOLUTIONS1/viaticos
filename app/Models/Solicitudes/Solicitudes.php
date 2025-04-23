<?php
namespace App\Models\Solicitudes;
use Illuminate\Database\Eloquent\Model;
class Solicitudes extends Model
{
    protected $table = "solicitudes";
    protected $primaryKey = "id_solicitud";
    public $timestamps = false;
    public function nuevo($solicitud_folio, $id_area, $id_persona, $id_motivo, 
    $id_concepto, $solicitud_descripcion, $solicitud_costo_estimado, 
    $solicitud_costo_autorizado, $solicitud_costo_diferencia)
    {
        $nuevo = new Solicitudes();
        $nuevo->solicitud_folio = $solicitud_folio;
        $nuevo->id_estatus = 1;
        $nuevo->id_area = $id_area;
        $nuevo->id_persona = $id_persona;
        $nuevo->id_motivo = $id_motivo;
        $nuevo->id_concepto = $id_concepto;
        $nuevo->solicitud_descripcion = $solicitud_descripcion;
        $nuevo->solicitud_fecha = date('Y-m-d');
        $nuevo->solicitud_costo_estimado = $solicitud_costo_estimado;
        $nuevo->solicitud_costo_autorizado = $solicitud_costo_autorizado;
        $nuevo->solicitud_costo_diferencia = $solicitud_costo_diferencia;
        $nuevo->save();
        return $nuevo;
    }
}