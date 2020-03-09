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

class pharmacistController extends Controller
{
    //start Pharmacist table operations

    //validation
    public function pharmacistValidation($request){
        $this->validate($request,[
            'pharmacist_firstname'=>'required|regex:/^[a-z]+$/i|between:2,30',
            'pharmacist_lastname'=>'required|regex:/^[a-z]+$/i|min:2|max:30',
            'pharmacist_email'=>'required|email',
            'pharmacist_salary'=>'required|numeric',
            'pharmacist_startjob'=>'required',
            'pharmacist_city'=>'required|regex:/^[a-z]+$/i|min:2|max:30',
            'pharmacist_street'=>'required|min:2|max:50',
            'pharmacist_phone'=>'required|numeric|digits:11',
        ],[
            //custom messages
        ]);
    }

    //add new pharmacist
    public function addNewPharmacist(){
        return view('PharmacistTable.addNewPharmacist');
    }
    public function saveNewPharmacist(Request $request){
        $this->pharmacistValidation($request);

        $pharmacist=new Pharmacist();
        $pharmacist->pharmacist_firstname=Request('pharmacist_firstname');
        $pharmacist->pharmacist_lastname=Request('pharmacist_lastname');
        $pharmacist->pharmacist_salary=Request('pharmacist_salary');
        $pharmacist->pharmacist_startjob=Request('pharmacist_startjob');
        $pharmacist->pharmacist_city=Request('pharmacist_city');
        $pharmacist->pharmacist_street=Request('pharmacist_street');
        $pharmacist->pharmacist_phone=Request('pharmacist_phone');
        $pharmacist->pharmacist_email=Request('pharmacist_email');
        $pharmacist->save();
        return redirect('/allPharmacists');
    }

    //view all pharmacists
    public function allPharmacists(){
        $pharmacists=DB::table('pharmacists')->paginate(10);
        return view('PharmacistTable.viewAllPharmacists',compact('pharmacists'));
    }

    //edit pharmacist
    public function editPharmacist($id){
        $pharmacist=Pharmacist::all()->find($id);
        return view('PharmacistTable.editPharmacist',compact('pharmacist'));
    }
    public function updatePharmacist($id, Request $request){
        $this->pharmacistValidation($request);

        $pharmacist=Pharmacist::all()->find($id);
        $pharmacist->pharmacist_firstname=Request('pharmacist_firstname');
        $pharmacist->pharmacist_lastname=Request('pharmacist_lastname');
        $pharmacist->pharmacist_salary=Request('pharmacist_salary');
        $pharmacist->pharmacist_startjob=Request('pharmacist_startjob');
        $pharmacist->pharmacist_city=Request('pharmacist_city');
        $pharmacist->pharmacist_street=Request('pharmacist_street');
        $pharmacist->pharmacist_phone=Request('pharmacist_phone');
        $pharmacist->pharmacist_email=Request('pharmacist_email');
        $pharmacist->save();
        return redirect('/allPharmacists');
    }

    //delete pharmacist
    public function deletePharmacist($id){
        $pharmacist = Pharmacist::all()->find($id);
        $pharmacist->delete();
        return redirect('/allPharmacists');
    }

//end Pharmacist table operations
}
