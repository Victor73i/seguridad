<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlpiLocations extends Model
{
    use HasFactory;
    protected $table = 'glpi_locations';
    protected $fillable = ['id','entities_id','is_recursive','name','locations_id','completename','comment','level','ancestors_cache','sons_cache','address','postcode','town','state','country','building','room','latitude','date_mod','date_creation'];

}
