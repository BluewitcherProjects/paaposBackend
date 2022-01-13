
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
                  <div class="col-md-10">
                      <div class="card">
                          <form class="form-horizontal" method="post" action="{{ route('editprofile',$collection->id) }}" enctype="multipart/form-data">
                            @csrf
                              <div class="card-body">
                                  <h4 class="card-title">Edit User</h4>                                 
                                  <div class="form-group row">
                                      <label for="user_id" class="col-sm-3 text-right control-label col-form-label">User Id</label>
                                      <div class="col-sm-9">
                                          <input type="number" class="form-control" value="{{ $collection->id }}" placeholder="User Id" disabled>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="user_name" class="col-sm-3 text-right control-label col-form-label">User name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $collection->name }}" placeholder="User Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label for="user_email" class="col-sm-3 text-right control-label col-form-label">User Email</label>
                                  <div class="col-sm-9">
                                      <input type="email" class="form-control" id="email" name="email" value="{{ $collection->email }}" placeholder="User Email">
                                  </div>
                               </div>
                                <div class="form-group row">
                                  <label for="user_mobile" class="col-sm-3 text-right control-label col-form-label">User Mobile</label>
                                  <div class="col-sm-9">
                                      <input type="number" class="form-control" id="mobile" name=" mobile" value="{{ $collection->mobile }}" placeholder="User Mobile">
                                  </div>
                               </div>
                               <div class="form-group row">
                                <label for="user_store" class="col-sm-3 text-right control-label col-form-label">User Store</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="store" name="store" value="{{ $collection->store }}" placeholder="User Store">
                                </div>
                             </div>
                              <div class="form-group row">
                                <label for="user_store" class="col-sm-3 text-right control-label col-form-label">User Business</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="business" name="business" value="{{ $collection->business }}" placeholder="User business">
                                </div>
                             </div>
                          
                                  <div class="form-group row">
                                      <label for="profile" class="col-sm-3 text-right control-label col-form-label">Profile</label>
                                      <div class="col-sm-9">
                                          <div class="button-wrap">
                                          <img id="profile" name="profile" src="{{ asset('assets/images/profile/'.$collection->profile) }}" style="height: 80px;width:80px">
                                              <label class ="new-button" for="upload"> Change Image
                                              <input id="input_brand_image" name="profile" type="file" >
                                          </div>
                                      </div>
                                  </div>
                              <div class="border-top">
                                  <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Add Edit</button>
                                     
                                  </div>
                              </div>
                          </form>
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