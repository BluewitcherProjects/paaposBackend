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
                            <form class="form-horizontal" action="{{ route('addorder') }}" method="POST">
                                @csrf
                                    <h4 class="card-title">Add Order</h4>
                                    <div class="form-group row">
                                        <label for="product_id" class="col-sm-3 text-right control-label col-form-label">Product Id</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="product_id" class="form-control" id="product_id" placeholder="Product id">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="product_name" class="col-sm-3 text-right control-label col-form-label">Product Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="product_name" class="form-control" id="product_name" placeholder="product name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="UserName" class="col-sm-3 text-right control-label col-form-label">User Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="UserName" class="form-control" id="UserName" placeholder="User Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="mobile" class="col-sm-3 text-right control-label col-form-label">Mobile</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="Mobile" class="form-control" id="Mobile" placeholder="Mobile number">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Delivery_charge" class="col-sm-3 text-right control-label col-form-label">Delivery Charge</label>
                                        <div class="col-sm-9">
                                            <input type="Number" name="Delivery_charge" class="form-control" id="Delivery_charge" placeholder="Delivery charge">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Pickup_location" class="col-sm-3 text-right control-label col-form-label">Pickup Location</label>
                                        <div class="col-sm-9">
                                        <input type="text" name="Pickup_location" class="form-control" id="Pickup_location" placeholder="Pickup location">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Drop_location" class="col-sm-3 text-right control-label col-form-label">Drop Location</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="Drop_location" class="form-control" id="Drop_location" placeholder="Drop Location">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Cod" class="col-sm-3 text-right control-label col-form-label">COD</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="Cod" class="form-control" id="Cod" placeholder="Cod">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Wallet" class="col-sm-3 text-right control-label col-form-label">Wallet</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="Wallet" class="form-control" id="Wallet" placeholder="Wallet">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Admin_commision" class="col-sm-3 text-right control-label col-form-label">Admin Commision</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="Admin_commision" class="form-control" id="Admin_commision" placeholder="Admin Commision">
                                        </div>
                                    </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" namde="add_submit" class="btn btn-primary">Add Order</button>
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
