@extends('admin.master')
@section('title')
    Manage Category
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
                        <th>Category Discription</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                    </thead>
                        @php($i=1);
                        @foreach($categories as $category)
                    <tbody>
                        <td>{{ $i++ }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->cat_dis }}</td>
                        <td>{{ $category->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                        <td>
                            @if($category->publication_status == 1)
                                <a href="{{ route('unpublished-category',['id'=>$category->id]) }}" class="btn btn-info btn-xs">
                                <span class="fa fa-arrow-up"></span>
                                </a>
                            @else($category->publication_status == 0)
                                <a href="{{ route('published-category',['id'=>$category->id]) }}" class="btn btn-success btn-xs">
                                <span class="fa fa-arrow-down"></span>
                                </a>
                                @endif
                                <a href="{{ route('edit-category',['id'=>$category->id]) }}" class="btn btn-primary btn-xs" id="">
                                <span class="fa fa-edit"></span>
                                </a>

                                <a href="#"class="btn delete-btn btn-danger btn-xs" id="{{ $category->id }}" onclick="
                                 event.preventDefault();
                                  var check =confirm('Are you sure to Delete!!');
                                  if (check) {
                                   document.getElementById('deletecategory'+{{ $category->id }}).submit();
                                    }
                                ">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                    <form action="{{ route('delete-category')}}" id="deletecategory{{$category->id }}" method="POST">
                                         @csrf
                                        <input type="hidden" value="{{ $category->id }}" name="id"/>
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
    <!-- /.row -->
@endsection