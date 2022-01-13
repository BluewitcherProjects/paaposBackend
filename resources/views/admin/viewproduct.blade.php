
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
</style>
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
                                <h2 class="card-title">View Product</h2>
                                  <div class="form-group row">
                                    <label  class="col-sm-3 text-right control-label col-form-label">Product thumbnail:</label>
                                    <div class="col-sm-9">
                                        <div class="button-wrap">
                                            <img style="height:150px;width:200px;float:center;" src="{{ asset('assets/images/product/').'/'.$product->image }}">
                                        </div>
                                    </div>
                                </div>
                                  <div class="form-group row">
                                      <label for="sku" class="col-sm-3 text-right control-label col-form-label">Product Name</label>
                                      <div class="col-sm-9">
                                          <h6 id="sku" name="sku">{{ $product->name }}</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="unit" class="col-sm-3 text-right control-label col-form-label">Product Category</label>
                                      <div class="col-sm-9">
                                        <h6 id="unit" name="unit">{{ $category }}</h6>
                                      </div>
                                  </div>


                                  <div class="form-group row">
                                      <label for="unit" class="col-sm-3 text-right control-label col-form-label">Product Sub-Category</label>
                                      <div class="col-sm-9">
                                        <h6 id="unit" name="unit">{{ $subcategory }}</h6>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label for="brand" class="col-sm-3 text-right control-label col-form-label">Product Price</label>
                                      <div class="col-sm-9">
                                        <h6 id="brand" name="brand">{{ $product->price }}</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="category" class="col-sm-3 text-right control-label col-form-label">SKU</label>
                                      <div class="col-sm-9">
                                        <h6 id="category" name="category">{{ $product->sku }}</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="product_mrp" class="col-sm-3 text-right control-label col-form-label">Quantity</label>
                                      <div class="col-sm-9">
                                        <h6 id="product_mrp" name="product_mrp">{{ $product->quantity }}</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="product_price" class="col-sm-3 text-right control-label col-form-label">Product Unit</label>
                                      <div class="col-sm-9">
                                        <h6 id="product_price" name="product_price">{{ $product->unit }}</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="retailer_margin" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                      <div class="col-sm-9">
                                        <h6 id="retailer_margin" name="retailer_margin">{{ $product->description }}</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="gst" class="col-sm-3 text-right control-label col-form-label">Product Status</label>
                                      <div class="col-sm-9">
                                        <h6 id="gst" name="gst">{{ $product->status == '0' ? 'Deactive':'Active' }}</h6>
                                      </div>
                                  </div>
                                 
                                  
                                <div class="form-group row">
                                  <label for="stock" class="col-sm-3 text-right control-label col-form-label">In Stock</label>
                                  <div class="col-sm-9">
                                    <h6 id="stock" name="stock">{{ $product->in_stock == '0' ? 'Sold' : 'Available' }}</h6>
                                  </div>
                              </div>
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