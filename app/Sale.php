<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //M-M (pharmacist&customer)
    public function pharmacists(){
    	return $this->hasMany(Pharmacist::class);
    }
    public function customers(){
    	return $this->hasMany(Customer::class);
    }

    //M-M (sales&stores)
    public function salelists(){
    	return $this->belongsto(Salelist::class);
    }

}
