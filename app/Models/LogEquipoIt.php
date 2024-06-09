<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogEquipoIt extends Model
{
    use HasFactory;
    protected $table = 'log_equipo_it';
    protected $fillable = ['id_log','id_equipo_it', 'created_at', 'updated_at'];
}
