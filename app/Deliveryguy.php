<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliveryguy extends Model
{
    //M-M (customer&pharmacist&deliveryguy)
    public function deliveries(){
    	return $this->belongsto(Delivery::class);
    }
}
