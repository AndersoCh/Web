<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Heroe extends Model
{
    protected $fillable = ['nombre','url','poderes'];
    protected $hidden = ['created_at','updated_at'];
}