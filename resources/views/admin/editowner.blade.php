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
                            <form class="form-horizontal" action="{{ route('editowner') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <h4 class="card-title">Edit Owner</h4>
                                      <input value="{{$owne->id}}" name="id" hidden>
                                    <div class="form-group row">
                                        <label for="owner_name" class="col-sm-3 text-right control-label col-form-label">Owner Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="owner_name" class="form-control" id="order_name" placeholder="{{$owne->ownerName}}" value="{{$owne->ownerName}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="email" value="{{$owne->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="wno" class="form-control" id="phone" placeholder="phone" value="{{$owne->WNo}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="skype" class="col-sm-3 text-right control-label col-form-label">Skype Id</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="skype" class="form-control" id="skype" placeholder="skype" value="{{$owne->skypeId}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="business" class="col-sm-3 text-right control-label col-form-label">Business</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="business" class="form-control" id="business" placeholder="business" value="{{$owne->businessName}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gst" class="col-sm-3 text-right control-label col-form-label">Gst</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="gst" class="form-control" id="gst" placeholder="GST" value="{{$owne->GST}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="brand_image" class="col-sm-3 text-right control-label col-form-label">Profile</label>
                                        <div class="col-sm-9">
                                            <div class="button-wrap">
                                            <img id="brand_image" name="brand_image" src="{{asset('input_brand_image')}}/{{$owne->proileImg}}" style="height: 80px;width:80px">
                                                <label class ="new-button" for="upload"> Change Image
                                                <input  name="input_brand_image" id="upload" type="file" >
                                            </div>
                                        </div>
                                    </div>
                                   <div class="border-top">
                                        <div class="card-body">
                                             <button type="submit" name="edit_retailer_submit" class="btn btn-primary">Edit Owner</button>
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
