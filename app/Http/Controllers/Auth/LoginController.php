<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Medicine;
use App\Type;
use App\Pharmacist;
use App\Store;
use DB;
//Auth::logout();

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  //protected $redirectTo = RouteServiceProvider::HOME;

  /**
   * Create a new controller instance.
   *
   * @return void
   */

  public function __construct(){
      $this->middleware('guest')->except('logout');
  }

  public function login(Request $request){
    $input=$request->all();
    $this->validate($request, [
      'email'=>'required|email',
      'password'=>'required',
    ]);

    //actors login:
    //actors:user, pharmacist and manager
    if (auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password']))){
      if (auth()->user()->usertype=='admin'){
        return redirect('/allPharmacists');
      }
      elseif (auth()->user()->usertype=='pharmacist'){
        return redirect('/allMedicines');
      } 
      else{
        return redirect('/store');
      }
    }   
  }
}
