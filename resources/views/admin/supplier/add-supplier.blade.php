@extends('admin.master')
@section('title')
    Add Supplier
@endsection
@section('body')

    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
            @if(Session::has('message'))
            <h3 class="card-title text-center text-success">{{ Session::get('message')}}</h3>
            @else
            <h3 class="card-title text-center text-success">Add Supplier Form</h3>
            @endif
        </div>
        {{ Form::open(['route'=>'new-supplier','method'=>'POST','class'=>'form-horizontal']) }}
            <div class="row clearfix">
                <div class="col-sm-6">
                    {{ Form::label('name','Name')}}
                    <div class="form-group">
                        <div class="form-line">
                            {{ Form::text('name',null,['placeholder'=>'Enter Supplier Name','class'=>'form-control'])}}
                            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name'): '' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                      {{ Form::label('phone','Phone (Required)***')}}
                    <div class="form-group">
                         <div class="form-line">
                            {{ Form::text('phone',null,['placeholder'=>'Enter Supplier Phone No','class'=>'form-control'])}}
                             <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone'): '' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    {{ Form::label('email','Email')}}
                    <div class="form-group">
                        <div class="form-line">
                            {{ Form::text('email',null,['placeholder'=>'Enter Supplier Email','class'=>'form-control']) }}
                             <span class="text-danger">{{ $errors->has('email') ? $errors->first('email'): '' }}</span>
                        </div>
                     </div>
                </div>
                <div class="col-sm-6">
                     {{ Form::label('company','Company Name') }}
                    <div class="form-group">
                        <div class="form-line">
                            {{ Form::text('company_name',null,['placeholder'=>'Enter Company Name','class'=>'form-control']) }}
                             <span class="text-danger">{{ $errors->has('company_name') ? $errors->first('company_name'): '' }}</span>  
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                     {{ Form::label('type','Company Type')}}
                     {{ Form::select('company_type',
                        [
                            'Dealer'       => 'Dealer', 
                            'Company'      => 'Company',
                            'Wholeseller'  => 'Wholeseller',
                            'Distributor'  => 'Distributor',
                       ],
                       null,['class' => 'form-control show-tick'])
                     }}
                      <span class="text-danger">{{ $errors->has('company_type') ? $errors->first('company_type'): '' }}</span>
                </div>
                <div class="col-sm-6">
                     {{ Form::label('address','Address')}}
                    <div class="form-group">
                        <div class="form-line">
                         {{ Form::text('address',null,['placeholder'=>'Enter Supplier Address','class'=>'form-control']) }}
                         <span class="text-danger">{{ $errors->has('address') ? $errors->first('address'): '' }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                     {{ Form::label('tin_number','TIN Number')}}
                    <div class="form-group">
                        <div class="form-line">
                             {{ Form::text('tin_number',null,['placeholder'=>'Enter Supplier TIN Number','class'=>'form-control']) }}
                              <span class="text-danger">{{ $errors->has('tin_number') ? $errors->first('tin_number'): '' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="card-footer">
                <div class="form-group row">
                    <div class="offset-sm-4 col-sm-4">
                        <button type="submit" class="btn btn-info text-center">Save Supplier</button>
                    </div>
                </div>
            </div>
        {{ Form::close() }}
    </div>
    <!-- /.card -->
@endsection