@extends('layouts.admin')

@section('content')
<style>
      input[type="file"] {
        position: absolute;
        z-index: -1;
        top: 6px;
        left: 0px;
        font-size: 15px;
        color: rgb(153,153,153);
      }
      
      .button-wrap {
        position: relative;
      }.card {
    margin-bottom: 20px;
    padding: 10px;
}
      
      .new-button {
          display: inline-block;
          padding: 8px 12px; 
          cursor: pointer;
          border-radius: 4px;
          background-color: #60106e;
          font-size: 16px;
          color: #fff;
      }
     
      </style>
      
      
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
                                    <h4 class="card-title">Add Brand</h4>
                                  
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Brand Name</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="bname" placeholder="Brand Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label  class="col-sm-3 text-right control-label col-form-label">Product Image</label>
                                        <div class="col-sm-9">
                                            <div class="button-wrap">
                                            <img src="assets/images/background/img4.jpg" style="height: 80px;width:80px">
                                                <label class ="new-button" for="upload"> Change Image
                                                <input id="upload" type="file" >
                                           </div>
                                        </div>
                                    </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary">Add Brand</button>
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
      
      
      
      
      
      @endsection