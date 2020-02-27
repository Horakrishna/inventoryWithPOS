@extends('admin.master')
@section('title')
    View Order
@endsection
@section('body')
<div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-primary text-center">View Order Details</h3>
            </div>
            <div class="card-body">
              <h3 class="m-0 font-weight-bold text-success text-center">Order info</h3>
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%">
                      <tr>
                        <th>Order No</th>
                        <td>{{ $order->id }}</td>
                        
                      </tr>
                      <tr>
                        <th>Order Total</th>
                        <td>{{ $order->order_total }}</td>
                        
                      </tr>
                      <tr>
                        <th>Order Status </th> 
                        <td>{{ $order->order_status }}</td>
                        
                      </tr>
                      <tr>
                        <th> Order Date </th>
                        <td>{{ $order->created_at }}</td>
                        
                      </tr>
                  </table>

                </div>
                <!-- /.card-body -->
            </div>
            <div class="card-body">
              <h3 class="m-0 font-weight-bold text-success text-center">Coustomer info For this order</h3>
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%">
                      <tr>
                        <th>Full name</th>
                        <td>{{$coustomer->first_name.''.$coustomer->last_name}}</td>
                        
                      </tr>
                      <tr>
                        <th>Phone Number</th>
                        <td>{{ $coustomer->phone }}</td>
                        
                      </tr>
                      <tr>
                        <th>Email Adress </th>
                        <td>{{ $coustomer->user_email }}</td>
                        
                      </tr>
                      <tr>
                        <th> Adress </th>
                        <td>{{ $coustomer->address }}</td>
                        
                      </tr>
                  </table>

                </div>
                <!-- /.card-body -->
            </div>
             <div class="card-body">
              <h3 class="m-0 font-weight-bold text-success text-center">Shiping info For this order</h3>
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%">
                      <tr>
                        <th>Full name</th>
                        <td>{{ $sheping->full_name}}</td>
                        
                      </tr>
                      <tr>
                        <th>Phone Number</th>
                        <td>{{ $sheping->phone}}</td>
                        
                      </tr>
                      <tr>
                        <th>Email Adress </th>
                        <td>{{ $sheping->email_address}}</td>
                        
                      </tr>
                      <tr>
                        <th> Sheping Address </th>
                        <td>{{ $sheping->address}}</td>
                        
                      </tr>
                  </table>

                </div>
                <!-- /.card-body -->
            </div>
            <div class="card-body">
              <h3 class="m-0 font-weight-bold text-success text-center">Payment Info</h3>
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%">
                      <tr class="bg-info">
                        <th>Payment Type</th>
                        <td>Cash</td>
                        
                      </tr>
                      <tr>
                        <th>Payment Status</th>
                        <td>Pending</td>
                        
                      </tr>
                  </table>

                </div>
                <!-- /.card-body -->
            </div>
            <div class="card-body">
              <h3 class="m-0 font-weight-bold text-success text-center">Product For of this order</h3>
                <div class="table-responsive">
                  <table class="table table-bordered" width="100%">
                      <tr class="bg-info">
                        <th>SI No</th>
                        <th>Order Id</th>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Total Price</th>
                      </tr>
                      @PHP($i=1)
                      @foreach($orderDetail as $orderDetail)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$orderDetail->product_id}}</td>
                        <td>{{$orderDetail->product_name}}</td>
                        <td>tk.{{$orderDetail->product_price}}</td>
                        <td>{{$orderDetail->producct_quantity}}</td>
                        <td>tk.{{$orderDetail->product_price*$orderDetail->producct_quantity}}</td>
                      </tr>
                    @endforeach
                  </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
@endsection