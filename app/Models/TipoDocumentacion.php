<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumentacion extends Model
{
    use HasFactory;
    protected $table = 'tipo_documentacion';
    protected $fillable = ['id','nombre','descripcion','completado','created_at','updated_at'];
    public function toggleComplete()
    {
        $this->completado = !$this->completado;
        $this->save();
    }
    public function documentacions() {
        return $this->hasMany(Documentacion::class, 'id_tipo_documentacion', 'id');
    }}
