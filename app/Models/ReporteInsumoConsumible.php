<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteInsumoConsumible extends Model
{
    use HasFactory;
    protected $table = 'reporte_insumo_consumible';
    protected $fillable = [
        'id', 'nota', 'descripcion','completado', 'fecha_asignacion', 'no_pedido', 'id_glpi_passivedcequipments',  'id_glpi_users','id_glpi_locations', 'created_at', 'updated_at'
    ];


    public function toggleComplete()
    {
        $this->completado = !$this->completado;
        $this->save();
    }}
