@extends('layouts.admin')
@section('content')
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
              <!-- ============================================================== -->
              <!-- Start Page Content -->
              <!-- ============================================================== -->
              <div class="row">
                  <div class="col-md-10">
                      <div class="card">
                          <form class="form-horizontal" method="POST" action="{{ route('editsubcategorybyid',$collection->id) }}" enctype="multipart/form-data">
                            @csrf
                              <div class="card-body">
                                  <h4 class="card-title">Edit SubCategory</h4>
                                  <div class="form-group row">
                                      <label for="category_name" class="col-sm-3 text-right control-label col-form-label">Sub Category Name</label>
                                      <div class="col-sm-9">
                                          <input type="text" id="name" name="name" class="form-control" placeholder="Category" value="{{ $collection->name }}">
                                      </div>
                                  </div>
                                 
                                  <div class="form-group row">
                                      <label for="category_image"  class="col-sm-3 text-right control-label col-form-label">Subcategory Image</label>
                                      <div class="col-sm-9">
                                          <div class="button-wrap">
                                              <img id="image" name="image" src="{{asset('assets/images/subcategory/'.$collection->image) }}" style="height: 80px;width:80px">
                                              <input id="cat_image" name="image" type="file" >
                                          </div>
                                      </div>
                                  </div>   
                                  <div class="border-top">
                                      <div class="card-body">
                                           <input type="number" name="id" value="{{ $collection->id }}" hidden>
                                           <button type="submit" name="edit_category_submit" class="btn btn-primary">Add Edit</button>
                                      </div>
                                  </div>
                           </form>
                      </div>
                  </div>
              </div>
          </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
@endsection