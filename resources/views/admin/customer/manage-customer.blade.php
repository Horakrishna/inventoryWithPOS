@extends('admin.master')
@section('title')
    Manage Customer
@endsection
@section('body')
<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                 <div class="card shadow mb-4">
                  <div class="card-header py-3">
                     <div class="row">
                      <div class="col-sm-4">
                         <a href="" class="btn btn-success text-left">Add New Customer</a>
                         <form action="" enctype="multipart/form-data" method="post">
                            @csrf
                            <input type="file" name="file">
                            <button class="btn btn-primary" type="submit">Upload</button>
                        </form>
                      </div>
                      <div class="col-sm-4">
                        @if(Session::has('message'))
                        <h3 class="text-success font-weight-bold text-center">{{ Session::get('message') }}</h3>
                        @else
                        <h3 class="m-0 font-weight-bold text-primary text-left">View Customer Details</h3>
                         @endif

                      </div>
                      <div class="col-sm-4">
                        {{ Form::open(['method'=>'post','role'=>'search'])}}
                          <div class="input-group">
                              <input type="text" class="form-control" name="search_emp"
                                  placeholder="Search Customer"> <span class="input-group-btn">
                                  <button type="submit" class="btn btn-default">
                                      <span class="fa fa-search"></span>
                                  </button>
                              </span>
                          </div>
                      {{ Form::close() }}
                      </div>

                    </div>

                  </div>
                <div class="card-body">
                   <div class="table-responsive">
                         <table class="table table-bordered"  width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Customer Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Tin Number</th>
                                <th>Customer Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @php($i=1)
                            @foreach($customers as $customer)
                            <tbody>
                                <tr>
                                    <td>{{ $i++}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->phone}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->tin_number}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td>
                                    <a href="{{route('edit-customer',['id'=>$customer->id])}}" class="btn btn-primary btn-xs"  title="Edit Customer">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                      <a href="" class="btn btn-success btn-xs"  title="View Customer">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                    <a href="#"class="btn delete-btn btn-danger btn-xs" id="{{$customer->id}}" onclick="
                                              event.preventDefault();
                                                var check =confirm('Are You sure to delete Customer !!!');
                                                  if (check) {
                                                  document.getElementById('deleteCustomer+{{$customer->id}}').submit();
                                                  }
                                          "  title="Delete Customer">
                                             <span class="fa fa-trash"></span>
                                        </a>
                                    <form action="{{ route('delete-customer')}}" method="POST" id="deleteCustomer+{{$customer->id}}">
                                          @csrf
                                            <input type="hidden" value="{{$customer->id}}" name="id">
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                        <div class="row">
                          <div class="col-auto mr-auto"></div>
                          <div class="col-auto">{{ $customers->links()}}</div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection