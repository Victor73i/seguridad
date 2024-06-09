<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteInsumoInventariado extends Model
{

    use HasFactory;
    protected $table = 'reporte_insumo_inventariado';
    protected $fillable = ['id','nota','descripcion','completado','id_glpi_passivedcequipments','id_glpi_users','id_glpi_tickets','id_glpi_locations','archivo','fecha_asignacion','created_at','updated_at'];



    public function toggleComplete()
    {
        $this->completado = !$this->completado;
        $this->save();
    }
    public function glpi_tickets()
    {
        return $this->hasMany(GlpiTickets::class);
    }
}
