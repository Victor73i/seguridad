<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlpiUsers extends Model
{
    use HasFactory;
    protected $table = 'glpi_users';
    protected $fillable = ['id','name','descripcion','created_at','updated_at'];}
