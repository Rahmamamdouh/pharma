<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salelist extends Model
{
    //M-M (sales&stores)
    public function sales(){
    	return $this->hasMany(Sale::class);
    }
    public function stores(){
    	return $this->hasMany(Store::class);
    }

}
