<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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
use App\Cart;
use App\Deliverylist;
use DB;

class pharmaController extends Controller
{
	
    public function about(){
		return view('pharmaAbout');
	}

	public function index(){
		$medicines=Medicine::all();
		return view('pharmaIndex',compact('medicines'));
	}

	public function thankyou(){
		return view('thankyou');
	}
	
	public function logout(){
		return view('pharmaIndex');
	}

	public function service(){
		return view('pharmaService');
	}
	
	public function shopSingle($id){
		$medicine=Medicine::find($id);	
		return view('pharmaShopSingle',compact('medicine'));
	}

	public function store(){
		$medicines=DB::table('medicines')->where('medicine_totalamount','>',0)->paginate(9);
		return view('pharmaStore',compact('medicines'));
	}

	public function azOrder(){
		$medicines=Medicine::orderBy('medicine_name')->where('medicine_totalamount','>',0)->paginate(9);
		return view('pharmaStore',compact('medicines'));
	}

	public function zaOrder(){
		$medicines=Medicine::orderBy('medicine_name', 'desc')->where('medicine_totalamount','>',0)->paginate(9);
		return view('pharmaStore',compact('medicines'));
	}

	public function lowhighPrice(){
		$medicines=Medicine::orderBy('medicine_price')->where('medicine_totalamount','>',0)->paginate(9);
		return view('pharmaStore',compact('medicines'));
	}

	public function highlowPrice(){
		$medicines=Medicine::orderBy('medicine_price', 'desc')->where('medicine_totalamount','>',0)->paginate(9);	
		return view('pharmaStore',compact('medicines'));
	}

	public function checkout(){
		//check if there is enough medicine quantity in store
		$carts=Cart::all();
		$flag='false';
		$message='';
        foreach ($carts as $cart){
        	$MedicineQuantity=$cart->cart_quantity;
        	$singleMedicineID=$cart->medicine_id;
            $medicineName=(Medicine::all()->where('id', $singleMedicineID)->pluck('medicine_name'))[0];
	        $medicinesQuantityInStore=Store::where('medicine_id',$singleMedicineID)->count();
	        if($medicinesQuantityInStore<$MedicineQuantity){
	        	$flag='true';
	        	$message.=$medicineName.' available quantity is:  '.$medicinesQuantityInStore.'. ,';
	        }
        }
        if($flag=='true'){
        	return back()->with('warning', $message);
        }

		return view('pharmaCheckout');
	}

	//validation
    public function customerValidation($request){
        $this->validate($request,[
            'customer_firstname'=>'required|regex:/^[a-z]+$/i|between:2,30',
            'customer_lastname'=>'required|regex:/^[a-z]+$/i|between:2,30',
            'customer_city'=>'required|regex:/^[a-z]+$/i|between:2,30',
            'customer_street'=>'required|between:2,50',
            'customer_phone'=>'required|numeric|digits:11',
        ],[
            'customer_firstname.required'=>'This field is required.',
            'customer_firstname.regex'=>'Invalid format.',
            'customer_firstname.between'=>'Firstname must be between 2 and 30 characters..',

            'customer_lastname.required'=>'This field is required.',
            'customer_lastname.regex'=>'Invalid format.',
            'customer_lastname.between'=>'Lastname must be between 2 and 30 characters..',

            'customer_city.required'=>'This field is required.',
            'customer_city.regex'=>'Invalid format.',
            'customer_city.between'=>'City must be between 2 and 30 characters..',

            'customer_street.required'=>'This field is required.',
            'customer_street.regex'=>'Invalid format.',
            'customer_street.between'=>'Street must be between 2 and 50 characters..',

            'customer_phone.required'=>'This field is required.',
            'customer_phone.numeric'=>'Mobile must be a number.',
            'customer_phone.digits'=>'Mobile must be 11 digits.',
        ]);
    }

	//insert delivery data--> customer, delivery and deliverylist
	public function insertDelivery(Request $request){
		$this->customerValidation($request);

		//save customer data into database
		$customer=new Customer();
		$customer->customer_firstname=Request('customer_firstname');
		$customer->customer_lastname=Request('customer_lastname');
		$customer->customer_city=Request('customer_city');
		$customer->customer_street=Request('customer_street');
		$customer->customer_phone=Request('customer_phone');
		$customer->save();

		//save delivery data into database
		//customer id
		$lastRowOfCustomerTable=Customer::orderBy('id', 'desc')->first()->id;
		//calculate total cart price
		$totalPrice=DB::table('carts')->pluck('cart_total_price')->sum();
		$delivery=new Delivery(); 
        $delivery->delivery_date=date('Y-m-d');
        //hours:minutes:seconds
        $delivery->delivery_time=date('H:i:s');
        //save phramacist id if time is before midnight and after 6am
        if(!(date('H')>"00" && date('H')<"06")){
	        //pharmacist log in id
			$pharmacistLoginID=Auth::id();
			//if no pharmacist is logged into system through work hours
			if($pharmacistLoginID!='null'){
				//pharmacist id
				$pharmacistID=(DB::table('pharmacists')->where('user_id',$pharmacistLoginID)->pluck('id'))[0];
		        $delivery->pharmacist_id=$pharmacistID;
	    	}
        }
        $delivery->customer_id=$lastRowOfCustomerTable;
        $delivery->delivery_totalprice=$totalPrice;
        $delivery->save();

        //save medicines from cart into deliverylist
        $carts=Cart::all();
        //delivery id
		$lastRowOfDeliveryTable=Delivery::orderBy('id', 'desc')->first()->id;

		$counter=0;
        foreach ($carts as $cart){
        	$quantity=$cart->cart_quantity;
        	//store medicine name and quantity in array
            $medicineName=(Medicine::all()->where('id', $cart->medicine_id)->pluck('medicine_name'))[0];
            $list[$counter]=$medicineName.'->'.$quantity;
        	while ($quantity>0){
	        	$deliverylist=new Deliverylist();
	            //save medicine id as foriegn key in deliverylist table
	            $deliverylist->medicine_id=$cart->medicine_id;
	            //save sale id as foriegn key in deliverylist table
	            $deliverylist->delivery_id=$lastRowOfDeliveryTable;
	            //save store id in deliverylist table
	            $store=Store::where('medicine_id',$cart->medicine_id)->pluck('id')->first();
	            $deliverylist->store_id=$store;
	            $deliverylist->save();
	            //delete bought medicines from store
	            $delFromStore=Store::where('medicine_id',$cart->medicine_id)->first();
	            // $delFromStore->delete();
	            $quantity--;
        	}
        	$counter++;
        }

        //convert array into a single string
        $delivery_list_array=implode(",",$list);
        //update list column in deliveries table
        $delivery=DB::table('deliveries')->where('id',$lastRowOfDeliveryTable)->update(['delivery_list'=>$delivery_list_array]);

        //empty cart for next order
        DB::table('carts')->delete();
        
		return redirect('/thankyou');
	}

	public function priceRangeFilter(Request $request){
		//medicine price range
		$minimum_range=$request->get('minimum_range');
		$maximum_range=$request->get('maximum_range');
		if($minimum_range==0 && $maximum_range==5000){
			$medicines=DB::table('medicines')->where('medicine_totalamount','>',0)->paginate(9);
		}
		else{
			$medicines=DB::table('medicines')->where('medicine_price','<=',$maximum_range)->where('medicine_price','>=',$minimum_range)->where('medicine_totalamount','>',0)->get();
		}
		//templete for medicines
		$html=$this->tembleteStore($medicines);
      	//return result
		return response()->json($html);
	}

	public function cart(){
        $medicines=Medicine::all();
        //save medicine name and image into associative array
        $medicineArray=array();
        foreach ($medicines as $medicine){
        	$medicineName=$medicine->medicine_name;
        	$medicineImage=$medicine->medicine_image;
        	$medicineArray[$medicine->id]=['name'=>$medicineName,'image'=>$medicineImage];
        }
        $carts=Cart::all();
        $numberOfItemsInCart=DB::table('carts')->count();
        //calculate total cart price
        $totalPrice=DB::table('carts')->pluck('cart_total_price')->sum();
		return view('pharmaCart',compact('carts','medicines','medicineArray','totalPrice','numberOfItemsInCart'));
	}

	//delete medicine from cart
	public function deleteFromCart($id){
		$cart=Cart::find($id);
        $cart->delete();
        return redirect('/cart');
	}

	//delete all medicines from cart
	public function emptyCart(){
		DB::table('carts')->delete();
        return redirect('/cart');
	}

	//cart counter
	public function cartItems(Request $request){
		//highest price
		// $maxPrice=Medicine::orderBy('medicine_price','desc')->pluck('medicine_price')->first();
		//number of medicines in cart
		$carts=DB::table('carts')->count();
		//return result
		return response()->json($carts);
	}

	//search in store
	public function filteredMedicines(Request $request){
		//key letters
        $letters=$request->get('letters');
        $storeORcart=$request->get('storeORcart');
        //if search bar is empty-->return form to its original shape
        if($letters=='' && $storeORcart=='store'){
        	$medicines=DB::table('medicines')->where('medicine_totalamount','>',0)->paginate(9);
        	$html=$this->tembleteStore($medicines);
			return response()->json($html);
        }
        //table temblete
        if($storeORcart=='store'){
        	//find medicines in store
        	$medicines=Medicine::where('medicine_name','LIKE','%'.$letters.'%')->where('medicine_totalamount','>',0)->get();
        	$html=$this->tembleteStore($medicines);
    	}
    	else{
    		//find medicines from store in cart
    		//medicine-->id
        	$medicines=Medicine::where('medicine_name','LIKE','%'.$letters.'%')->pluck('id');
        	//cart-->medicine_id
        	$filteredMedicines=Cart::whereIn('medicine_id',$medicines)->get();
    		$html=$this->tembleteCart($filteredMedicines);
    	}
        //return result
        return response()->json($html);
	}

	//medicine temblete in store
	public function tembleteStore($medicines){
		$counter=0;
		$html='<div class="container"><div class="row">';
		foreach($medicines as $medicine){
	        $html.='<div class="col-sm-4 col-lg-4 text-center item mb-4">';
	        $html.='<div class="row">';
	        $html.='<img src="/img/'.$medicine->medicine_image.'" alt="Image" height="400px">';
	        $html.='</div>';
	        $html.='<div class="row">';
	        $html.='<h3 class="text-dark">'.$medicine->medicine_name.'</h3>';
	        $html.='</div>';
	        $html.='<div class="row">';
	        $html.='<p class="price">'.$medicine->medicine_price.' L.E</p>';
	        $html.='</div>';
	        $html.='<div class="row">';
	        $html.='<div class="popup" onclick="popupMessageSearch(this)"><button class="btn btn-warning px-4 py-3" onclick="addToCart('.$medicine->id.')">Add To Cart</button>';
	        $html.='<span class="popuptext" id="myPopup'.$counter.'">Added To Cart!</span>';
	        $html.='</div>';
	        $html.='<a href="/shopSingle/'.$medicine->id.'" class="btn btn-primary px-4 py-3">Show</a>';
	        $html.='</div>';
	        $html.='</div>';
	        $counter++;
      	}
      	$html.='</div></div>';
      	return $html;
	}    

	//medicine temblete in cart
	public function tembleteCart($medicinesInCart){
		$medicines=Medicine::all();
        $medicineArray=array();
        foreach ($medicines as $medicine){
        	$medicineName=$medicine->medicine_name;
        	$medicineImage=$medicine->medicine_image;
        	$medicineArray[$medicine->id]=['name'=>$medicineName,'image'=>$medicineImage];
        }
		$html='';
		foreach($medicinesInCart as $cart){
	        $html.='<tr>';
	        $html.='<td class="product-thumbnail">';
	        $html.='<img src="/img/'.$medicineArray[((int)$cart->medicine_id)]['image'].'" alt="Image" class="img-fluid">';
	        $html.='</td>';
	        $html.='<td class="product-name">';
	        $html.='<h2 class="h5 text-black">'.$medicineArray[((int)$cart->medicine_id)]['name'].'</h2>';
	        $html.='</td>';
	        $html.='<td>'.$cart->cart_single_price.'</td>';
	        $html.='<td>';
	        $html.='<div class="input-group mb-3" style="max-width: 120px;">';
	        $html.='<div class="input-group-prepend">';
	        $html.='<button class="btn btn-outline-primary js-btn-minus" type="button" onclick="minus(this)">&minus;</button>';
	        $html.='</div>';
	        $html.='<input type="text" class="form-control text-center onchange" value="'.$cart->cart_quantity.'" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">';
	        $html.='<div class="input-group-append">';
	        $html.='<button class="btn btn-outline-primary js-btn-plus" type="button" onclick="plus(this)">&plus;</button>';
	        $html.='</div>';
	        $html.='</div>';
	        $html.='</td>';
	        $html.='<td>'.$cart->cart_total_price.'</td>';
	        $html.='<td>';
	        $html.='<a href="/deleteFromCart/'.$cart->id.'" class="btn btn-danger">X</a>';
	        $html.='</td>';
	        $html.='</tr>';
    	}
    	return $html;
	}

	//add medicines to cart table
	public function addNewItemToCart(Request $request){
		//medicine id
		$id=$request->get('medicineID');
		//check if medicine exist in cart
		$ifMedicineInCart=DB::table('carts')->where('medicine_id','=',$id)->count();
		//medicine doesn't exist in cart
		if($ifMedicineInCart==0){
			//get medicine price from medicine table
			$medicinePrice=(Medicine::where('id','=',$id)->pluck('medicine_price'))[0];
			//save medicine into cart
			$cart=new Cart();
			$cart->medicine_id=$id;
			$cart->cart_quantity=1;
			$cart->cart_single_price=$medicinePrice;
			$cart->cart_total_price=($cart->cart_quantity)*$medicinePrice;
			$cart->save();
		}
		//medicine exist in cart
		else{
			//add to medicine quantity and update total price
			$this->CartQuantity($id,'plus');
		}
		//return total medicine quantity in cart
		$carts=DB::table('carts')->count();
		return response()->json($carts);
	}

	//update cart
	public function updateCart(Request $request){
		//medicine current quantity
		$quantity=$request->get('quantity');
		//medicine name that changed his quantity
		$medicineName=$request->get('medicineName');
		//remove or add to quantity
		$minusORplus=$request->get('minusORplus');
		//get medicine ID from medicine table using medicine name
		$medicineID=(Medicine::where('medicine_name',$medicineName)->pluck('id'))[0];
		//remove from medicine quantity
		if($minusORplus=='minus'){
			$currentQuantity=$quantity-1;
			//if current quantity is more than one -- add to medicine quantity
			if($currentQuantity>=1){
				$medicineTotalPrice=$this->CartQuantity($medicineID,'minus');
			}
		}
		//add to medicine quantity
		else{
			$currentQuantity=$quantity+1;
			$medicineTotalPrice=$this->CartQuantity($medicineID,'plus');	
		}
		//calculate total cart price
		$totalPrice=DB::table('carts')->pluck('cart_total_price')->sum();
		//return result
		$response=[
		    'totalPrice' => $totalPrice,
		    'medicineTotalPrice' => $medicineTotalPrice
		];
		return response()->json($response);
		// return response()->json($medicineTotalPrice);
	}
	public function CartQuantity($medicineID,$minusORplus){
		//get current quantity from cart table
		$cart=DB::table('carts')->where('medicine_id','=',$medicineID)->pluck('cart_quantity');
		//remove from medicine quantity
		if($minusORplus=='minus'){
			$cart=DB::table('carts')->where('medicine_id','=',$medicineID)->update(['cart_quantity'=>$cart[0]-1]);
		}
		//add to medicine quantity
		else{
			$cart=DB::table('carts')->where('medicine_id','=',$medicineID)->update(['cart_quantity'=>$cart[0]+1]);
		}
		//get updatted quantity from cart table
		$currentQuantity=DB::table('carts')->where('medicine_id','=',$medicineID)->pluck('cart_quantity');
		//get medicine price from cart table
		$medicinePrice=DB::table('carts')->where('medicine_id','=',$medicineID)->pluck('cart_single_price');
		//calculate then update medicine total price
		$medicineTotalPrice=$currentQuantity[0]*$medicinePrice[0];
		$current=DB::table('carts')->where('medicine_id','=',$medicineID)->update(['cart_total_price'=>$medicineTotalPrice]);
		//return result
		return $medicineTotalPrice;
	}

}