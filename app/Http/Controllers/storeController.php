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

class storeController extends Controller
{
    //start Store table operations

    //validation
    public function storeValidation($request){
        $this->validate($request,[
            'store_expire'=>'required',
            'store_medicine_name'=>'required|exists:medicines,id',
        ],[
            'store_expire.required'=>'Medicine expiry date is required.',
            'store_medicine_name.required'=>'Medicine name is required.',
            'store_medicine_name.exists'=>'Invalid medicine.',
        ]);
    }

    //add new store
    public function addNewStore(){
        $medicines=Medicine::all();
        return view('StoreTable.addNewStore',compact('medicines'));
    }
    public function saveNewStore(Request $request){
        $this->storeValidation($request);

        $store=new Store(); 
        $store->store_expire=Request('store_expire');
        $store->medicine_id=Request('store_medicine_name');
        $store->save();
        return redirect('/allStores');
    }

    //view all stores
    public function allStores(){
        $medicines=Medicine::all();
        $medicineArray=array();
        $counter=0;
        foreach ($medicines as $medicine){
            $medicineArray[$medicine->id]=$medicine->medicine_name;
            $medicineID[$counter]=$medicine->id;
            $counter++;
        }
        $stores=DB::table('stores')->whereIn('medicine_id',$medicineID)->paginate(10);
        return view('StoreTable.viewAllStores',compact('stores','medicineArray'));
    }

    //edit store
    public function editStore($id){
        $medicines=Medicine::all();
        $store=Store::all()->find($id);
        //find medicine name of the editted medicine store -> in array
        $currentMedicine=(Medicine::where('id', $store->medicine_id)->pluck('medicine_name'))[0];
        return view('StoreTable.editStore',compact('medicines','store','currentMedicine'));
    }
    public function updateStore($id, Request $request){
        $this->storeValidation($request);

        $store=Store::all()->find($id);
        $store->store_expire=Request('store_expire');
        $store->medicine_id=Request('store_medicine_name');
        $store->save();
        return redirect('/allStores');
    }

    //delete store
    public function deleteStore($id){
        $store=Store::all()->find($id);
        $store->delete();
        return redirect('/allStores');
    }

//end Store table operations
}
