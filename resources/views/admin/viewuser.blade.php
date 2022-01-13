
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
                        <h4 class="page-title">User</h4>
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
                                <h2 class="card-title">View User</h2>
                                 <!-- <div class="form-group row">
                                    <label  class="col-sm-3 text-right control-label col-form-label">User thumbnail:</label>
                                    <div class="col-sm-9">
                                        <div class="button-wrap">
                                            <img style="height:150px;width:200px;float:center;" src="{{ asset('assets/images/product/').'/'.$user->image }}">
                                        </div>
                                    </div>
                                </div> -->
                                  <div class="form-group row">
                                      <label for="sku" class="col-sm-3 text-right control-label col-form-label">User Name</label>
                                      <div class="col-sm-9">
                                          <h6 id="sku" name="sku">{{ $user->name }}</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="unit" class="col-sm-3 text-right control-label col-form-label">User Email</label>
                                      <div class="col-sm-9">
                                        <h6 id="unit" name="unit">{{ $user->email }}</h6>
                                      </div>
                                  </div>


                                  <div class="form-group row">
                                      <label for="unit" class="col-sm-3 text-right control-label col-form-label">User Mobile</label>
                                      <div class="col-sm-9">
                                        <h6 id="unit" name="unit">{{ $user->mobile }}</h6>
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                      <label for="brand" class="col-sm-3 text-right control-label col-form-label">User Store</label>
                                      <div class="col-sm-9">
                                        <h6 id="brand" name="brand">{{ $user->store }}</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="category" class="col-sm-3 text-right control-label col-form-label">User Profile</label>
                                      <div class="col-sm-9">
                                        <a href="#"><img style="height:60px;width:60px;" src="{{ asset('assets/images/profile/'.$user->profile) }}"></a>
                                       <!-- <h6 id="category" name="category">{{ $user->sku }}</h6> -->
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="product_mrp" class="col-sm-3 text-right control-label col-form-label">Business</label>
                                      <div class="col-sm-9">
                                        <h6 id="product_mrp" name="product_mrp">{{ $user->business }}</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="product_price" class="col-sm-3 text-right control-label col-form-label">Location</label>
                                      <div class="col-sm-9">
                                        <h6 id="product_price" name="product_price">{{ $user->location }}</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="retailer_margin" class="col-sm-3 text-right control-label col-form-label">Bank Name</label>
                                      <div class="col-sm-9">
                                        <h6 id="retailer_margin" name="retailer_margin">{{ $user->bankName }}</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="gst" class="col-sm-3 text-right control-label col-form-label">A/C No : </label>
                                      <div class="col-sm-9">
                                        <h6 id="gst" name="gst">{{ $user->accountNo }}</h6>
                                      </div>
                                  </div>
                                 
                                  
                                <div class="form-group row">
                                  <label for="stock" class="col-sm-3 text-right control-label col-form-label">IFSC Code: </label>
                                  <div class="col-sm-9">
                                    <h6 id="stock" name="stock">{{ $user->  ifsc }}</h6>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="stock" class="col-sm-3 text-right control-label col-form-label">A/C Holder : </label>
                                  <div class="col-sm-9">
                                    <h6 id="stock" name="stock">{{ $user->  accountHolder  }}</h6>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="stock" class="col-sm-3 text-right control-label col-form-label">Bank Linked No: </label>
                                  <div class="col-sm-9">
                                    <h6 id="stock" name="stock">{{ $user->  bankLinkedNo }}</h6>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label for="stock" class="col-sm-3 text-right control-label col-form-label">Aadhar No: </label>
                                  <div class="col-sm-9">
                                    <h6 id="stock" name="stock">{{ $user->    aadhar_no }}</h6>
                                  </div>
                              </div>
                              <div class="form-group row">
                                      <label for="category" class="col-sm-3 text-right control-label col-form-label">Aadhar Front</label>
                                      <div class="col-sm-9">
                                        <a href="{{ asset('assets/images/aadhar/'.$user->aadharFront) }}" target="_blank"><img style="height:60px;width:60px;" src="{{ asset('assets/images/aadhar/'.$user->aadharFront) }}"></a>
                                       <!-- <h6 id="category" name="category">{{ $user->sku }}</h6> -->
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="category" class="col-sm-3 text-right control-label col-form-label">Aadhar Back</label>
                                      <div class="col-sm-9">
                                        <a href="{{ asset('assets/images/aadhar/'.$user->aadharBack) }}" target="_blank"><img style="height:60px;width:60px;" src="{{ asset('assets/images/aadhar/'.$user->aadharBack) }}"></a>
                                       <!-- <h6 id="category" name="category">{{ $user->sku }}</h6> -->
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                  <label for="stock" class="col-sm-3 text-right control-label col-form-label">Pan No: </label>
                                  <div class="col-sm-9">
                                    <h6 id="stock" name="stock">{{ $user->    pan }}</h6>
                                  </div>
                              </div>
                              <div class="form-group row">
                                      <label for="category" class="col-sm-3 text-right control-label col-form-label">Pan Docs</label>
                                      <div class="col-sm-9">
                                        <a href="{{ asset('assets/images/pancard/'.$user->pandoc) }}" target="_blank"><img style="height:60px;width:60px;" src="{{ asset('assets/images/pancard/'.$user->pandoc) }}"></a>
                                       <!-- <h6 id="category" name="category">{{ $user->sku }}</h6> -->
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                  <label for="stock" class="col-sm-3 text-right control-label col-form-label">GST No: </label>
                                  <div class="col-sm-9">
                                    <h6>{{ $user->gst }}</h6>
                                  </div>
                              </div>
                              <div class="form-group row">
                                      <label for="docs" class="col-sm-3 text-right control-label col-form-label">GST Docs</label>
                                      <div class="col-sm-9">
                                        <a href="{{ asset('assets/images/gst-docs/'.$user->gstDoc) }}" target="_blank"><img style="height:60px;width:60px;" src="{{ asset('assets/images/gst-docs/'.$user->gstDoc) }}"></a>
                                       <!-- <h6 id="category" name="category">{{ $user->sku }}</h6> -->
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                  <label for="verified" class="col-sm-3 text-right control-label col-form-label">User Verified: </label>
                                  <div class="col-sm-9">
                                    <h6>{{ $user->verified }}</h6>
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