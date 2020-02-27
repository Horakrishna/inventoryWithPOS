@extends('admin.master')
@section('title')
    View Supplier
@endsection
@section('body')
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row">
        <div class="col-sm-4">
           <a href="" class="btn btn-success text-left">All Suppliers list</a>
        </div>
        <div class="col-sm-8">
           <h3 class="m-0 font-weight-bold text-primary text-left">View Supplier Details</h3>
        </div>
      </div>
      
    </div>
    <div class="card-body">
        <h3 class="m-0 font-weight-bold text-success text-center">Supplier info</h3>
        <div class="table-responsive">
            <table class="table table-bordered" width="100%">
                <tr>
                  <th>Supplier Name</th>
                  <td>Supplier Name</td>
                        
                </tr>
                <tr> 
                  <th>Supplier Phone No</th>
                  <td>Supplier Phone No</td>
                        
                </tr>
                <tr>
                  <th> Supplier Email</th> 
                  <td> Supplier Email</td>
                      
                </tr>
                <tr>
                  <th>Supplier Company</th>
                  <td>Supplier Company</td>
                        
                </tr> 
                <tr>
                  <th>Company Type</th>
                  <td>Company Type</td>
                        
                </tr> 
                <tr>
                  <th>Supplier Address</th>
                  <td>Supplier Address</td>
                        
                </tr> 
                <tr>
                  <th>Supplier TIN Number</th>
                  <td>Supplier TIN Number</td>
                        
                </tr>
            </table>

        </div>
                <!-- /.card-body -->
      </div>
    </div>
</div>
@endsection