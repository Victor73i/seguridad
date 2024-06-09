<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlpiComputers extends Model
{
    use HasFactory;
    protected $table = 'glpi_computers';
    protected $fillable = ['id','entities_id','name','serial','otherserial','contact'.'contact-num','users_id_tech','groups_id_tech','comment','date_mod','autoupdatesystems_id','locations_id','networks_id','computermodels_id','computertypes_id','is_template','template_name','manufactures_id','is_deleted','is_dynamic','users_id','groups_id','states_id','ticket_tco','uuid','date_creation','is_recursive'];
}
