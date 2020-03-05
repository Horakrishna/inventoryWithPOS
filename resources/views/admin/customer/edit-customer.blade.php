@extends('admin.master')
@section('title')
    Edit Customer
@endsection
@section('body')

    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
            @if(Session::has('message'))
            <h3 class="card-title text-center text-success">{{ Session::get('message')}}</h3>
            @else
            <h3 class="card-title text-center text-success">Edit Customer Form</h3>
            @endif
        </div>
        {{ Form::open(['route'=>'update-customer','method'=>'post','class'=>'form-horizontal']) }}
            <div class="row clearfix">
                <div class="col-sm-6">
                    {{ Form::label('name','Name')}}
                    <div class="form-group">
                        <div class="form-line">
                            {{ Form::text('name',$customer->name ,['placeholder'=>'Enter Customer Name','class'=>'form-control'])}}
                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name'): '' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                      {{ Form::label('phone','Phone (Required)***')}}
                    <div class="form-group">
                         <div class="form-line">
                            {{ Form::text('phone',$customer->phone,['placeholder'=>'Enter Customer Phone No','class'=>'form-control'])}}
                             <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone'): '' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    {{ Form::label('email','Email')}}
                    <div class="form-group">
                        <div class="form-line">
                            {{ Form::text('email',$customer->email,['placeholder'=>'Enter Customer Email','class'=>'form-control']) }}
                             <span class="text-danger">{{ $errors->has('email') ? $errors->first('email'): '' }}</span>
                        </div>
                     </div>
                </div>
                <div class="col-sm-6">
                     {{ Form::label('address','Address')}}
                    <div class="form-group">
                        <div class="form-line">
                         {{ Form::textarea('address',$customer->address,['placeholder'=>'Enter Customer Address','class'=>'form-control','rows'=>'3']) }}
                         <span class="text-danger">{{ $errors->has('address') ? $errors->first('address'): '' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                     {{ Form::label('tin_number','TIN Number')}}
                    <div class="form-group">
                        <div class="form-line">
                             {{ Form::text('tin_number',$customer->tin_number,['placeholder'=>'Enter Customer TIN Number','class'=>'form-control']) }}
                              <span class="text-danger">{{ $errors->has('tin_number') ? $errors->first('tin_number'): '' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="form-group row">
                    <div class="offset-sm-4 col-sm-4">
                        <button type="submit" class="btn btn-info text-center">Update Customer</button>
                    </div>
                </div>
            </div>
        {{ Form::close() }}
    </div>
    <!-- /.card -->
@endsection