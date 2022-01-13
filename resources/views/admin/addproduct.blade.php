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
      .fa-trash:hover
{
  opacity:0.8;
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
          <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-10">
                        <div class="card">
                            <form class="form-horizontal" method="post" action="{{ route('addproduct') }}" enctype="multipart/form-data">
                                @csrf
                                    <h4 class="card-title">Add Product</h4>
                                    <div class="form-group row">
                                        <label for="product_name" class="col-sm-3 text-right control-label col-form-label">Product Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" id="Product_name" placeholder="Product Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="product_price" class="col-sm-3 text-right control-label col-form-label">Product Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="price" class="form-control" id="product_price" placeholder="Product Price">
                                        </div>
                                    </div>
                                  
                                    <div class="form-group row">
                                        <label for="product_category" class="col-sm-3 text-right control-label col-form-label">Product Category</label>
                                        <div class="col-sm-9">
                                                <select class="form-control" id="cat" name="category_id" >
                                                    <option value="">--Select--</option>
                                                @foreach ($category as $categor)
    
                                                  <option value="{{ $categor->id }}">{{ $categor->name }}</option>

                                                @endforeach
                                                </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_category" class="col-sm-3 text-right control-label col-form-label">Product Sub-Category</label>
                                        <div class="col-sm-9">
                                                <select class="form-control" id="subcat" name="sub_category_id" >
                                                
                                                </select>
                                        </div>
                                    </div>


                                  
                                   


                                    <div class="form-group row">
                                        <label for="product_discount" class="col-sm-3 text-right control-label col-form-label">Quantity</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Stock">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_discount" class="col-sm-3 text-right control-label col-form-label">Product SKU</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="sku" id="product_discount" placeholder="product sku">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_category" class="col-sm-3 text-right control-label col-form-label">Product Unit</label>
                                        <div class="col-sm-9">
                                                <select class="form-control" name="unit" >
                                                  <option value="Piece">Piece</option>
                                                  <option value="Piece">KG</option>
                                                  <option value="Piece">Packet</option>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="product_category" class="col-sm-3 text-right control-label col-form-label">Product Status</label>
                                        <div class="col-sm-9">
                                                <select class="form-control" name="status" >
                                                  <option value="1">Active</option>
                                                  <option value="0">Deactive</option>
                                                </select>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label for="product_category" class="col-sm-3 text-right control-label col-form-label">In Stock</label>
                                        <div class="col-sm-9">
                                                <select class="form-control" name="in_stock" >
                                                <option value="1">Available</option>
                                                  <option value="0">Sold</option>
                                                </select>
                                        </div>
                                    </div>

                                  
                                    <div class="form-group row">
                                        <label  class="col-sm-3 text-right control-label col-form-label">Product Image</label>
                                        <div class="col-sm-9">
                                            <div class="button-wrap">
                                                <label class ="new-button" for="product_thumbnail"> Upload Image
                                                <input type="file" id="product_thumbnail" name="image">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="product_description" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea id="summernote1"></textarea>
                                            <input type="text" name="description" class="product_description" id="product_description" hidden>
                                        </div>
                                    </div>

                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" id="addsubmit" class="btn btn-primary">Add Product</button>
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
            <script>
            $(document).ready(function()
            {
            $("#addsubmit").on('click', function()
            {
                var a=$($("#summernote").summernote("code")).html();
                $("#product_features").val(a);
                var b=$($("#summernote1").summernote("code")).html();
                $("#product_description").val(b);
                var c=$($("#summernote2").summernote("code")).html();
                $("#user_credential").val(c);
                var d=$($("#summernote3").summernote("code")).html();
                $("#admin_credential").val(d);
            });
            $("#product_gallery").change(function(e){

                for(var i=0;i<this.files.length;i++)
                   {
                       var img = $('<img />', { 
                       id: 'imgid',
                       height: '80',
                       width: '80',
                       style: 'padding:5px;height:80px;',
                       src: URL.createObjectURL(e.target.files[i]),
                       alt: 'images'
                    });
           img.appendTo($("#getimages"));
         }                 

            });
        });



var $cat=$('#cat');
var $subcat=$('#subcat');


$cat.on('change',function(){
    var id =$(this).val();


    $.ajax({
        method: "GET",
        url: "{{route('getSubCat')}}",
        data: { cat_id: id, location: "Boston" }
        })
        .done(function( msg ) {
           
           $subcat.html(msg);
           
        });
})


            </script>
      @endsection