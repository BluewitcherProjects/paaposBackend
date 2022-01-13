
@extends('layouts.admin')

@section('content')
<style>
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
  <!-- ============================================================== -->
            @if(session()->has('message'))
            <div class="alert">
              <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
              <h4><b>{{ session()->get('message') }}</b></h4>
            </div>
            @endif
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
              <div class="row mb-4">
                  <a class="btn btn-success float-left" href="{{ route('category-file-export') }}">Export to CSV</a>&nbsp;&nbsp;
                  <a class="btn btn-success float-right" href="{{ route('categorys-pdf') }}">Export to PDF</a>
               </div>
              <!-- ============================================================== -->
              <!-- Start Page Content -->
              <!-- ============================================================== -->
              <div class="row">
                  <div class="col-12">
                     
                      <div class="card">
                          <div class="card-body">
                             <div class="row">
                                <div class="col-md-6">
                              <h2 class="card-title">Category</h2>
                              <a href="addcategory" class="btn btn-dark mt-2 mb-2">Add New Category</a>
                            </div>
                              <div class="col-md-6">
                                <form method="GET" action="{{ route('catsearch') }}">
                                <div class="form-group row">
                                    @if ($errors->any())
                                   <!-- <div class="alert alert-danger"> -->
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    <!-- </div> -->
                                @endif
                                <div class="col-sm-10">
                                  <input type="text" name="query" class="form-control" placeholder="Search category name">

                                </div>
                                <button type="submit" class="btn btn-primary">Search</button>
                              </div>
                              </form>
                               </div>
                             </div>
                              <div class="table-responsive">
                                  <table id="myTable" class="table table-striped table-bordered tablesorter">
                                      <thead>
                                          <tr class="bg-cyan">
                                              <th> <h6 class="text-light">Category Id</h6></th>
                                              <th> <h6 class="text-light">Category Name</h6></th>
                                              <th> <h6 class="text-light">Category Image</h6></th>
                                              <th> <h6 class="text-light">Edit</h6></th>
                                              <th> <h6 class="text-light">Delete</h6></th>        
                                          </tr>
                                      </thead>
                                      <tbody>
                                            @foreach ($collection as $category)
                                            <tr>

                                              <td>{{ $category->id }}</td>
                                              <td>{{ $category->name }}</td>
                                              <td><a href="#"><img style="height:60px;width:60px;" src="{{ asset('assets/images/category/').'/'.$category->image }}"></a></td>
                                              <td><a href="{{ route('editcategory',$category->id) }}" class="btn btn-primary">Edit</a></td>
                                              <td><a href="{{ route('deletecategory',$category->id) }}" class="btn btn-danger">Delete</a></button></td>
                                            </tr>
                                            @endforeach  
                                      </tbody>
                                      <tfoot>
                                        
                                      </tfoot>
                                  </table>
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