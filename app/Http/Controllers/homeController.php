<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{

public function welcome(){
		
		return view('welcome');

	}


public function about(){
		
		return view('pharmaAbout');

	}
	
	public function cart(){
		
		return view('pharmaCart');

	}
	
	public function checkout(){
		
		return view('pharmaCheckout');

	}
	
	public function contact(){
		
		return view('pharmaContact');

	}
	
	public function index(){
		
		 return view('pharmaIndex');

	}
	
}