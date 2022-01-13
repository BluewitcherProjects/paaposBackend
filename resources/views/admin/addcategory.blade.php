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

                            <!-- Add category form start -->

                            <form class="form-horizontal" method="POST" action="{{ route('addcategory') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <h4 class="card-title">Add Category</h4>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category_name" class="col-sm-3 text-right control-label col-form-label">Category Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="category Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-3 text-right control-label col-form-label">Category Image</label>
                                        <div class="col-sm-9">
                                            <div class="button-wrap">
                                                <label class ="new-button" for="category_image"> category Image
                                                <input id="category_image" name="category_image" type="file" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-top">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-primary">Add </button>
                                        </div>
                                    </div>
                            </form>

                             <!-- Add category form end -->

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
      
      
      
      
      
      @endsection