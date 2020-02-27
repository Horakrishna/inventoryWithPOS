@extends('admin.master')
@section('title')
    Add Product
@endsection
@section('body')

    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="m-0 font-weight-bold text-primary card-title text-center ">Add Product Form</h3>

        </div>
             {{ Form::open(['route'=>'new-product','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}
            <div class="card-body">
                <h4 class="text-center text-success">{{ Session::get('message')}}</h4>
                <div class="form-group row">
                     <label for="Category Name" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-5">
                        <select class="form-control" name="category_id">
                            <option>---Select Category Name---</option>
                            @foreach($categories as $category) 
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                           @endforeach
                        </select></br>
                        <span class="text-danger">{{ $errors->has('category_name') ? $errors->first('category_name') : ' ' }}</span>
                    </div>
                </div>
                <div class="form-group row">
                     <label for="Brand Name" class="col-sm-2 col-form-label">Brand Name</label>
                    <div class="col-sm-5">
                        <select class="form-control" name="brand_id">
                            <option>---Select Brand Name---</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}">{{ $brand->brand_name }}</option>
                           @endforeach
                        </select></br>
                        <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : ' ' }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Product Name" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                        <span class="text-danger">{{ $errors->has('product_name') ? $errors->first('product_name'): '' }}</span>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="Product Price" class="col-sm-2 col-form-label">Product Price</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="product_price" placeholder="Product Price">
                        <span class="text-danger">{{ $errors->has('product_price') ? $errors->first('product_price'): '' }}</span>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="Product Quantity" class="col-sm-2 col-form-label">Product Quantity</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="producct_quantity" placeholder="Product Quantity">
                        <span class="text-danger">{{ $errors->has('producct_quantity') ? $errors->first('producct_quantity'): '' }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Textarea" class="col-sm-2 col-form-label">short Discription</label>
                    <div class="col-sm-5">
                        <textarea class="form-control" rows="3" name="short_dis" placeholder="Enter short Discription"></textarea>
                        <span class="text-danger"> {{ $errors->has('short_dis') ? $errors->first('short_dis'): '' }}</span>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="Textarea" class="col-sm-2 col-form-label">Long Discription</label>
                    <div class="col-sm-5">
                        <textarea class="form-control"  id="editor"name="long_dis" placeholder="Enter Long Discription"></textarea>
                        <span class="text-danger"> {{ $errors->has('long_dis') ? $errors->first('long_dis'): '' }}</span>
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="Product Image" class="col-sm-2 col-form-label">Product Image</label>
                    <div class="col-sm-5">
                        <input type="file" name="product_image" accept="image/*"></br>
                        <span class="text-danger">{{ $errors->has('product_image') ? $errors->first('product_image'): '' }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publication_status" class="col-sm-2 col-form-label">Publication Status</label>
                    <div class="col-sm-8">
                        <div class="form-check">
                            <label><input type="radio" name="publication_stutus" value="1">Published</label>
                            <label><input type="radio" name="publication_stutus" value="0">UnPublished</label></br>
                            <span class="text-danger">{{ $errors->has('publication_stutus') ? $errors->first('publication_stutus') : '' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-info text-center">Save Product info</button>
                    </div>
                </div>
            </div>
            <!-- /.card-footer -->
       {{ Form::close() }}
    </div>
    <!-- /.card -->
@endsection