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
Route::get('/index','homeController@index');
Route::get('/about','customerController@about');
Route::get('/cart','customerController@cart');
Route::get('/checkout','customerController@checkout');
Route::get('/contact','customerController@contact');
Route::get('/index','customerController@index');
Route::get('/store','customerController@store');

Route::get('/thankyou','customerController@thankyou');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
