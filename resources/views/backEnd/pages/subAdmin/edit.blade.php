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
              <li class="breadcrumb-item active">Update Sub-admin</li>
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
                <h3 class="card-title" style="text-transform: uppercase;">Update Sub-admin </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
                <div class="card-body">
                    <form  action="{{url('subadmin/update/'.$subadmin->id)}}" method="POST" enctype="multipart/form-data">
                         @csrf
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small> Name <span class="text-danger"></span></small>
                                    <input type="text" class="form-control" name="name" value="{{$subadmin->name}}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small> Email <span class="text-danger">*</span></small>
                                    <input type="email" class="form-control" name="email" value="{{$subadmin->email}}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small> Number <span class="text-danger"></span></small>
                                    <input type="number" class="form-control" name="phone_no" value="{{$subadmin->phone_no}}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small> Address <span class="text-danger"></span></small>
                                    <input type="text" class="form-control" name="address" value="{{$subadmin->address}}">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small> Password <span class="text-danger"></span></small>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small> Confirm Password <span class="text-danger"></span></small>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small> Profile Photo </small>
                                    <input type="file" class="form-control" onchange="readURL(this);" name="profile_photo_path" id="formFile">
                                  {{-- @error('profile_photo_path')
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                  </span>
                                   @enderror --}}
                                </div>
                            </div>
                          <div class="col-lg-3 col-md-3">
                              <div class="text-center student-photo">
                                  <p id="photoId"></p>
                                  <img id="blah" src="{{ asset('storage/app') }}/{{ $subadmin->profile_photo_path }}" class="img-fluid rounded img-responsive" alt="" >
                              </div>
                          </div>
                            
                       </div>
                        <div class="footer">
                          <input type="submit" class="btn btn-success" value="Update">
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
 
  <script>
    function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();
                console.log(reader)
             reader.onload = function (e) {
                 $('#blah')
                     .attr('src', e.target.result);
             };

             reader.readAsDataURL(input.files[0]);
         }
     }
</script>

  @endsection
