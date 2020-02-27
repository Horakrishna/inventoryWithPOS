@extends('admin.master')
@section('title')
    Manage Order
@endsection
@section('body')
<div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-primary text-center">Manage Category</h3>
              <h3 class="text-center text-success">{{Session::get('message')}}</h3>
            </div>
            <div class="card-body">

              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <th>ID</th>
                        <th>Category name</th>
                        <th>Order Total</th>
                        <th>Order Status</th>
                        <th>Order Date</th>
                        <th>Payment Type</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </thead>
                       @PHP($i=1)
                       @foreach($orders as $order)
                    <tbody>
                        <td>{{ $i++}}</td>
                        <td>{{ $order->first_name.''.$order->last_name}}</td>
                        <td>{{ $order->order_total }}</td>
                        <td>{{ $order->order_status }}</td>
                        <td>{{ $order->created_at  }}</td>
                        <th>Payment Type</th>
                        <th>Payment Status</th>
                        <td>
                           
                                <a href="{{ route('view-order-details',['id'=>$order->id])}}" class="btn btn-info btn-xs" title="View order Details">
                                <span class="fa fa-search-plus"></span>
                                </a> 
                                <a href="{{ route('invoice-order',['id'=>$order->id] )}}" class="btn btn-info btn-xs" title="View order Invoice">
                                <span class="fa fa-search-minus"></span>
                                </a>
                                <a href="#" class="btn btn-info btn-xs" title="Download order Invoice">
                                <span class="fa fa-download"></span>
                                </a>
                                <a href="" class="btn btn-primary btn-xs" id=""  title="Edit order Invoice">
                                <span class="fa fa-edit"></span>
                                </a>

                                <a href="#"class="btn delete-btn btn-danger btn-xs" id="" onclick="
                                 event.preventDefault();
                                  var check =confirm('Are you sure to Delete!!');
                                  if (check) {
                                   document.getElementById().submit();
                                    }
                                " title="Delete order Invoice">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                    <form action="" id="deletecategory" method="POST">
                                         @csrf
                                        <input type="hidden" value="" name="id"/>
                                    </form>

                                </td>

                            </tbody>
                        @endforeach
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection