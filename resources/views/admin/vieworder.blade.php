
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
                  <div class="col-md-10">
                      <div class="card">
                          <form class="form-horizontal">
                              <div class="card-body">
                                  <h4 class="card-title">My Store</h4>
                                  <div class="form-group row">
                                    <label  class="col-sm-3 text-right control-label col-form-label">Store Image: </label>
                                    <div class="col-sm-9">
                                        <div class="button-wrap">
                                            <img style="height:150px;width:200px;float:center;" src="assets/images/background/img4.jpg">
                                        </div>
                                    </div>
                                </div>
                                  <div class="form-group row">
                                      <label for="store_name" class="col-sm-3 text-right control-label col-form-label">Store Name: </label>
                                      <div class="col-sm-9">
                                          <h6 id="store_name" name="store_name">bigbazar</h6>
                                      </div>
                                  </div>
                                
                                  </div>
                                  <div class="form-group row">
                                      <label for="gst" class="col-sm-3 text-right control-label col-form-label">GST: </label>
                                      <div class="col-sm-9">
                                        <h6 id="gst" name="gst">CADPV4467Q</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="pan" class="col-sm-3 text-right control-label col-form-label">Pan: </label>
                                      <div class="col-sm-9">
                                        <h6 id="pan" name="pan">CADPV4467Q</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="email" class="col-sm-3 text-right control-label col-form-label">Email: </label>
                                      <div class="col-sm-9">
                                        <h6 id="email" name="email">shop@growdeal.com</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="website" class="col-sm-3 text-right control-label col-form-label">Website(optional): </label>
                                      <div class="col-sm-9">
                                        <h6 id="website" name="website">www.growdeal.com</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="phone" class="col-sm-3 text-right control-label col-form-label">Phone No(optional): </label>
                                      <div class="col-sm-9">
                                        <h6 id="phone" name="phone">+52456465</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="mobile" class="col-sm-3 text-right control-label col-form-label">Mobile No: </label>
                                      <div class="col-sm-9">
                                        <h6 id="mobile" name="mobile">+91765757878</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="address" class="col-sm-3 text-right control-label col-form-label">Address: </label>
                                      <div class="col-sm-9">
                                        <h6 id="address" name="address">Lucknow</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="contact_person" class="col-sm-3 text-right control-label col-form-label">Contact Person: </label>
                                      <div class="col-sm-9">
                                        <h6 id="contact_person" name="contact_person">Mr Ajay</h6>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <label for="store_type" class="col-sm-3 text-right control-label col-form-label">Store Type: </label>
                                      <div class="col-sm-9">
                                        <h6 id="store_type" name="store_type">Grocery</h6>
                                      </div>
                                  </div>
                      </div>
                  </div>
              </div>
              <!-- editor -->
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