@extends('admin.master')
@section('title')
    View Supplier
@endsection
@section('body')
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row">
        <div class="col-sm-4">
        <a href="{{ route('manage-employee')}}" class="btn btn-success text-left">All Empolyee list</a>
        </div>
        <div class="col-sm-8">
           <h3 class="m-0 font-weight-bold text-primary text-left">View Supplier Details</h3>
        </div>
      </div>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%">
                <tr>
                  <th>Empolyee Name</th>
                  <td>{{$employee->emp_name}}</td>
                </tr>
                <tr>
                  <th>Empolyee Phone No</th>
                  <td>{{$employee->phone}}</td>
                </tr>
                <tr>
                  <th> Empolyee Email</th>
                  <td> {{$employee->email}}</td>
                </tr>
                  <th>Designation</th>
                  <td>{{$employee->designation}}</td>
                </tr>
                <tr>
                  <th>Nid</th>
                  <td>{{$employee->designation}}</td>
                </tr>
                <tr>
                  <th>Employee image</th>
                  <td>
                  <img src="{{ asset($employee->emp_image)}}" alt="" height="150" width="150">
                  </td>
                </tr>
                <tr>
                  <th>Present Address</th>
                  <td>{{$employee->present_address}}</td>
                </tr>
                <tr>
                  <th>Parmanent Address</th>
                  <td>{{$employee->permanent_address}}</td>
                </tr>
            </table>
        </div>
                <!-- /.card-body -->
      </div>
    </div>
</div>
@endsection