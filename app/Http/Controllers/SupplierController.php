<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use DB; 
 
class SupplierController extends Controller
{
    
    public function index(){
    	return view('admin.supplier.add-supplier');
    }
    public function saveSupplierInfo(Request $request){
    	//return $request->all();
    	$this->validate($request,[
    		'name'         =>'required|regex:/^[\pL\s\-]+$/u|max:15|min:4',
    		'phone'        =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,12',
    		'email'        =>'required|email',
    		'company_name' =>'required|regex:/^[\pL\s\-]+$/u|max:10|min:4',
    		'company_type' =>'required',
    		'tin_number'   =>'required',
    		'address'      =>'required'

    	]);

    	$supplier = new Supplier();
    	$supplier->name            =$request->name;
    	$supplier->phone           =$request->phone;
    	$supplier->email           =$request->email;
    	$supplier->company_name    =$request->company_name;
    	$supplier->company_type    =$request->company_type;
    	$supplier->tin_number      =$request->tin_number;
    	$supplier->address         =$request->address;
    	$supplier->save();

    	return redirect('/supplier/add-supplier')->with('message','Supplier Info save Successfully.');

    }
    public function manageSupplierInfo(){

    	$suppliers = DB::table('suppliers')->paginate(5);
    	return view('admin.supplier.manage-supplier',['suppliers'=>$suppliers]);
    }

    public function viewSupplierInfo($id){

    	$supplier =Supplier::find($id);
    	return view('admin.supplier.view-supplier',['supplier'=>$supplier]);
    }

    public function editSupplierInfo($id){
    	$supplier =Supplier::find($id);
    	return view('admin.supplier.edit-supplier',['supplier'=>$supplier]);
    }
    public function searchSupplier(){

    	$query=request('search_text');
        $suppliers = Supplier::where('name', 'LIKE', '%' . $query . '%')->paginate(1);;
        return view('admin.supplier.manage-supplier',compact('suppliers'));
    }

    public function updateSupplierInfo(Request $request){
    	$this->validate($request,[
    		'name'         =>'required|regex:/^[\pL\s\-]+$/u|max:15|min:4',
    		'phone'        =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,12',
    		'email'        =>'required|email',
    		'company_name' =>'required|regex:/^[\pL\s\-]+$/u|max:10|min:4',
    		'company_type' =>'required',
    		'tin_number'   =>'required',
    		'address'      =>'required'

    	]);

    	$supplier =Supplier::find($request->supplier_id);

    	$supplier->name            =$request->name;
    	$supplier->phone           =$request->phone;
    	$supplier->email           =$request->email;
    	$supplier->company_name    =$request->company_name;
    	$supplier->company_type    =$request->company_type;
    	$supplier->tin_number      =$request->tin_number;
    	$supplier->address         =$request->address;
    	$supplier->save();

    	return redirect('/supplier/manage-supplier')->with('message','Supplier Info Update Successfully.');
    }
    public function deleteSupplierInfo(Request $request){

    	$supplier= Supplier::find($request->id);
    	$supplier->delete();
         return redirect('/supplier/manage-supplier')->with('message','Supplier Info Delete Successfully');
    }
}
