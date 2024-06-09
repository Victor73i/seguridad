<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoIt extends Model
{
    use HasFactory;
    protected $table = 'equipo_it';
    protected $fillable = ['id','nombre','type','id_glpi_computers','id_glpi_printers','id_glpi_pdus','created_at','updated_at'];


    public function glpiComputers()
    {
        return $this->belongsTo(GlpiComputers::class, 'id_glpi_computers');
    }

    public function glpiPrinters()
    {
        return $this->belongsTo(GlpiPrinters::class, 'id_glpi_printers');
    }

    public function glpiPdus()
    {
        return $this->belongsTo(GlpiPdus::class, 'id_glpi_pdus');
    }

    public function logs()
    {
        return $this->belongsToMany(Log::class);
    }

}
