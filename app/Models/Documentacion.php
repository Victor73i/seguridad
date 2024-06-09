<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentacion extends Model
{
    use HasFactory;
    protected $table = 'documentacion';
    protected $fillable = ['id','nombre','descripcion','fecha_creacion','archivo','id_estado_documentacion','id_tipo_documentacion',
        'id_categoria_documentacion','id_glpi_users','completado','created_at','updated_at'];

    public function estado_documentacion()
    {
        return $this->belongsTo(EstadoDocumentacion::class, 'id_estado_documentacion', 'id');
    }
    public function categoria_documentacion()
    {
        return $this->belongsTo(CategoriaDocumentacion::class, 'id_categoria_documentacion', 'id');
    }
    public function tipo_documentacion()
    {
        return $this->belongsTo(TipoDocumentacion::class, 'id_tipo_documentacion', 'id');
    }
    public function glpi_users()
    {
        return $this->belongsTo(GlpiUsers::class, 'id_glpi_users', 'id');
    }
    public function toggleComplete()
    {
        $this->completado = !$this->completado;
        $this->save();
    }}
