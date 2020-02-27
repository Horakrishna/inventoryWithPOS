@extends('admin.master')
@section('title')
    Manage Product
@endsection
@section('body')
 <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h3 class="m-0 font-weight-bold text-primary text-center">Manage Product</h3>
              <h3 class="text-success text-center">{{ Session::get('message') }}</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Brand Name</th>
                      <th>Category Name</th>
                      <th>Product Name</th>
                      <th>Product Price</th>
                      <th>Product Quantity</th>
                      <th>Product Description</th>
                      <th>Product long dis</th>
                      <th>Product image</th>
                      <th>Publication Status</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  @php($i=1)
                  @foreach($products as $product)
                  <tbody>
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $product->category_name}}</td>
                      <td>{{ $product->brand_name}}</td>
                      <td>{{ $product->product_name}}</td>
                      <td>{{ $product->product_price}}</td>
                      <td>{{ $product->producct_quantity}}</td>
                      <td>{{ $product->short_dis}}</td>
                      <td>{{ $product->long_dis}}</td>
                      <td>
                        <img src="{{ asset($product->product_image)}}" alt="" height="100" width="100">
                      </td>
                      <td>{{ $product->publication_stutus ==1 ? 'Published' : 'unPublished'}}</td>
                      <td>
                        @if($product->publication_stutus == 1)
                        <a href="{{ route('unpublished-product',['id'=>$product->id])}}" class="btn btn-success btn-xs">
                            <span class="fa fa-arrow-up"></span>
                        </a>
                        @else
                         <a href="{{ route('published-product',['id'=>$product->id])}}" class="btn btn-success btn-xs">
                            <span class="fa fa-arrow-down"></span>
                        </a>
                        @endif
                        <a href="{{ route('edit-product',['id'=>$product->id] )}}" class="btn btn-primary btn-xs">
                             <span class="fa fa-edit"></span>
                        </a>

                        <a href="#"class="btn delete-btn btn-danger btn-xs" id="{{$product->id}}" onclick="  
                            event.preventDefault();
                            var check =confirm('Are You sure to delete Product !!!');
                            if (check) {
                                document.getElementById('deleteProductForm+{{$product->id}}').submit();
                            }
                        ">
                             <span class="fa fa-trash"></span>
                         </a>
                           <form action="{{ route('delete-product')}}" method="POST" id="deleteProductForm+{{$product->id}}">
                            @csrf
                               <input type="hidden" value="{{ $product->id}}" name="id">
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
        <!-- /.co
@endsection