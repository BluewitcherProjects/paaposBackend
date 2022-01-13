
@extends('layouts.admin')

@section('content')

<style>
     .switch
     {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input
    {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider
    {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before
    {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider
    {
      background-color: #2196F3;
    }

    input:focus + .slider
    {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before
    {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round
    {
      border-radius: 34px;
    }

    .slider.round:before
    {
      border-radius: 50%;
    }
</style>

  <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    @if(Session::has('msg'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('msg') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

@endif
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Order</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row mb-4">
                  <a class="btn btn-success float-left" href="{{ route('order-file-export') }}">Export CSV data</a>&nbsp;&nbsp;
                  <a class="btn btn-success float-right" href="{{ route('orders-pdf') }}">Export to PDF</a>
               </div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Order</h2>
                                <a href="{{ route('createorder') }}" class="btn btn-dark mt-2 mb-2">Create Order</a>
                                <div class="table-responsive">
                                    <table id="myTable" class="table tablesorter table-striped table-bordered">
                                        <thead>
                                            <tr class="bg-cyan">
                                                <th><h6 class="text-light">Order id</h6></th>
                                                <th><h6 class="text-light">Product id</h6></th>
                                                <th><h6 class="text-light">Product Name</h6></th>
                                                <th><h6 class="text-light">User Name</h6></th>
                                                <th><h6 class="text-light">Mobile</h6></th>
                                                <th><h6 class="text-light">Delivery Charge</h6></th>
                                                <th><h6 class="text-light">Pickup Location</h6></th>
                                                <th><h6 class="text-light">Pickup Location</h6></th>
                                                <th><h6 class="text-light">Cod</h6></th>
                                                <th><h6 class="text-light">Wallet</h6></th>
                                                <th><h6 class="text-light">Admin Commision</h6></th>
												<th><h6 class="text-light">Edit</h6></th>
												<th><h6 class="text-light">Delete</h6></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($collection as $item)

                                            <tr>
                                                <td>{{$item->id}}
                                                </td>
                                                <td>{{$item->product_id}}</td>
                                                <td>{{$item->product_name}}</td>
                                                <td>{{$item->UserName}}</td>
                                                <td>{{$item->Mobile}}</td>
                                                <td><span>&#8377;</span>{{$item->Delivery_charge}}</td>
                                                <td>{{$item->Pickup_location}}</td>
                                                <td>{{$item->Drop_location}}</td>


                                                <td><span>&#8377;</span>{{$item->Cod}}</td>
                                                <td><span>&#8377;</span>{{$item->Wallet}}</td>
                                                <td><span>&#8377;</span>{{$item->   Admin_commision}}</td>
                                                <td>
                                                <a href="editorder/{{$item->id}}" class="btn btn-primary">Edit</a></td>
                                                <td>
                                                 <a href="deleteorder/{{ $item->id }}" class="btn btn-danger">Delete</a>
                                                 </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

@endsection
