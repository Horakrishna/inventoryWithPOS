@extends('admin.master')
@section('title')
    Manage Category
@endsection
@section('body')

    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title text-center">Add Category Form</h3>

        </div>

        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('new-category') }}" method="POST" class="form-horizontal">
            @csrf
            <div class="card-body">
                <h4 class="text-center text-success">{{ Session::get('message')}}</h4>
                <div class="form-group row">
                    <label for="Category Name" class="col-sm-2 col-form-label">Category Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="category_name" placeholder="Category Name">
                        <span class="text-danger">{{ $errors->has('category_name') ? $errors->first('category_name'): '' }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Textarea" class="col-sm-2 col-form-label">Category Discription</label>
                    <div class="col-sm-5">
                        <textarea class="form-control" rows="3" name="cat_dis" placeholder="Enter Discription"></textarea>
                        <span class="text-danger"> {{ $errors->has('cat_dis') ? $errors->first('cat_dis'): '' }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publication_status" class="col-sm-2 col-form-label">Publication Status</label>
                    <div class="col-sm-8">
                        <div class="form-check">
                            <label><input type="radio" name="publication_status" value="1">Published</label>
                            <label><input type="radio" name="publication_status" value="0">UnPublished</label>
                            <span class="text-danger">{{ $errors->has('publication_stutus') ? $errors->first('publication_stutus') : '' }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-info text-center">Save Category</button>
                    </div>
                </div>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->
@endsection