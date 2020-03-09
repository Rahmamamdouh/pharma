<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
	//M-M (delivery&store)
    public function deliverylists(){
    	return $this->belongsto(Deliverylist::class);
    }

    //M-M (customer&pharmacist&deliveryguy)
    public function customers(){
    	return $this->hasMany(Customer::class);
    }
    public function pharmacists(){
    	return $this->hasMany(Pharmacist::class);
    }
    public function deliveryguys(){
    	return $this->hasMany(Deliveryguy::class);
    }
}
