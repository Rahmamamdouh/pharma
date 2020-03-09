<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','homeController@welcome');

Route::get('/login','homeController@index');
Route::get('/about','pharmaController@about');
Route::get('/cart','pharmaController@cart');
Route::get('/checkout','pharmaController@checkout');
Route::get('/contact','pharmaController@contact');
Route::get('/index','pharmaController@index');
Route::get('/store','pharmaController@store');
Route::get('/shopSingle/{id}','pharmaController@shopSingle');
Route::get('/thankyou','pharmaController@thankyou');
Route::get('/service','pharmaController@service');
//Route::get('insert','mainController@insertform');
Route::post('create','mainController@insert'); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');



//insert delivery data into customer, delivery and deliverylist tables
Route::post('/thankyou','pharmaController@insertDelivery');




//start Filtering
//From A to Z
Route::get('/a_zOrder','pharmaController@azOrder');
//From Z to A
Route::get('/z_aOrder','pharmaController@zaOrder');
//From Lowest Price to Highest
Route::get('/low_highPrice','pharmaController@lowhighPrice');
//From Highest Price to Lowest
Route::get('/high_lowPrice','pharmaController@highlowPrice');
//Price Range
Route::get('/priceRangeFilter','pharmaController@priceRangeFilter')->name('priceRange');
//end Filtering

//search in store and cart
Route::get('/filteredMedicines','pharmaController@filteredMedicines')->name('filteredMedicines');



//pass number of elements in cart
Route::get('/cartItems','pharmaController@cartItems')->name('cartItems');
//add new medicine to cart
// Route::get('/addNewItemToCart/{id}','pharmaController@addNewItemToCart');
Route::get('/addNewItemToCart','pharmaController@addNewItemToCart')->name('addNewItemToCart');
//delete medicine from cart
Route::get('/deleteFromCart/{id}','pharmaController@deleteFromCart');
//update cart
Route::get('/updateCart','pharmaController@updateCart')->name('updateCart');
//delete all medicines from cart
Route::get('/emptyCart','pharmaController@emptyCart');



//start Medicine table operations

//add new medicine
Route::get('/newMedicine', 'medicineController@addNewMedicine');
Route::post('/allMedicines', 'medicineController@saveNewMedicine');

//view all medicines
Route::get('/allMedicines', 'medicineController@allMedicines');
Route::get('/expireMedicine', 'medicineController@expireMedicine');

//search in view all medicines
Route::get('/searchedMedicines','medicineController@searchedMedicines')->name('searchedMedicines');

//edit medicine
Route::get('/editMedicine/{id}','medicineController@editMedicine');
Route::post('/editMedicine/{id}/updateMedicine','medicineController@updateMedicine');

//delete medicine
Route::get('/deleteMedicine/{id}','medicineController@deleteMedicine');

//end Medicine table operations



//start Customer table operations

//add new customer
Route::get('/newCustomer', 'customerController@addNewCustomer');
Route::post('/allCustomers', 'customerController@saveNewCustomer');

//view all customers
Route::get('/allCustomers', 'customerController@allCustomers');

//edit customer
Route::get('/editCustomer/{id}','customerController@editCustomer');
Route::post('/editCustomer/{id}/updateCustomer','customerController@updateCustomer');

//delete customer
Route::get('/deleteCustomer/{id}','customerController@deleteCustomer');

//end Customer table operations



//start Type table operations

//add new type
Route::get('/newType', 'typeController@addNewType');
Route::post('/allTypes', 'typeController@saveNewType');

//view all types
Route::get('/allTypes', 'typeController@allTypes');

//edit type
Route::get('/editType/{id}','typeController@editType');
Route::post('/editType/{id}/updateType','typeController@updateType');

//delete type
Route::get('/deleteType/{id}','typeController@deleteType');

//end Type table operations



//start Pharmacist table operations

//add new pharmacist
Route::get('/newPharmacist', 'pharmacistController@addNewPharmacist');
Route::post('/allPharmacists', 'pharmacistController@saveNewPharmacist');

//view all pharmacists
Route::get('/allPharmacists', 'pharmacistController@allPharmacists');

//edit pharmacist
Route::get('/editPharmacist/{id}','pharmacistController@editPharmacist');
Route::post('/editPharmacist/{id}/updatePharmacist','pharmacistController@updatePharmacist');

//delete pharmacist
Route::get('/deletePharmacist/{id}','pharmacistController@deletePharmacist');

//end Pharmacist table operations



//start Delivery table operations

//add new delivery
Route::get('/newDelivery', 'deliveryController@addNewDelivery');
Route::post('/allDeliveries', 'deliveryController@saveNewDelivery');

//view all deliveries
Route::get('/allDeliveries', 'deliveryController@allDeliveries');

//edit delivery
Route::get('/editDelivery/{id}','deliveryController@editDelivery');
Route::post('/editDelivery/{id}/updateDelivery','deliveryController@updateDelivery');

//delete delivery
Route::get('/deleteDelivery/{id}','deliveryController@deleteDelivery');

//end Delivery table operations



//start Sale table operations

//add new sale
Route::get('/newSale', 'saleController@addNewSale');
Route::post('/allSales', 'saleController@saveNewSale');

//view all sales
Route::get('/allSales', 'saleController@allSales');

//edit sale
Route::get('/editSale/{id}','saleController@editSale');
Route::post('/editSale/{id}/updateSale','saleController@updateSale');

//delete sale
Route::get('/deleteSale/{id}','saleController@deleteSale');

//end Sale table operations


//start Deliveryguy table operations

//add new deliveryguy
Route::get('/newDeliveryguy', 'deliveryguyController@addNewDeliveryguy');
Route::post('/allDeliveryguys', 'deliveryguyController@saveNewDeliveryguy');

//view all deliveryguys
Route::get('/allDeliveryguys', 'deliveryguyController@allDeliveryguys');

//edit deliveryguy
Route::get('/editDeliveryguy/{id}','deliveryguyController@editDeliveryguy');
Route::post('/editDeliveryguy/{id}/updateDeliveryguy','deliveryguyController@updateDeliveryguy');

//delete deliveryguy
Route::get('/deleteDeliveryguy/{id}','deliveryguyController@deleteDeliveryguy');

//end Deliveryguy table operations



//start Store table operations

//add new store
Route::get('/newStore', 'storeController@addNewStore');
Route::post('/allStores', 'storeController@saveNewStore');

//view all stores
Route::get('/allStores', 'storeController@allStores');

//edit store
Route::get('/editStore/{id}','storeController@editStore');
Route::post('/editStore/{id}/updateStore','storeController@updateStore');

//delete store
Route::get('/deleteStore/{id}','storeController@deleteStore');

//end Store table operations