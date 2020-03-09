<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
	//1-M (store&medicine)
    public function medicines(){
    	return $this->belongsto(Medicine::class);
    }

    //M-M (sales&stores)
    public function salelists(){
    	return $this->belongsto(Salelist::class);
    }

    //M-M (delivery&store)
    public function deliverylists(){
    	return $this->belongsto(Deliverylist::class);
    }

}
