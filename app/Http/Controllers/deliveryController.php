<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Image;
//Str::substr
use Illuminate\Support\Str;
//use Models
use App\Medicine;
use App\Type;
use App\Customer;
use App\Pharmacist;
use App\Pharmacistphone;
use App\Deliveryguy;
use App\Delivery;
use App\Sale;
use App\Store;
use App\Deliverylist;
use DB;

class deliveryController extends Controller
{
    //start Delivery table operations

    //validation
    public function deliveryValidation($request){
        $this->validate($request,[
            'delivery_date'=>'required',
            'delivery_time'=>'required',
            'delivery_pharmacist'=>'required|exists:pharmacists,id',
            'delivery_customer'=>'required|exists:customers,id',
            'delivery_deliveryguy'=>'required|exists:deliveryguys,id',
        ],[
            'delivery_pharmacist.exists'=>'The selected pharmacist is invalid.',
            'delivery_customer.exists'=>'The selected customer is invalid.',
            'delivery_deliveryguy.exists'=>'The selected deliveryguy is invalid.',
        ]);
    }
    public function newMedicineValidation($request, $counter){
        $this->validate($request,[
            'delivery_medicine'.$counter=>'required|exists:medicines,id',
            'medicine_quantity'.$counter=>'required|numeric',
        ],[
            'delivery_medicine'.$counter.'.required'=>'Medicine field is required.',
            'delivery_medicine'.$counter.'.exists'=>'The selected medicine is invalid.',
            'medicine_quantity'.$counter.'.required'=>'Medicine Quantity field is required.',
            'medicine_quantity'.$counter.'.numeric'=>'Quantity must be numeric.', 
        ]);
    }
    public function deliveryEdit($request){
        $this->validate($request,[
            'delivery_totalprice'=>'required|numeric',
            'delivery_list'=>'required',
        ],[
            'delivery_totalprice.required'=>'This field is required.',
            'delivery_totalprice.numeric'=>'Total price must be numeric.',
            'delivery_list.required'=>'This field is required.',
        ]);
    }

    //add new delivery
    public function addNewDelivery(){
        $medicines=Medicine::all();
        $pharmacists=Pharmacist::all();
        $customers=Customer::all();
        $deliveryguys=Deliveryguy::all();
        return view('DeliveryTable.addNewDelivery',compact('medicines','pharmacists','customers','deliveryguys'));
    } 
    public function saveNewDelivery(Request $request){
        $x=0;
        while(Request('delivery_medicine'.$x)){
            //validation for each medicine field
            $this->newMedicineValidation($request, $x);
            $x++;
        }
        
        $this->deliveryValidation($request);

        $counter=0;
        //True-> new medicine
        while(Request('delivery_medicine'.$counter)){
            //sold medicine->id
            $singleMedicineID=Request('delivery_medicine'.$counter);
            $MedicineQuantity=Request('medicine_quantity'.$counter);
            //store medicine name and quantity in array
            $medicineName=(Medicine::all()->where('id', $singleMedicineID)->pluck('medicine_name'))[0];
            $list[$counter]=$medicineName.'->'.$MedicineQuantity;
            //store medicines name in array
            $listOfMedicineName[$counter]=$medicineName;
            //check if there is enough medicine quantity in store
            $medicinesQuantityInStore=Store::where('medicine_id',$singleMedicineID)->count();
            if($medicinesQuantityInStore<$MedicineQuantity){
                return back()->with('warning', $medicineName.' available quantity in store is:  '.$medicinesQuantityInStore.'.');
            }
            //check if medicine is chosen more than one
            for($i=0;$i<count($listOfMedicineName);$i++){
                for($j=$i+1;$j<count($listOfMedicineName);$j++){
                    if($listOfMedicineName[$i]==$listOfMedicineName[$j]){
                        return back()->with('warning', $listOfMedicineName[$j].' must be chosen only once.');
                    }
                }
            }
            $counter++;
        }

        //convert array into a single string
        $delivery_list_array=implode(",",$list);

        $delivery=new Delivery(); 
        $delivery->delivery_date=Request('delivery_date');
        $delivery->delivery_time=Request('delivery_time');
        $delivery->pharmacist_id=Request('delivery_pharmacist');
        $delivery->customer_id=Request('delivery_customer');
        $delivery->deliveryguy_id=Request('delivery_deliveryguy');
        $delivery->delivery_list=$delivery_list_array;
        $delivery->save();

        $totalprice=0;
        //ID of last previous delivery operation
        $lastRowOfDeliveryTable=Delivery::orderBy('id', 'desc')->first()->id;
        $counter=0;
        //True-> new medicine
        while(Request('delivery_medicine'.$counter)){
            //sold medicine->id
            $singleMedicineID=Request('delivery_medicine'.$counter);
            $MedicineQuantity=Request('medicine_quantity'.$counter);
            while($MedicineQuantity>0){
                //medicine:1 -> store:2
                //get store->id from store table using sold medicine->id as foriegn key
                $medicineStore=Store::where('medicine_id', $singleMedicineID)->first()->id;
                $deliverylist=new Deliverylist();
                //save medicine id as foriegn key in deliverylist table
                $deliverylist->medicine_id=$singleMedicineID;
                //save store id as foriegn key in deliverylist table
                $deliverylist->store_id=$medicineStore;
                //save sale id as foriegn key in deliverylist table
                $deliverylist->delivery_id=$lastRowOfDeliveryTable;
                $deliverylist->save();

                $MedicineQuantity--;
                //get medicine price
                $medicinePrice=Medicine::all()->where('id', $singleMedicineID)->first()->medicine_price;
                $totalprice+=$medicinePrice;

                $store=Store::all()->find($medicineStore);
                $store->delete();
            }
            $counter++;
        }

        //update total price column in deliveries table
        $delivery=DB::table('deliveries')->where('id',$lastRowOfDeliveryTable)->update(['delivery_totalprice'=>$totalprice]);

        return redirect('/allDeliveries');
    }

    //view all deliveries
    public function allDeliveries(){
        $pharmacists=Pharmacist::all();
        $customers=Customer::all();
        $deliveryguys=Deliveryguy::all();

        $pharmacistName=array();
        $customerName=array();
        $deliveryguyName=array();

        foreach ($pharmacists as $pharmacist){
            $firstname=$pharmacist->pharmacist_firstname;
            $lastname=$pharmacist->pharmacist_lastname;
            $pharmacistName[$pharmacist->id]=$firstname.' '.$lastname;
        }
        foreach ($customers as $customer){
            $firstname=$customer->customer_firstname;
            $lastname=$customer->customer_lastname;
            $customerName[$customer->id]=$firstname.' '.$lastname;
        }
        foreach ($deliveryguys as $deliveryguy){
            $firstname=$deliveryguy->deliveryguy_firstname;
            $lastname=$deliveryguy->deliveryguy_lastname;
            $deliveryguyName[$deliveryguy->id]=$firstname.' '.$lastname;
        }

        $deliveries=DB::table('deliveries')->paginate(10);
        return view('DeliveryTable.viewAllDeliveries',compact('deliveries','pharmacistName', 'customerName', 'deliveryguyName'));
    }

    //edit delivery
    public function editDelivery($id){
        $pharmacists=Pharmacist::all();
        $customers=Customer::all();
        $deliveryguys=Deliveryguy::all();

        $delivery=Delivery::all()->find($id);

        //Pharmacist
        //pharmacist firstname
        $currentPharmacistFirstName=(Pharmacist::where('id', $delivery->pharmacist_id)->pluck('pharmacist_firstname'))[0];
        //pharmacist lastname
        $currentPharmacistLastName=(Pharmacist::where('id', $delivery->pharmacist_id)->pluck('pharmacist_lastname'))[0];
        $currentPharmacistName=$currentPharmacistFirstName.' '.$currentPharmacistLastName;

        //Customer
        $currenCustomerFirstName=(Customer::where('id', $delivery->customer_id)->pluck('customer_firstname'))[0];
        $currentCustomerLastName=(Customer::where('id', $delivery->customer_id)->pluck('customer_lastname'))[0];
        $currentCustomerName=$currenCustomerFirstName.' '.$currentCustomerLastName;

        //Deliveryguy
        if(($delivery->deliveryguy_id)>0){
            $currenDeliveryguyFirstName=(Deliveryguy::where('id', $delivery->deliveryguy_id)->pluck('deliveryguy_firstname'))[0];
            $currenDeliveryguyLastName=(Deliveryguy::where('id', $delivery->deliveryguy_id)->pluck('deliveryguy_lastname'))[0];
            $currentDeliveryguyName=$currenDeliveryguyFirstName.' '.$currenDeliveryguyLastName;
        }
        else{
            $currentDeliveryguyName=Deliveryguy::first();
        }
        return view('DeliveryTable.editDelivery',compact('delivery','pharmacists', 'customers', 'deliveryguys', 'currentPharmacistName', 'currentCustomerName', 'currentDeliveryguyName'));
    }
    public function updateDelivery($id, Request $request){
        $this->deliveryValidation($request);
        $this->deliveryEdit($request);

        $delivery=Delivery::all()->find($id);
        $delivery->delivery_date=Request('delivery_date');
        $delivery->delivery_time=Request('delivery_time');
        $delivery->delivery_totalprice=Request('delivery_totalprice');
        $delivery->pharmacist_id=Request('delivery_pharmacist');
        $delivery->customer_id=Request('delivery_customer');
        $delivery->deliveryguy_id=Request('delivery_deliveryguy');
        $delivery->save();
        return redirect('/allDeliveries');
    }

    //delete delivery
    public function deleteDelivery($id){
        $delivery=Delivery::all()->find($id);
        $delivery->delete();
        return redirect('/allDeliveries');
    }

    //end Delivery table operations 
}
