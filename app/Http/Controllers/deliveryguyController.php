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
use DB;

class deliveryguyController extends Controller
{
    //start Deliveryguy table operations

    //validation
    public function deliveryguyValidation($request){
        $this->validate($request,[
            'deliveryguy_firstname'=>'required|regex:/^[a-z]+$/i|between:2,30',
            'deliveryguy_lastname'=>'required|regex:/^[a-z]+$/i|min:2|max:30',
            'deliveryguy_salary'=>'required|numeric',
            'deliveryguy_startjob'=>'required',
            'deliveryguy_city'=>'required|regex:/^[a-z]+$/i|min:2|max:30',
            'deliveryguy_street'=>'required|min:2|max:50',
            'deliveryguy_phone'=>'required|numeric|digits:11',
        ],[
            //custom messages
        ]);
    }

    //add new deliveryguy
    public function addNewDeliveryguy(){
        return view('DeliveryguyTable.addNewDeliveryguy');
    }
    public function saveNewDeliveryguy(Request $request){
        $this->deliveryguyValidation($request);

        $deliveryguy=new Deliveryguy();
        $deliveryguy->deliveryguy_firstname=Request('deliveryguy_firstname');
        $deliveryguy->deliveryguy_lastname=Request('deliveryguy_lastname');
        $deliveryguy->deliveryguy_salary=Request('deliveryguy_salary');
        $deliveryguy->deliveryguy_startjob=Request('deliveryguy_startjob');
        $deliveryguy->deliveryguy_city=Request('deliveryguy_city');
        $deliveryguy->deliveryguy_street=Request('deliveryguy_street');
        $deliveryguy->deliveryguy_phone=Request('deliveryguy_phone');
        $deliveryguy->save();
        return redirect('/allDeliveryguys');
    }

    //view all deliveryguys
    public function allDeliveryguys(){
        $deliveryguys=DB::table('deliveryguys')->paginate(10);
        return view('DeliveryguyTable.viewAllDeliveryguys',compact('deliveryguys'));
    }

    //edit deliveryguy
    public function editDeliveryguy($id){
        $deliveryguy=Deliveryguy::all()->find($id);
        return view('DeliveryguyTable.editDeliveryguy',compact('deliveryguy'));
    }
    public function updateDeliveryguy($id, Request $request){
        $this->deliveryguyValidation($request);
        
        $deliveryguy=Deliveryguy::all()->find($id);
        $deliveryguy->deliveryguy_firstname=Request('deliveryguy_firstname');
        $deliveryguy->deliveryguy_lastname=Request('deliveryguy_lastname');
        $deliveryguy->deliveryguy_salary=Request('deliveryguy_salary');
        $deliveryguy->deliveryguy_startjob=Request('deliveryguy_startjob');
        $deliveryguy->deliveryguy_city=Request('deliveryguy_city');
        $deliveryguy->deliveryguy_street=Request('deliveryguy_street');
        $deliveryguy->deliveryguy_phone=Request('deliveryguy_phone');
        $deliveryguy->save();
        return redirect('/allDeliveryguys');
    }

    //delete deliveryguy
    public function deleteDeliveryguy($id){
        $deliveryguy = Deliveryguy::all()->find($id);
        $deliveryguy->delete();
        return redirect('/allDeliveryguys');
    }

//end Deliveryguy table operations
}
