@extends('admin.master')
@section('title')
    Edit Employee
@endsection
@section('body')

    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
            @if(Session::has('message'))
            <h3 class="card-title text-center text-success">{{ session::get('message')}}</h3>
            @else 
            <h3 class="card-title font-weight-bold text-center text-success">Edit Employee Form</h3>
            @endif
        </div>
        {{ Form::open(['route'=>'update-employee','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data']) }}
        
            <div class="row clearfix">
                <div class="col-sm-6"> 
                    {{ Form::label('emp_name','Employee Name') }}
                    <div class="form-group">
                        <div class="form-line">
                             {{ Form::text('emp_name',$employee->emp_name,['placeholder'=>'Enter Employee Name','class'=>'form-control'])}}
                             {{ Form::hidden('employee_id',$employee->id,['placeholder'=>'Enter Employee id','class'=>'form-control'])}}
                             <span class="text-danger">{{ $errors->has('emp_name') ? $errors->first('emp_name'): '' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                     {{ Form::label('phone','Phone Number')}}
                    <div class="form-group">
                         <div class="form-line">
                            {{ Form::text('phone',$employee->phone,['placeholder'=>'Enter Employee Phone No.','class'=>'form-control'])}}
                            <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone'): '' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                     {{ Form::label('email','Email')}}
                    <div class="form-group">
                        <div class="form-line">
                            {{ Form::text('email',$employee->email,['placeholder'=>'Enter Employee Email','class'=>'form-control'])}}
                            <span class="text-danger">{{ $errors->has('email') ? $errors->first('email'): '' }}</span>
                        </div>
                     </div>
                </div>
                <div class="col-sm-6">
                   {{ Form::label('designation','Designation')}}
                    <div class="form-group">
                        <div class="form-line">
                            {{ Form::text('designation',$employee->designation,['placeholder'=>'Enter Employee Designation','class'=>'form-control'])}}
                            <span class="text-danger">{{ $errors->has('designation') ? $errors->first('designation'): '' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                     {{ Form::label('nid','NID Number')}}
                    <div class="form-group">
                        <div class="form-line">
                            {{ Form::text('nid',$employee->nid,['placeholder'=>'Enter NID Number','class'=>'form-control'])}}
                             <span class="text-danger">{{ $errors->has('nid') ? $errors->first('nid'): '' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                     {{ Form::label('emp_image','Employee Image')}}
                    <div class="form-group">
                        <div class="form-line">
                            <input type="file" class="form-control" name="emp_image" accept="image/*"></br>
                            <img src="{{asset($employee->emp_image)}}" alt="" height="100" width="100">
                            <span class="text-danger">{{ $errors->has('emp_image') ? $errors->first('emp_image'): '' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    {{ Form::label('present_address','Present Address')}}
                    <div class="form-group">
                        <div class="form-line">
                           {{ Form::textarea('present_address',$employee->present_address,['placeholder'=>'Enter Employee Present Address','class'=>'form-control','rows'=>'3'])}}
                             <span class="text-danger">{{ $errors->has('present_address') ? $errors->first('present_address'): '' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                     {{ Form::label('permanent_address','Permanent Address')}}
                    <div class="form-group">
                        <div class="form-line">
                            {{ Form::textarea('permanent_address',$employee->permanent_address,['placeholder'=>'Enter Employee Permanent Address','class'=>'form-control','rows'=>'3'])}}
                            <span class="text-danger">{{ $errors->has('permanent_address') ? $errors->first('permanent_address'): '' }}</span>
                        </div>
                    </div>
                </div>
         
       
        </div>
        <div class="card-footer">
            <div class="form-group row">
                <div class="offset-sm-4 col-sm-4">
                    <button type="submit" class="btn btn-info text-center">Update Employee Info</button>
                </div>
            </div>
        </div>
         {{ Form::close() }}
    </div>
    <!-- /.card -->
@endsection