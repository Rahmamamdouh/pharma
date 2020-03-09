<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
	//1-M (type&medicine)
    public function types(){
    	return $this->belongsto(Type::class);
    }

    //1-M (store&medicine)
    public function stores(){
    	return $this->hasMany(Store::class);
    }

    //1-M (cart&medicine)
    public function carts(){
    	return $this->belongsto(Cart::class);
    }
}
