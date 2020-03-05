@extends('admin.master')
@section('title')
    Search Employee
@endsection
@section('body')
<div class="row clearfix">
    @if(isset($details))
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
						<div class="col-sm-2">
                         <a href="{{ route('manage-employee')}}" class="btn btn-success text-left">All Employee list</a>
						</div>
						<div class="col-sm-10 text-left">
                            <h3 class="m-0 font-weight-bold text-success ">The Search results for your query <b> {{ $query }} </b> are :</h3>
						</div>
                    </div>
                  </div>
                  <div class="card-header py-4">
                    <div class="row">
						<div class="col-sm-12">
                            <h4 class="m-0 text-primary text-center">Employee details</h2>
						</div>
                    </div>
                  </div>
                <div class="card-body">
                   <div class="table-responsive">
                         <table class="table table-bordered"  width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Employee Email</th>
                                    <th>Employee Designation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($details as $employee)
                                <tr>
                                    <td>{{$employee->emp_name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->designation}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
@endsection