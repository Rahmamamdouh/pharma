<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //1-M (cart&medicine)
    public function medicines(){
    	return $this->hasMany(Medicine::class);
    }
}
