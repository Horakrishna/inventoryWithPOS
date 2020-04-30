<?php

namespace App\Http\Controllers;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use Maatwebsite\Excel\Facades\Excel;

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
        $customers =DB::table('customers')->paginate(5);
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

    public function import_customer(Request $request){
        if ( $request->hasFile('file') ) {

            $this->validate($request ,[
                'file'  =>'required|mimes:csv,txt'
            ]);

         if (( $handle = fopen($_FILES['file']['tmp_name'], 'r' )) !=false ){
               fgetcsv($handle);
               while (($data =fgetcsv($handle ,1000, ',')) !=false) {
                  $list[] = [

                    'name'       =>$data[0],
                    'email'      =>$data[1],
                    'phone'      =>$data[2],
                    'address'    =>$data[3],
                    'tin_number' =>$data[4],
                    'created_at' =>Carbon::now()->toDateTimeString(),
                    'updated_at' =>Carbon::now()->toDateTimeString(),
                  ];
               }
               if(count($list)>0){
                    Customer::insert($list);
                    return redirect('/customer/manage-customer')->with('success-message', 'Data uploaded Successfully!');
                }
                return redirect('/customer/manage-customer')->with('message','OPPS! Customer info  Import unSuccessfully');
            }
                
        }
       
    }
    

    public function customerExport($type){
       //  $customer_data    = DB::table('customers')->get()->toArray();
       //  $customer_array[] = array('Customer name','Email','Phone','Address','Tin_number');
       //  foreach ($customer_data as  $customer) {
       //      $customer_array[] =array(

       //      'Customer name'  =>$customer->name,
       //      'Email'          =>$customer->email,
       //      'Phone'          =>$customer->phone,
       //      'Address'        =>$customer->address,
       //      'Tin_number'     =>$customer->tin_number
       //      );   
       //  }
       // Excel::download('Customer Data', function($excel) use ( $customer_array){
       //      $excel->setTitle('Customer Data');
       //      $excel->sheet('Customer Data' ,function($sheet) use ($customer_array){
       //           $sheet->fromArray($customer_array, null, 'A1', false, false);
       //      });
       //     return Excel::download(new Customer, 'export-customer');
       //  });

       $data = Customer::get()->toArray();

        return Excel::create('customers', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

}
