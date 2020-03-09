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
      protected function redirectTo()
      {
          if(Auth::user()->usertype == 'admin')
          {
            return 'MedicineTable.addNewMedicine';  
          }
          else
          {
             return 'pharmaIndex';   
          }
      }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        //user&admin&pharmacist login:
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->usertype == 'admin') {
              // return redirect()->route('\newMedicine');
              // return redirect(MedicineTable.addNewMedicine);
             // return 'MedicineTable.addNewMedicine'; 
        $pharmacists=DB::table('pharmacists')->paginate(10);
            return view('PharmacistTable.viewAllPharmacists',compact('pharmacists'));
        
             }elseif (auth()->user()->usertype == 'pharmacist'){
                 $types=Type::all();
                 
             return view('MedicineTable.addNewMedicine',compact('types'));
            } else {
               // return redirect()->route('index');
                //DONE
                //return redirect('index');
                //return 'pharmaIndex';
                $medicines=Medicine::all();
             return view('pharmaIndex',compact('medicines'));
                    
            
          // } else {
          // return redirect()->route('login')
           //   ->with('error', 'Email-Address And Password Are Wrong.');
        //}
        

                    }
    
    

        }   
}
}

