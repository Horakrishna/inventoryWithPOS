@extends('admin.master')
@section('title')
    Manage Employee
@endsection
@section('body')
<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                 <div class="card shadow mb-4">
                  <div class="card-header py-3">
                     <div class="row">
                      <div class="col-sm-4">
                         <a href="{{ route('add-employee') }}" class="btn btn-success text-left">Add New Employee</a>
                      </div>
                      <div class="col-sm-8">
                        @if(Session::has('message'))
                        <h3 class="text-success font-weight-bold text-center">{{ Session::get('message') }}</h3>
                        @else
                        <h3 class="m-0 font-weight-bold text-primary text-left">View Employee Details</h3>
                         @endif
                      </div>
                    </div>
                    
                  </div>
                <div class="card-body">
                   <div class="table-responsive">
                         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Employee Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Designation</th>
                                <th>Nid</th>
                                <th>Employee image</th>
                                <th>Present Address</th>
                                <th>Permanent Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                              @php($i =1)
                              @foreach($employees as $employee)
                            <tbody>
                           
                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td>{{$employee->emp_name}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->designation}}</td>
                                    <td>{{$employee->nid}}</td>
                                    <td>
                                      <img src="{{asset($employee->emp_image)}}" alt="" height="150" width="150">
                                     
                                    </td>
                                    <td>{{$employee->present_address}}</td>
                                    <td>{{$employee->permanent_address}}</td>
                                    <td>
                                        <a href="{{ route('edit-employee',['id'=>$employee->id]) }}" class="btn btn-primary btn-xs"  title="Edit Employee">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <a href="" class="btn btn-success btn-xs"  title="View Employee">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                        <a href="#"class="btn delete-btn btn-danger btn-xs" id="" onclick="   
                                              event.preventDefault();
                                                var check =confirm('Are You sure to delete Employee !!!');
                                                  if (check) {
                                                    document.getElementById('deleteEmployee+').submit();
                                                  }
                                          "  title="Delete Employee">
                                             <span class="fa fa-trash"></span>
                                        </a>
                                        <form action="" method="POST" id="deleteEmployee+">
                                                   
                                            <input type="hidden" value="" name="id">
                                        </form>  
                                    </td>
                                </tr>
                          
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection