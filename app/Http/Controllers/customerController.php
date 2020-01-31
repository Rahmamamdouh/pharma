<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class customerController extends Controller
{
    public function about(){
		return view('pharmaAbout');
	}

	public function index(){
		return view('pharmaIndex');
	}
	public function contact(){
		return view('pharmaContact');
	}
	
	public function cart(){
		return view('pharmaCart');
	}
	
	public function checkout(){
		return view('pharmaCheckout');
	}
	
	
	public function store(){
		return view('pharmaStore');
	}
	public function thankyou(){
		return view('thankyou');
	}
	
}
