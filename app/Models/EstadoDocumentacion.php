<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoDocumentacion extends Model
{
    use HasFactory;
    protected $table = 'estado_documentacion';
    protected $fillable = ['id','nombre','descripcion','created_at','updated_at'];
    public function documentacions() {
        return $this->hasMany(Documentacion::class, 'id_estado_documentacion', 'id');
    }
}
