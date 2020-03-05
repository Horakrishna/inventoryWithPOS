<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;
use DB;
class CustomerController extends Controller
{
    public function index(){
        return view('admin.customer.add-customer');
    }
    public function saveCustomerInfo(Request $request){
        //return $request->all();
        $this->validate($request,[
            'name'        =>'required|regex:/^[\pL\s\-]+$/u|max:15|min:4',
            'email'       =>'required|email|unique:customers,email',
            'phone'       =>'regex:/^([0-9\s\-\+\(\)]*)$/|between:6,8',
            'address'     =>'required|max:150',
            'tin_number'  =>'regex:/^([0-9\s\-\+\(\)]*)$/|between:6,8',
        ]);

        $customer  = new Customer();
        $customer->name          =$request->name;
        $customer->email         =$request->email;
        $customer->phone         =$request->phone;
        $customer->address       =$request->address;
        $customer->tin_number    =$request->tin_number;
        $customer->save();
        return redirect('/customer/add-customer')->with('message','Customer info save successfully');

    }

    public function manageCustomer(){
        $customers =DB::table('customers')->paginate(3);
        return view('admin.customer.manage-customer',['customers'=>$customers]);
    }

    public function editCustomer($id){
        $customer =Customer::find($id);
        return view('admin.customer.edit-customer',['customer'=>$customer]);
    }
    public function updateCustomer(Request $request){

        $this->validate($request,[
            'name'        =>'required|regex:/^[\pL\s\-]+$/u|max:15|min:4',
            'email'       =>'required|email',
            'phone'       =>'regex:/^([0-9\s\-\+\(\)]*)$/|between:6,8',
            'address'     =>'required|max:150',
            'tin_number'  =>'regex:/^([0-9\s\-\+\(\)]*)$/|between:6,8',
        ]);

        $customer  = new Customer();
        $customer->name          =$request->name;
        $customer->email         =$request->email;
        $customer->phone         =$request->phone;
        $customer->address       =$request->address;
        $customer->tin_number    =$request->tin_number;
        $customer->save();
        return redirect('/customer/manage-customer')->with('message','Customer info Update successfully');
    }
    public function deleteCustomer(Request $request){
        $customer =Customer::find($request->id);
        $customer->delete();
		return redirect('/customer/manage-customer')->with('message','Customer info  Delete Successfully');
    }
}
