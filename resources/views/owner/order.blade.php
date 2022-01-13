
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Order</h2>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="bg-cyan">
                                                <th><h6 class="text-light">Order id</h6></th>
                                                <th><h6 class="text-light">Product Name</h6></th>
                                                <th><h6 class="text-light">Author Id</h6></th>
                                                <th><h6 class="text-light">Author Name</h6></th>
                                                <th><h6 class="text-light">Sold Price</h6></th>
                                                <th><h6 class="text-light">Product Price</h6></th>
                                                <th><h6 class="text-light">Date</h6></th>
												                        <th><h6 class="text-light">Delete</h6></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order as $item)

                                            <tr>
                                                <td>{{$item->id}}
                                                </td>
                                                <td>{{$item->productName}}</td>
                                                <td>{{$item->autherId}}</td>
                                                <td>{{$item->autherName}}</td>
                                                <td>{{$item->soldPrice}} {{$item->currency}}</td>
                                                <td>{{$item->productPrice}} {{$item->currency}}</td>
                                                <td>{{$item->date}}</td>
                                                        <form method="post" action="{{ route('deleteorder') }}">
                                                            @csrf
                                                         <input value="{{$item->id}}" name="id" hidden>
                                                         <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form></td>
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
