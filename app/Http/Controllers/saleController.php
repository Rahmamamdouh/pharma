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
use App\Salelist;
use DB;

class saleController extends Controller
{
    //start Sale table operations

    //validation
    public function saleValidation($request){
        $this->validate($request,[
            'sale_date'=>'required',
            'sale_time'=>'required',
            'sale_pharmacist'=>'required|exists:pharmacists,id',
        ],[
            'sale_pharmacist.exists'=>'The selected pharmacist is invalid.',
        ]);
    }
    public function newMedicineValidation($request, $counter){
        $this->validate($request,[
            'sale_medicine'.$counter=>'required|exists:medicines,id',
            'medicine_quantity'.$counter=>'required|numeric',
        ],[
            'sale_medicine'.$counter.'.required'=>'Medicine field is required.',
            'sale_medicine'.$counter.'.exists'=>'The selected medicine is invalid.',
            'medicine_quantity'.$counter.'.required'=>'Medicine Quantity field is required.',
            'medicine_quantity'.$counter.'.numeric'=>'Quantity must be numeric.', 
        ]);
    }
    public function saleEdit($request){
        $this->validate($request,[
            'sale_totalprice'=>'required|numeric',
            'sale_list'=>'required',
        ],[
            'sale_totalprice.required'=>'This field is required.',
            'sale_totalprice.numeric'=>'Total price must be numeric.',
            'sale_list.required'=>'This field is required.',
        ]);
    }

    //add new sale
    public function addNewSale(){
        $medicines=Medicine::all();
        $pharmacists=Pharmacist::all();
        return view('SaleTable.addNewSale',compact('pharmacists','medicines'));
    }
    public function saveNewSale(Request $request){
        $x=0;
        while(Request('sale_medicine'.$x)){
            //validation for each medicine field
            $this->newMedicineValidation($request, $x);
            $x++;
        }
        
        $this->saleValidation($request);

        $counter=0;
        $list=array();
        while(Request('sale_medicine'.$counter)){
            //sold medicine->id
            $singleMedicineID=Request('sale_medicine'.$counter);
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
        $sale_list_array=implode(",",$list);

        $sale=new Sale();
        $sale->sale_date=Request('sale_date');
        $sale->sale_time=Request('sale_time');
        $sale->pharmacist_id=Request('sale_pharmacist');
        $sale->sale_totalprice=0;
        $sale->sale_list=$sale_list_array;
        $sale->save();

        $totalprice=0;
        //ID of last previous sale operation
        $lastRowOfSaleTable=Sale::orderBy('id', 'desc')->first()->id;
        $counter=0;
        //True-> new medicine
        while(Request('sale_medicine'.$counter)){
            //sold medicine->id
            $singleMedicineID=Request('sale_medicine'.$counter);
            $MedicineQuantity=Request('medicine_quantity'.$counter);
            while($MedicineQuantity>0){
                //medicine:1 -> store:2
                //get store->id from store table using sold medicine->id as foriegn key
                $medicineStore=Store::where('medicine_id', $singleMedicineID)->first()->id;
                $salelist=new Salelist();
                //save medicine id as foriegn key in salelist table
                $salelist->medicine_id=$singleMedicineID;
                //save store id as foriegn key in salelist table
                $salelist->store_id=$medicineStore;
                //save sale id as foriegn key in salelist table
                $salelist->sale_id=$lastRowOfSaleTable;
                $salelist->save();

                $MedicineQuantity--;
                //get medicine price
                $medicinePrice=Medicine::all()->where('id', $singleMedicineID)->first()->medicine_price;
                $totalprice+=$medicinePrice;

                $store=Store::all()->find($medicineStore);
                $store->delete();
            }
            $counter++;
        } 
        //update totalprice column in sales table
        $sale=DB::table('sales')->where('id',$lastRowOfSaleTable)->update(['sale_totalprice'=>$totalprice]);

        return redirect('/allSales');
    }

    //view all sales
    public function allSales(){
        $pharmacists=Pharmacist::all();
        $pharmacistName=array();
        foreach ($pharmacists as $pharmacist){
            $firstname=$pharmacist->pharmacist_firstname;
            $lastname=$pharmacist->pharmacist_lastname;
            $pharmacistName[$pharmacist->id]=[1=>$firstname,2=>$lastname];
        }

        $sales=DB::table('sales')->paginate(10);
        return view('SaleTable.viewAllSales',compact('sales','pharmacistName'));
    }

    //edit sale
    public function editSale($id){
        $sale=Sale::all()->find($id);
        //Pharmacist
        $pharmacists=Pharmacist::all();
        //pharmacist first name in array
        $currentPharmacistFirstName=(Pharmacist::all()->where('id', $sale->pharmacist_id)->pluck('pharmacist_firstname'))[0];
        //pharmacist last name in array
        $currentPharmacistLastName=(Pharmacist::all()->where('id', $sale->pharmacist_id)->pluck('pharmacist_lastname'))[0];
        $currentPharmacistName=$currentPharmacistFirstName.' '.$currentPharmacistLastName;

        return view('SaleTable.editSale',compact('sale','pharmacists','currentPharmacistName'));
    }
    public function updateSale($id, Request $request){
        $this->saleValidation($request);
        $this->saleEdit($request);

        $sale=Sale::all()->find($id);
        $sale->sale_date=Request('sale_date');
        $sale->sale_time=Request('sale_time');
        $sale->pharmacist_id=Request('sale_pharmacist');
        $sale->sale_totalprice=Request('sale_totalprice');
        $sale->sale_list=Request('sale_list');
        $sale->save();
        return redirect('/allSales');
    }

    //delete sale
    public function deleteSale($id){
        $sale=Sale::all()->find($id);
        $sale->delete();
        return redirect('/allSales');
    }

    //end Sale table operations
}
