@extends('backEnd.layouts.master')
@push('style')
<style>
      #blah{ width: 200px !important; height: auto !important; }
      input[type=file]{
      padding:10px;}
</style>
@endpush

@section('content')
    
  <!-- Navbar -->
  @include('backEnd.include.navbar')

  <!-- /.navbar end -->

  <!-- Main Sidebar Container -->
  @include('backEnd.include.sidebar')
  <!-- Main Sidebar Container End -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
			 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Agent Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
  
        
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title" style="text-transform: uppercase;">Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <img class="img-fluid img-rounded" src="{{ asset('storage/app') }}/{{ $agent->profile_photo_path }}" class="elevation-2" alt="">
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <table id="example1" class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td>Name </td>
                                    <td>{{$agent->name}}</td>
                                </tr>
                                <tr>
                                    <td>Father Name</td>
                                    <td>{{$agent->father_name}}</td>
                                </tr>
                                <tr>
                                    <td>Mother Name</td>
                                    <td>{{$agent->mother_name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$agent->email}}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{$agent->phone_no}}</td>
                                </tr>
                                <tr>
                                    <td>NID </td>
                                    <td>{{$agent->nid_no}}</td>
                                </tr>
                                <tr>
                                    <td>Division Name</td>
                                    <td>{{$agent->div_name}}</td>
                                </tr>
                                <tr>
                                    <td>District Name</td>
                                    <td>{{$agent->dist_name}}</td>
                                </tr>
                                <tr>
                                    <td>Upozilla Name</td>
                                    <td>{{$agent->upa_name}}</td>
                                </tr>
                                <tr>
                                    <td>Union Name</td>
                                    <td>{{$agent->uni_name}}</td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>{{$agent->address}}</td>
                                </tr>
                            </tbody>
                        </table>   
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @endsection

  