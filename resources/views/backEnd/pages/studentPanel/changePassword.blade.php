@extends('backEnd.layouts.master')
@push('style')
<style>
      .text-end{
          text-align: end;
      }
      .card-header{
        background-color: #1d022d !important;
      }
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
              <li class="breadcrumb-item active">Student Update</li>
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
                <h3 class="card-title" style="text-transform: uppercase;"> Student Update</h3>
                <div class="text-end">
                    <a href="{{ URL::TO('dashboard')}}" class="btn btn-info btn-sm">Back</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
              <div class="card-body">
                <form  action="{{route('password.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <small> Current Password <span class="text-danger">*</span></small>
                                <input type="password" class="form-control  @error('current_password') is-invalid @enderror" name="current_password">
                              @error('current_password')
                              <span class="invalid-feedback" role="alert">
                                  <small>{{ $message }}</small>
                              </span>
                               @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <small> Password <span class="text-danger">*</span></small>
                                <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password">
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <small>{{ $message }}</small>
                              </span>
                               @enderror
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <small> Confirm Password <span class="text-danger">*</span></small>
                                <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password_confirmation">
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <small>{{ $message }}</small>
                              </span>
                               @enderror
                            </div>
                        </div>
                       
                    
                   </div>
                    <div class="footer">
                      <input type="submit" class="btn btn-success  mt-2" value="Update Password">
                    </div>
                </form>
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
