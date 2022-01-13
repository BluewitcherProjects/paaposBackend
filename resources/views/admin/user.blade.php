
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
@if(session()->has('message'))
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <h4><b>{{ session()->get('message') }}</b></h4>
</div>
@endif
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
               <div class="row mb-4">
                  <a class="btn btn-success float-left" href="{{ route('file-export') }}">Export to CSV</a>&nbsp;&nbsp;
                  <a class="btn btn-success float-right" href="{{ route('users-pdf') }}">Export to PDF</a>
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
                                <h2 class="card-title">Users</h2></div>
                                <div class="col-md-6">
                                <form method="GET" action="{{ route('search') }}">
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
                                  <input type="text" name="query" class="form-control" placeholder="Search by id and name">

                                </div>
                                <button type="submit" class="btn btn-primary">Search</button>
                              </div>
                              </form>
                               </div>
                               
                                </div>
                               <!-- <a href="{{route('adduser')}}" class="btn btn-dark mt-2 mb-2">Add User</a> -->
                                <div class="table-responsive">
                                    <table id="myTable" class="table table-striped table-bordered tablesorter">
                                        <thead>
                                            <tr class="bg-cyan">
                                                <th> <h6 class="text-light">Id</h6></th>
                                                <th> <h6 class="text-light">User Name</h6></th>
                                                <th> <h6 class="text-light">Email</h6></th>
                                                <th> <h6 class="text-light">Phone</h6></th>
                                                <th> <h6 class="text-light">Store</h6></th>
                                                <th> <h6 class="text-light">Business</h6></th>
                                               
                                                <th> <h6 class="text-light">Profile</h6></th>
                                                <th> <h6 class="text-light">location</h6></th>
                                                 <th> <h6 class="text-light">Verified</h6></th>
                                                 <th>   <h6 class="text-light">View</h6></th>
                                                <th>   <h6 class="text-light">Edit</h6></th>
                                                <th>   <h6 class="text-light">Delete</h6></th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($collection as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->mobile }}</td>
                                                <td>{{ $user->store }}</td>
                                                <td>{{ $user->business }}</td>
                                                <td><a href="#"><img style="height:60px;width:60px;" src="{{ asset('assets/images/profile/'.$user->profile) }}"></a></td>
                                                <td>{{ $user->location }}</td>
                                                <td>@if ($user->verified == 'no')
                                                  <a href="{{ route('statusupdate',$user->id) }}" class="btn btn-danger">Verify</a>
                                                @else
                                                 <h2 class="btn btn-success">Verified</h2>
                                                @endif</td>

                                                <td><a href="viewuser/{{ $user->id }}" class="btn btn-primary">View</a></td>
                                                <td><a href="edituser/{{ $user->id }}" class="btn btn-primary">Edit</a></td>
                                                <td><a href="delete/{{ $user->id }}" class="btn btn-danger">Delete</a></td>

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