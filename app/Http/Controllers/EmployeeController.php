<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use DB;
use Image;
use Illuminate\Support\Facades\Input;
class EmployeeController extends Controller
{
    public function index(){
    	return view('admin.employee.add-employee');
    }
    protected function employeeInfoValidate($request){
    	$this->validate($request,[
    		'emp_name'      	  =>'required|regex:/^[\pL\s\-]+$/u| max:20|min:4',
    		'phone'         	  =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,12',
    		'email'         	  =>'required|email|unique:employees,email',
    		'designation'   	  =>'required|max:15',
    		'nid'           	  =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,12',
    		'emp_image'     	  =>'required|mimes:jpeg,png,jpg|max:100',
    		'present_address'     =>'required|max:150',
    		'permanent_address'   =>'required|max:150',
    	]);
    }
    protected function employeeImageUpload($request){

    	$employeeImage =$request->file('emp_image');
    	$fileType      =$employeeImage->getClientOriginalExtension();
    	$imageName     =$request->emp_name.'.'.$fileType;
    	$directory     ='employee-images/';
    	$imageUrl      =$directory.$imageName;
    	Image::make($employeeImage)->resize(400,400)->save($imageUrl);
    	return $imageUrl;
    }
    protected function employeeBasicInfo($request,$imageUrl){
    	$employee = new Employee();
    	$employee->emp_name            =$request->emp_name;
    	$employee->phone               =$request->phone;
    	$employee->email               =$request->email;
    	$employee->designation         =$request->designation;
    	$employee->nid                 =$request->nid;
    	$employee->emp_image           =$imageUrl;
    	$employee->present_address     =$request->present_address;
    	$employee->permanent_address   =$request->permanent_address;
    	$employee->save();
    }
    public function saveEmployeeInfo(Request $request){
    		//return $request->all();
    	$this->employeeInfoValidate($request);
    	$imageUrl=$this->employeeImageUpload($request);
    	$this->employeeBasicInfo($request,$imageUrl);


    	return redirect('/employee/add-employee')->with('message','Employee info save successfully');
    }
    public function manageEmployee(){
        $employees = DB::table('employees')->paginate(3);
    	return view('admin.employee.manage-employee',['employees' =>$employees]);
    }
    public function editEmployeeInfo($id){
        $employee =Employee::find($id);
        return view('admin.employee.edit-employee',['employee'=>$employee]);
	}
	protected function employeeUpdateValidate($request){
    	$this->validate($request,[
    		'emp_name'      	  =>'required|regex:/^[\pL\s\-]+$/u| max:20|min:4',
    		'phone'         	  =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,12',
    		'email'         	  =>'required|email',
    		'designation'   	  =>'required|max:15',
    		'nid'           	  =>'required|regex:/^([0-9\s\-\+\(\)]*)$/|between:10,12',
    		'emp_image'     	  =>'mimes:jpeg,png,jpg|max:100',
    		'present_address'     =>'required|max:150',
    		'permanent_address'   =>'required|max:150',
    	]);
    }
	public function  employeeBasicInfoUpdate($employee,$request,$imageUrl=null){

		$employee->emp_name            =$request->emp_name;
    	$employee->phone               =$request->phone;
    	$employee->email               =$request->email;
    	$employee->designation         =$request->designation;
		$employee->nid                 =$request->nid;
		if($imageUrl){
			$employee->emp_image           =$imageUrl;
		}

    	$employee->present_address     =$request->present_address;
    	$employee->permanent_address   =$request->permanent_address;
    	$employee->save();
	}
	public function updateEmployeeInfo(Request $request){
		$employeeImage =$request->file('emp_image');
		$employee      =Employee::find($request->employee_id);
		$this->employeeUpdateValidate($request);
		if($employeeImage){
			unlink($employee->emp_image);
			$imageUrl=$this->employeeImageUpload($request);
			$this->employeeBasicInfoUpdate($employee,$request,$imageUrl);
		}else{
			$this->employeeBasicInfoUpdate($employee,$request);
		}
		return redirect('/employee/manage-employee')->with('message','Employee info  Update Successfully');
	}
	public function searchEmployee(){
		$search_emp = Input::get ('search_emp');
		$employee   = Employee::where('emp_name','LIKE','%'. $search_emp .'%')->orWhere('email','LIKE','%'.$search_emp.'%')->orWhere('designation','LIKE','%'.$search_emp.'%')->get();
		if(count($employee) > 0)
			return view('admin.employee.search-emloyee')->withDetails($employee)->withQuery( $search_emp );
		else {
			return redirect('/employee/manage-employee')->withMessage('No Details found. Try to search again !');

		}
	}
	public function viewEmployeeInfo($id){
		$employee =Employee::find($id);
		return view('admin.employee.view-employee',['employee'=>$employee]);
	}
	public function deleteEmployeeInfo(Request $request){
		$employee =Employee::find($request->id);
		if(file_exists($employee->emp_image)){
			unlink($employee->emp_image);
		}
		$employee->delete();
		return redirect('/employee/manage-employee')->with('message','Employee info  Delete Successfully');
	}
}
