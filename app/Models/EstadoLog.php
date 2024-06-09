<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoLog extends Model
{
    use HasFactory;
    protected $table = 'estado_log';
    protected $fillable = ['id','nombre','descripcion','created_at','updated_at'];
    public function logs() {
        return $this->hasMany(Log::class, 'id_estado_log', 'id');
    }
}
