<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Tarea extends Model
{
    use HasFactory;
    protected $table = 'tarea';
    protected $fillable = [
        'id', 'nombre', 'descripcion', 'fecha_asignacion','estado','prioridad', 'fecha_aproximada', 'fecha_terminado','observacion', 'completado', 'id_glpi_tickets','id_glpi_users', 'created_at', 'updated_at'
    ];




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
    public function getDiasRestantesAttribute()
    {
        $fechaActual = Carbon::now();
        $fechaAsignacion = Carbon::parse($this->fecha_asignacion);
        $fechaAproximada = Carbon::parse($this->fecha_aproximada);
        $fechaTerminado = $this->fecha_terminado ? Carbon::parse($this->fecha_terminado) : null;

        // Si la tarea ya está marcada como completada
        if ($this->completado) {
            if ($fechaTerminado && $fechaTerminado->lte($fechaAproximada)) {
                return 'Completado a Tiempo';
            } else {
                return 'No Completado a Tiempo';
            }
        }

        // Si la tarea no está completada y la fecha actual es mayor a la fecha aproximada
        if ($fechaActual->gt($fechaAproximada)) {
            return 'No Completado a Tiempo';
        }

        // Si aún estamos en el rango de fechas y la tarea no está completada
        return $fechaAsignacion->diffInDays($fechaAproximada, false) . ' días restantes';
    }

    public function establecerCompletado($estado, $completadoATiempo = null)
    {
        // La fecha actual
        $hoy = Carbon::now();

        // Si se completa la tarea, actualiza el estado y verifica si se completó a tiempo
        if ($estado === 'terminado') {
            $this->completado = $completadoATiempo ?? $hoy->between($this->fecha_asignacion, $this->fecha_aproximada);
            $this->fecha_terminado = $hoy->toDateString();
        } else {
            // Si no se completa la tarea, revierte los cambios
            $this->completado = false;
            $this->fecha_terminado = null; // o mantener la fecha anterior si así se prefiere
            if ($estado === 'borrado') {
                // Si se ha marcado como borrado, establecer la fecha de terminado a la actual
                $this->fecha_terminado = Carbon::now()->toDateString();
            }
        }

        $this->estado = $estado;
        $this->save();
    }

    // Considera sobrescribir el método save para incluir la lógica de 'completado a tiempo'
    // Esto es solo un ejemplo y puede que necesites ajustarlo según tu aplicación
    public function save(array $options = [])
    {
        if($this->isDirty('estado') && $this->estado == 'terminado') {
            $this->completado = Carbon::now()->lte($this->fecha_aproximada);
            $this->fecha_terminado = Carbon::now()->toDateString();
        }

        parent::save($options);
    }


}
