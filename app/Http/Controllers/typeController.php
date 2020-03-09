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

class typeController extends Controller
{
    //start Type table operations

    //validation
    public function typeValidation($request){
        $this->validate($request,[
            'type_name'=>'required|regex:/^[a-z]+( [a-z]+)?$/i|unique:types,type_name',
        ],[
            //cutom messages.
        ]);
    }

    //add new type
    public function addNewType(){
        return view('TypeTable.addNewType');
    }
    public function saveNewType(Request $request){
        $this->typeValidation($request);

        $type=new Type(); 
        $type->type_name=Request('type_name');
        $type->save();
        return redirect('/allTypes');
    }

    //view all types
    public function allTypes(){
        $types=DB::table('types')->paginate(10);
        return view('TypeTable.viewAllTypes',compact('types'));
    }

    //edit type
    public function editType($id){
        $type=Type::all()->find($id);
        return view('TypeTable.editType',compact('type'));
    }
    public function updateType($id, Request $request){
        $this->typeValidation($request);

        $type=Type::all()->find($id);
        $type->type_name=Request('type_name');
        $type->save();
        return redirect('/allTypes');
    }

    //delete type
    public function deleteType($id){
        $type=Type::all()->find($id);
        $type->delete();
        return redirect('/allTypes');
    }

    //end Type table operations
}
