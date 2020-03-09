<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliverylist extends Model
{
    //M-M (delivery&store)
    public function deliveries(){
    	return $this->hasMany(Delivery::class);
    }
    public function stores(){
    	return $this->hasMany(Store::class);
    }
}
