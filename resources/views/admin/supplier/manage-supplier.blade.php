@extends('admin.master')
@section('title')
    Manage Supplier
@endsection
@section('body')
<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                 <div class="card shadow mb-4">
                  <div class="card-header py-3">
                     <div class="row">
                      <div class="col-sm-4">
                         <a href="{{ route('add-supplier')}}" class="btn btn-success text-left">Add Supplier Info</a>
                      </div>
                      <div class="col-sm-4">
                        @if(Session::has('message'))
                          <h3 class="text-success text-center">{{ Session::get('message') }}</h3>
                        @else
                         <h3 class="m-0 font-weight-bold text-primary text-left">View Supplier Details</h3>
                         @endif
                      </div>
                      <div class="col-sm-4">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
                          <div class="input-group">
                              <input type="text" class="form-control" name="search_supplier"
                                  placeholder="Search Supplier"> <span class="input-group-btn">
                                  <button type="submit" class="btn btn-default">
                                      <span class="fa fa-search"></span>
                                  </button>
                              </span>
                          </div>
                    
                      </div>
                    </div>

                  </div>

                   <div class="table-responsive">
                         <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                  <th>Sl. No.</th>
                                  <th>Name</th>
                                  <th>Phone</th>
                                  <th>Email</th>
                                  <th>Company Name</th>
                                  <th>Company Type</th>
                                  <th>Tin Number</th>
                                  <th>address</th>
                                  <th>Action</th>
                              </tr>
                            </thead>
                            @php($i=1)
                            @foreach($suppliers as $supplier)
                            <tbody>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $supplier->name}}</td>
                                    <td>{{ $supplier->phone}}</td>
                                    <td>{{ $supplier->email}}</td>
                                    <td>{{ $supplier->company_name}}</td>
                                    <td>{{ $supplier->company_type}}</td>
                                    <td>{{ $supplier->tin_number}}</td>
                                    <td>{{ $supplier->address}}</td>
                                    <td>
                                        <a href="{{ route('edit-supplier',['id'=>$supplier->id])}}" class="btn btn-primary btn-xs"  title="Edit Supplier">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        <a href="{{ route('view-supplier',['id'=>$supplier->id]) }}" class="btn btn-success btn-xs"  title="View Supplier">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                        <a href="#"class="btn delete-btn btn-danger btn-xs" id="{{$supplier->id}}" onclick="
                                              event.preventDefault();
                                                var check =confirm('Are You sure to delete Supplier Info !!!');
                                                  if (check) {
                                                    document.getElementById('deleteSupplier+{{$supplier->id}}').submit();
                                                  }
                                          "  title="Delete Supplier">
                                             <span class="fa fa-trash"></span>
                                        </a>
                                          <form action="{{ route('delete-supplier')}}" method="POST" id="deleteSupplier+{{$supplier->id}}">
                                            @csrf
                                          <input type="hidden" value="{{ $supplier->id}}" name="id">
                                         </form>
                                    </td>
                                </tr>

                            </tbody>
                            @endforeach

                        </table>
                        <div class="row">
                            <div class="col-auto mr-auto"></div>
                            <div class="col-auto"> {{ $suppliers->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
      $(document).ready(function(){

      fetch_customer_data();

      function fetch_customer_data(query = '')
      {
        $.ajax({
        url:"{{ route('live_search.action') }}",
        method:'GET',
        data:{query:query},
        dataType:'json',
        success:function(data)
        {
          $('tbody').html(data.table_data);
          $('#total_records').text(data.total_data);
        }
        })
      }

      $(document).on('keyup', '#search', function(){
        var query = $(this).val();
        fetch_customer_data(query);
      });
      });
</script>
@endsection
