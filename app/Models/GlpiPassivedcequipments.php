<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlpiPassivedcequipments extends Model
{
    use HasFactory;
    protected $table = 'glpi_passivedcequipments';
    protected $fillable = ['id','name','entities_id','is_recursive','locations_id','serial','otherserial','passivedcequipmentmodels_id','passivedcequipmenttypes_id','user_id_tech','groups_id_tech','is_template','template_name','is_deleted','states_id','comment','manufacturers_id','date_mod','date_creation'];
}
