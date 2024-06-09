<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteInsumoFungible extends Model
{
    use HasFactory;
    protected $table = 'reporte_insumo_fungible';
    protected $fillable = ['id','nota','descripcion','archivo','id_glpi_users','id_glpi_passivedcequipments','id_glpi_tickets','no_pedido','fecha_asignacion','id_glpi_locations','id_equipo_it','created_at','updated_at'];

}
