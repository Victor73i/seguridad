<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'log';
    protected $fillable = ['id','titulo','observaciones','fecha_inicio', 'fecha_finalizacion','completado','id_glpi_locations','id_glpi_tickets','id_glpi_users','archivo','id_estado_log','id_tipo_equipo_it',
        'created_at','updated_at'];


    protected $casts = [
        'archivo' => 'array',
    ];
    public function estado_log()
    {
        return $this->belongsTo(EstadoLog::class, 'id_estado_log', 'id');
    }
    public function tipo_equipo_it()
    {
        return $this->hasMany(TipoEquipoIt::class);
    }
    public function glpi_locations()
    {
        return $this->belongsTo(GlpiLocations::class, 'id_glpi_locations', 'id');
    }
    public function glpi_tickets()
    {
        return $this->belongsTo(GlpiTickets::class, 'id_glpi_tickets', 'id');
    }
    public function glpi_users()
    {
        return $this->belongsTo(GlpiUsers::class, 'id_glpi_users', 'id');
    }
    public function toggleComplete()
    {
        $this->completado = !$this->completado;
        $this->save();
    }

    public function equiposIt()
    {
        return $this->belongsToMany(EquipoIt::class, 'log_equipo_it', 'id_log', 'id_equipo_it');
    }}
