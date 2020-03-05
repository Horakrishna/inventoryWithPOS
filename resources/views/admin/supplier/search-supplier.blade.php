@extends('admin.master')
@section('title')
    Search Supplier
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
                         <a href="{{ route('manage-supplier')}}" class="btn btn-success text-left">All Supplier list</a>
						</div>
						<div class="col-sm-10 text-left">
                            <h3 class="m-0 font-weight-bold text-success ">The Search results for your query <b> {{ $query }} </b> are :</h3>
						</div>
                    </div>
                  </div>
                  <div class="card-header py-4">
                    <div class="row">
						<div class="col-sm-12">
                            <h4 class="m-0 text-primary text-center">Supplier details</h2>
						</div>
                    </div>
                  </div>
                <div class="card-body">
                   <div class="table-responsive">
                         <table class="table table-bordered"  width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Supplier Name</th>
                                    <th>Supplier Email</th>
                                    <th>Supplier Company type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($details as $supplier)
                                <tr>
                                    <td>{{$supplier->name}}</td>
                                    <td>{{$supplier->email}}</td>
                                    <td>{{$supplier->company_type}}</td>
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