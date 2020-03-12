<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

class medicineController extends Controller
{
    //start Medicine table operations

    //validation
    public function medicineValidation($request){
        $this->validate($request,[
            'medicine_name'=>'required|min:2|max:35',
            // 'medicine_ac'=>'';
            'medicine_companyname'=>'required|min:2|max:50',
            'medicine_price'=>'required|numeric',
            'medicine_type'=>'required|exists:types,id',
            'medicine_description'=>'required',
            'medicine_image'=>'required|max:10000|image'
        ],[
            'medicine_name.required'=>'Medicine name field is required.',
            'medicine_name.min'=>'Medicine name must be at least 2 characters.',
            'medicine_name.max'=>'Medicine name may not be greater than 35 characters.',

            'medicine_companyname.required'=>'Company name field is required.',
            'medicine_companyname.min'=>'Company name must be at least 2 characters.',
            'medicine_companyname.max'=>'Company name may not be greater than 50 characters.',

            'medicine_price.required'=>'Price field is required.',
            'medicine_price.numeric'=>'Price must be numeric.',

            'medicine_type.exists'=>'The selected type is invalid.',

            'medicine_description.required'=>'Description field is required.',

            'medicine_image.required'=>'Image field is required.',
            'medicine_image.max'=>'Image may not be greater than 10000kb.',
            'medicine_image.image'=>'Image extention must be jpg or png.',
        ]);
    } 

	//add new medicine
	public function addNewMedicine(){
    	$types=Type::all();
        return view('MedicineTable.addNewMedicine',compact('types'));
    }
    public function saveNewMedicine(Request $request){
        $this->medicineValidation($request);

    	$medicine=new Medicine(); 
    	$medicine->medicine_name=Request('medicine_name');
        $medicine->medicine_ac=Request('medicine_ac');
    	$medicine->medicine_companyname=Request('medicine_companyname');
    	$medicine->medicine_price=Request('medicine_price');
    	$medicine->medicine_description=Request('medicine_description');
    	$medicine->type_id=Request('medicine_type');


    	$image_name=date('mdYHis').$request->file('medicine_image')->getClientOriginalName();
    	$path=base_path().'\public\img';
        $request->file('medicine_image')->move($path,$image_name);
    	$medicine->medicine_image=$image_name;

    	$medicine->save();
        return redirect('/allMedicines');
    }

    //view all medicines
	public function allMedicines(){
		//get all values from types table
        $types=Type::all();
        //declare an array
        $medicineType=array();
        //save each medicine type from types table into associative array
        foreach ($types as $type){
            $medicineType[$type->id]=$type->type_name;
        }

        //calculate each medicine total amount
        $medicines=Medicine::all();
        foreach ($medicines as $medicine){
            //total amount for each medicine in the store
            $totalMedicineAmount=Store::select(\DB::raw('COUNT(medicine_id) as amount'))->where('medicine_id',$medicine->id)->get();
            //store value into column
            $medicine->medicine_totalamount=$totalMedicineAmount[0]->amount;
            //save column into database
            $medicine->save();
        }
        $medicines=DB::table('medicines')->paginate(6);

        //expired medicines
        $nearlyExpiredMedicines=$this->expireMedicine();
        $nearlyExpiredMedicines_store=$nearlyExpiredMedicines['stores'];
        $nearlyExpiredMedicines_medicineArray=$nearlyExpiredMedicines['medicineArray'];

        return view('MedicineTable.viewAllMedicines',compact('medicines','medicineType','nearlyExpiredMedicines_store','nearlyExpiredMedicines_medicineArray'));
	}

    public function expiredMedicinesPage(){
        $this->expireMedicine();
        //expired medicines
        $result=$this->expireMedicine();
        $stores=$result['stores'];
        $medicineArray=$result['medicineArray'];
        return view('MedicineTable.expiredMedicinesPage',compact('stores','medicineArray'));
    }

    public function expireMedicine(){
        //current date
        $date=date('Y-m-d');
        //add 6 monthes to current date
        $compareDate=date('Y-m-d', strtotime($date. ' + 6 month'));
        // echo $compareDate;
        //6 monthes untill medicine expiry date
        $stores=Store::where('store_expire','<',$compareDate)->get();
        $arr['stores']=$stores;
        $medicines=Medicine::all();
        $counter=0;
        foreach ($medicines as $medicine){
            $medicineArray[$medicine->id]=$medicine->medicine_name;
            $counter++;
        }
        $arr['medicineArray']=$medicineArray;
        return $arr;
    }

    public function searchedMedicines(Request $request){
        //key letters
        $letters=$request->get('letters');
        //if search bar is empty-->return form to its original shape
        if($letters==''){
            $medicines=DB::table('medicines')->paginate(6);
            $html=$this->temblete($medicines);
            return response()->json($html);
        }
        //find medicines
        $filteredMedicines=Medicine::where('medicine_name','LIKE','%'.$letters.'%')->orWhere('medicine_companyname', 'LIKE', '%'.$letters.'%')->orWhere('medicine_ac', 'LIKE', '%'.$letters.'%')->get();
        //table temblete
        $html=$this->temblete($filteredMedicines);
        //return result
        return response()->json($html);
    }

    //medicine temblete
    public function temblete($filteredMedicines){
        //view medicine type
        $types=Type::all();
        $medicineType=array();
        foreach ($types as $type){
            $medicineType[$type->id]=$type->type_name;
        }
        $html='';
        foreach($filteredMedicines as $medicine){
            $html.='<tr>';
            $html.='<td>'.$medicine->medicine_name.'</td>';
            $html.='<td>'.$medicine->medicine_ac.'</td>';
            $html.='<td>'.$medicine->medicine_companyname.'</td>';
            $html.='<td>'.$medicine->medicine_price.'</td>';
            $html.='<td>'.$medicineType[((int)$medicine->type_id)].'</td>';
            $html.='<td>'.$medicine->medicine_description.'</td>';
            $html.='<td>'.$medicine->medicine_totalamount.'</td>';
            $html.='<td>';
            $html.='<img src="/img/'.$medicine->medicine_image.'" width="100px"/>';
            $html.='</td>';
            $html.='<td>';
            $html.='<a href="/deleteMedicine/'.$medicine->id.'" class="btn btn-danger">Delete</a>';
            $html.='</td>';
            $html.='<td>';
            $html.='<a href="/editMedicine/'.$medicine->id.'" class="btn btn-warning">Edit</a>';
            $html.='</td>';
            $html.='</tr>';
        }
        return $html;
    }

	//edit medicine
	public function editMedicine($id){
		$types=Type::all();
        $medicine=Medicine::find($id);
        //find type of the editted medicine and store it in array
        $currentType=(Type::where('id', $medicine->type_id)->pluck('type_name'))[0];
        return view('MedicineTable.editMedicine',compact('medicine','types','currentType'));
    }
    public function updateMedicine($id, Request $request){
        $this->medicineValidation($request);

        $medicine=Medicine::all()->find($id);
    	$medicine->medicine_name=Request('medicine_name');
        $medicine->medicine_ac=Request('medicine_ac');
    	$medicine->medicine_companyname=Request('medicine_companyname');
    	$medicine->medicine_price=Request('medicine_price');
    	$medicine->medicine_description=Request('medicine_description');
    	$medicine->type_id=Request('medicine_type');

    	$image_name=date('mdYHis').$request->file('medicine_image')->getClientOriginalName();
    	$path=base_path().'\public\img';
        $request->file('medicine_image')->move($path,$image_name);
    	$medicine->medicine_image=$image_name;

    	$medicine->save();
        return redirect('/allMedicines');
    }

    //delete medicine
    public function deleteMedicine($id){
        $medicine=Medicine::all()->find($id);
        $medicine->delete();
        return redirect('/allMedicines');
    }

    //end Medicine table operations
}
