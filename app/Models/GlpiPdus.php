<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlpiPdus extends Model
{
    use HasFactory;
    protected $table = 'glpi_pdus';
    protected $fillable = ['id','name','entities_id','is_recursive','locations_id','serial','otherserial','pdumodels_id','users_id_tech','groups_id_tech','is_template','template_name','is_deleted','state_id','comment','manufacturers_id','pdutypes_id','date_mod','date_creation'];

    public function equipoIt()
    {
        return $this->hasOne(EquipoIt::class, 'id_glpi_pdus', 'id');
    }}
