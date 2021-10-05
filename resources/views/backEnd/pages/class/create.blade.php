@extends('backEnd.layouts.master')
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
              <li class="breadcrumb-item active">Add class</li>
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
          <div class="col-md-8 offset-md-1">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Class Name </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
                <div class="card-body">
                        <form  action="{{route('class.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                    <small>Add class name <span class="text-danger">*</span></small>
                                    <input type="text" name="class_name" class="form-control @error('class_name') is-invalid @enderror"  placeholder="" value="{{ old('class_name')}}">
                                    @error('class_name')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                     @enderror
                                </div>
                            </div>
                       </div>
                        <div class="card-footer">
                          <input type="submit" class="btn btn-success" value="Add Class">
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
  