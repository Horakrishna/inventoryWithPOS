<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|------------      --------------------------------------------------------------
|  
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { 
    return view('welcome');
});
//Admin Route

/*=========================
		Admin Route
===========================*/

/*=========================
	supplier Route start
===========================*/
Route::get('/supplier/add-supplier',[
	'uses' =>'SupplierController@index',
	'as'   =>'add-supplier'
]);
Route::get('/supplier/manage-supplier',[
	'uses' =>'SupplierController@manageSupplierInfo',
	'as'   =>'manage-supplier'
]);
Route::get('/supplier/view-supplier/{id}',[
	'uses' =>'SupplierController@viewSupplierInfo',
	'as'   =>'view-supplier'
]);
Route::post('/supplier/new-supplier',[
	'uses' =>'SupplierController@saveSupplierInfo',
	'as'   =>'new-supplier'
]);
Route::get('/supplier/search-supplier',[
	'uses'=>'SupplierController@searchSupplier',
	'as'  =>'search-supplier'
]);

Route::get('/supplier/edit-supplier/{id}',[
	'uses'=>'SupplierController@editSupplierInfo',
	'as'  =>'edit-supplier'
]);

Route::post('/supplier/update-supplier',[
	'uses'=>'SupplierController@updateSupplierInfo',
	'as'  =>'update-supplier'
]);
Route::post('/supplier/delete-supplier',[
	'uses'=>'SupplierController@deleteSupplierInfo',
	'as'  =>'delete-supplier'
]);
/*=========================
	supplier Route End
===========================*/
Route::get('/employee/add-employee',[
	'uses' =>'EmployeeController@index',
	'as'   =>'add-employee'
]);
Route::get('/employee/manage-employee',[
	'uses' =>'EmployeeController@manageEmployee',
	'as'   =>'manage-employee'
]);
Route::get('/employee/edit-employee/{id}',[
	'uses' =>'EmployeeController@editEmployeeInfo',
	'as'   =>'edit-employee'
]);
Route::post('/employee/new-employee',[
	'uses' =>'EmployeeController@saveEmployeeInfo',
	'as'   =>'new-employee'
]);
/*=========================
	Employee Route start
===========================*/

/*=========================
	Employee Route End
===========================*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
