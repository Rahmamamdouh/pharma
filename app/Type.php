<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
	//1-M (type&medicine)
    public function medicines(){
    	return $this->hasMany(Medicine::class);
    }
}
