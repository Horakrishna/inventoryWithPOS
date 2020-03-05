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
	Customer Route start
===========================*/
Route::get('/customer/add-customer',[
	'uses'  =>'CustomerController@index',
	'as'    =>'add-customer'
]);
Route::get('/customer/manage-customer',[
	'uses'  =>'CustomerController@manageCustomer',
	'as'    =>'manage-customer'
]);
Route::post('/customer/new-customer',[
	'uses' =>'CustomerController@saveCustomerInfo',
	'as'   =>'new-customer'
]);
Route::get('/customer/edit-customer/{id}',[
	'uses' =>'CustomerController@editCustomer',
	'as'   =>'edit-customer'
]);
Route::post('/customer/update-customer',[
	'uses' =>'CustomerController@updateCustomer',
	'as'   =>'update-customer'
]);
Route::post('/customer/delete-customer',[
	'uses' =>'CustomerController@deleteCustomer',
	'as'   =>'delete-customer'
]);
/*=========================
	Customer Route End
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
Route::post('/supplier/search-supplier',[
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
Route::post('/employee/update-employee',[
	'uses' =>'EmployeeController@updateEmployeeInfo',
	'as'   =>'update-employee'
]);
Route::post('/employee/search-employee',[
	'uses'=>'EmployeeController@searchEmployee',
	'as'  =>'search-employee'
]);
Route::get('/employee/view-employee/{id}/{name}',[
	'uses'=>'EmployeeController@viewEmployeeInfo',
	'as'  =>'view-employee'
]);
Route::post('/employee/delete-employee',[
	'uses'=>'EmployeeController@deleteEmployeeInfo',
	'as'  =>'delete-employee'
]);

/*=========================
	Employee Route start
===========================*/

/*=========================
	Employee Route End
===========================*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
