<?php
namespace App\Http\Controllers;
use Image;
use Illuminate\Http\Request;
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

class customerController extends Controller
{
    //start Customer table operations

    //validation
    public function customerValidation($request){
        $this->validate($request,[
            'customer_firstname'=>'required|regex:/^[a-z]+$/i|between:2,30',
            'customer_lastname'=>'required|regex:/^[a-z]+$/i|min:2|max:30',
            'customer_city'=>'required|regex:/^[a-z]+$/i|min:2|max:30',
            'customer_street'=>'required|min:2|max:50',
            'customer_phone'=>'required|numeric|digits:11',
        ],[
            //custom messages
        ]);
    }

    //add new customer
    public function addNewCustomer(){
        return view('CustomerTable.addNewCustomer');
    }
    public function saveNewCustomer(Request $request){
        $this->customerValidation($request);

        $customer=new Customer(); 
        $customer->customer_firstname=Request('customer_firstname');
        $customer->customer_lastname=Request('customer_lastname');
        $customer->customer_city=Request('customer_city');
        $customer->customer_street=Request('customer_street');
        $customer->customer_phone=Request('customer_phone');
        $customer->save();
        return redirect('/allCustomers');
    }

    //view all customers
    public function allCustomers(){
        $customers=DB::table('customers')->paginate(10);
        return view('CustomerTable.viewAllCustomers',compact('customers'));
    }

    //edit customer
    public function editCustomer($id){
        $customer = Customer::all()->find($id);
        return view('CustomerTable.editCustomer',compact('customer'));
    }
    public function updateCustomer($id, Request $request){
        $this->customerValidation($request);

        $customer = customer::all()->find($id);
        $customer->customer_firstname = Request('customer_firstname');
        $customer->customer_lastname = Request('customer_lastname');
        $customer->customer_city = Request('customer_city');
        $customer->customer_street = Request('customer_street');
        $customer->customer_phone = Request('customer_phone');
        $customer->save();
        return redirect('/allCustomers');
    }

    //delete customer
    public function deleteCustomer($id){
        $customer = Customer::all()->find($id);
        $customer->delete();
        return redirect('/allCustomers');
    }

    //end Customer table operations

}