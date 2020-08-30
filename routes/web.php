<?php

use Illuminate\Support\Facades\Route;

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
Route::view('/','home');


Route::get('contact','ContactFormController@create')->name('contact.create');
Route::post('contact','ContactFormController@store')->name('contact.store');
Route::view('aboutUs', 'about');
//->middleware('test');
//
//Route::get('customer','CustomerController@index');
//Route::get('customers/create','CustomerController@create');
//Route::post('customer','CustomerController@store');
//Route::get('customers/{customer}','CustomerController@show');
//Route::get('customers/{customer}/edit','CustomerController@edit');
//Route::delete('customers/{customer}','CustomerController@destroy');
//Route::patch('customers/{customer}','CustomerController@update');

Route::resource('customers','CustomerController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*
 * we can use the middleware method to prevent an authorized user to show data
 * ->middleware('auth')
 * */
