
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                       
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Product</h2>
                                <a href="/addproduct" class="btn btn-dark mt-2 mb-2">Add New Product</a>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="bg-cyan">
                                                <th><h6 class="text-light">Product Id</h6></th>
                                                <th><h6 class="text-light">Product-Name</h6></th>
                                                <th><h6 class="text-light">Product Author</h6></th>
                                                <th><h6 class="text-light">Uploaded By</h6></th>
                                                <th><h6 class="text-light">Product Price</h6></th>
                                                <th><h6 class="text-light">Currency</h6></th>
                                                <th><h6 class="text-light">Demo Video</h6></th>
                                                <th><h6 class="text-light">Category</h6></th>
                                                <th><h6 class="text-light">Product Discount</h6></th>
                                                <th><h6 class="text-light">Demo Url(admin)</h6></th>
                                                <th><h6 class="text-light">Demo Url(user)</h6></th>
                                                <th><h6 class="text-light">Free Trial</h6></th>
                                                <th><h6 class="text-light">Sold Product</h6></th>
                                                <th><h6 class="text-light">Admin Credential</h6></th>
                                                <th><h6 class="text-light">User Credential</h6></th>
                                                <th><h6 class="text-light">verification</h6></th>
                                                <th><h6 class="text-light">Product thumbnail</h6></th>
                                                <th><h6 class="text-light">View Product</h6></th>
												                        <th><h6 class="text-light">Edit</h6></th>
												                        <th><h6 class="text-light">Delete</h6></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($collection as $product)
                                              
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->author_name }}</td>
                                                <td>{{ $product->uploaded_by }}</td>
                                                <td>{{ $product->product_price }}</td>
                                                <td>{{ $product->product_currency }}</td>
                                                <td><img src="{{ asset('storage/videos/'.$product->product_video) }}" height="90" weight="90"></td>
                                                <td>{{ $product->category }}</td>
                                                <td>{{ $product->product_discount }} %</td>
                                                <td>{{ $product->user_url }}</td>
                                                <td>{{ $product->admin_url }}</td>
                                                <td>{{ $product->trial_period }}</td>
                                                <td>{{ $product->sold }}</td>
                                                <td>{{ $product->user_credential }}</td>
                                                <td>{{ $product->admin_credential }}</td>
                                                <td>
                                                  @if($product->status=='on')
                                                      <a style="color:#fcfcfc;" class="btn btn-success">verified</a>
                                                  @else                                            
                                                  <a href="verify/{{ $product->id }}" class="btn btn-danger">verify</a></td>
                                                  @endif 
                                                <td><a href="{{ asset('storage/images/products/'.$product->product_thumbnail) }}"><img style="height:60px;width:60px;" src="{{ asset('storage/images/products/'.$product->product_thumbnail) }}"></a></td>
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