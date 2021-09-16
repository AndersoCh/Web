<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nombre','correo'];


    protected $hidden = ['created_at','updated_at'];

    public function pedidos()
    {
        return $this->hasMany('App\Models\Pedido');
    }
}