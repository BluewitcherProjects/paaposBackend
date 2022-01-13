
@extends('layouts.admin')

@section('content')
<style>
     .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }
    
    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }
    
    .slider {
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
    
    .slider:before {
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
    
    input:checked + .slider {
      background-color: #2196F3;
    }
    
    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }
    
    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
    
    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }
    
    .slider.round:before {
      border-radius: 50%;
    }
    .alert {
                padding: 20px;
                background-color: #f44336;
                color: white;
                max-width:300px;
                margin-left:20px;
                margin-top:20px;
              }
              
              .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
              }
              
              .closebtn:hover {
                color: black;
              } 
</style>
@if(session()->has('message'))
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <h4><b>{{ session()->get('message') }}</b></h4>
</div>
@endif
  <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Product</h4>
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
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                 <div class="row mb-4">
                  <a class="btn btn-success float-left" href="{{ route('profile-export') }}">Export to CSV</a>&nbsp;&nbsp;
                  <a class="btn btn-success float-right" href="{{ route('products-pdf') }}">Export to PDF</a>
               </div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                       
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-6">
                                <h2 class="card-title">Product</h2>
                                <a href="{{route('addproduct')}}" class="btn btn-dark mt-2 mb-2">Add New Product</a>
                            </div>
                            <div class="col-md-6">
                                <form method="GET" action="{{ route('productsearch') }}">
                                <div class="form-group row">
                                    @if ($errors->any())
                                   <!-- <div class="alert alert-danger"> -->
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    <!-- </div> -->
                                @endif
                                <div class="col-sm-10">
                                  <input type="text" name="query" class="form-control" placeholder="Search Product name">

                                </div>
                                <button type="submit" class="btn btn-primary">Search</button>
                              </div>
                              </form>
                               </div>
                             </div>
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-bordered tablesorter">
                                        <thead>
                                            <tr class="bg-cyan">
                                                <th><h6 class="text-light">Product Id</h6></th>
                                                <th><h6 class="text-light">Image</h6></th>
                                                <th><h6 class="text-light">Name</th>
                                                <th><h6 class="text-light">Category</h6></th>
                                                <th><h6 class="text-light">Subcategory</h6></th>
                                                <th><h6 class="text-light">Price</h6></th>
                                                <th><h6 class="text-light">Quantity</h6></th>
                                                <th><h6 class="text-light">SKU</h6></th>
                                                <th><h6 class="text-light">Description</h6></th>
                                                <th><h6 class="text-light">In Stock</h6></th>
                                                <th><h6 class="text-light">Status</h6></th>
                                                <th><h6 class="text-light">View</h6></th>
												                        <th><h6 class="text-light">Edit</h6></th>
												                        <th><h6 class="text-light">Delete</h6></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($collection as $product)
                                              
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td><img src="{{ asset('assets/images/product/').'/'.$product->image }}" height="90" weight="90"></td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->catname }}</td>
                                                <td>{{ $product->subcatname }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ $product->sku }}</td>
                                                <td>{{ $product->description }} </td>
                                                <td>{{ $product->in_stock== '0' ? 'Sold' :'Available'  }}</td>
                                                <td>{{ $product->status == '0' ? 'Deactive' :'Active' }}</td>
                                                <td><a href="viewproduct/{{ $product->id }}" class="btn btn-success">View</a></td>
                                                <td><a href="editproduct/{{ $product->id }}" class="btn btn-primary">Edit</a></td>
                                                <td><a href="delete/{{ $product->id }}" class="btn btn-danger">Delete</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
@endsection