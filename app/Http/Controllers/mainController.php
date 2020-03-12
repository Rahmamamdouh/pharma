<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class mainController extends Controller
{
	//public function insertform(){
	//return view('checkout');
	//} 
	public function insert(Request $request){
	$customer_firstname = $request->input('customer_firstname');
	$customer_lastname = $request->input('customer_lastname');
	$customer_phone = $request->input('customer_phone');
	$data=array('customer_firstname'=>$customer_firstname,"customer_lastname"=>$customer_lastname,"customer_phone"=>$customer_phone);
	DB::table('customers')->insert($data);
	}
}
