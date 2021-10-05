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
              <li class="breadcrumb-item active">Update Agent</li>
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
                <h3 class="card-title" style="text-transform: uppercase;">Update Agent </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
                <div class="card-body">
                        <form  action="{{url('agent/update/' .$agent->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                  <select class="form-control @error('division_id') is-invalid @enderror" id="Division" name="division_id">
                                    <option selected disabled>Selest division <span class="text-danger">*</span></option>
                                    @foreach ($divisions as $division)
                                      <option value="{{$division->id}}" {{ $division->id == $agent->div_id ? 'selected': ''}}>{{$division->name}}</option>
                                    @endforeach
                                  </select>
                                  @error('division_id')
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                  </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                  <select class="form-control @error('district_id') is-invalid @enderror" id="district" name="district_id">
                                    <option selected disabled >Select district <span class="text-danger">*</span></option>
                                  </select>
                                  @error('district_id')
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                  </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                  <select class="form-control @error('upazilla_id') is-invalid @enderror" id="upazila" name="upazilla_id">
                                    <option selected disabled>Select upozilla <span class="text-danger">*</span></option>
                                  </select>
                                  @error('upazilla_id')
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                  </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                  <select class="form-control @error('union_id') is-invalid @enderror" id="union" name="union_id">
                                    <option selected disabled>Select union <span class="text-danger">*</span></option>
                                  </select>
                                  @error('union_id')
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                  </span>
                                   @enderror
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small> Name <span class="text-danger">*</span></small>
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{$agent->name, old('name')}}">
                                  @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                  </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                              <div class="form-group">
                                  <small> Email <span class="text-danger">*</span></small>
                                  <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{$agent->email}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                                 @enderror
                              </div>
                          </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small> Number <span class="text-danger">*</span></small>
                                    <input type="number" class="form-control  @error('phone_no') is-invalid @enderror" name="phone_no" value="{{$agent->phone_no, old('phone_no')}}">
                                  @error('phone_no')
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                  </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small> NID <span class="text-danger">*</span></small>
                                    <input type="number" class="form-control  @error('nid_no') is-invalid @enderror" name="nid_no" value="{{$agent->nid_no, old('nid_no')}}">
                                  @error('nid_no')
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                  </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small> Address <span class="text-danger">*</span></small>
                                    <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address" value="{{$agent->address, old('address')}}">
                                  @error('address')
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                  </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small> Father Name <span class="text-danger">*</span></small>
                                    <input type="text" class="form-control  @error('father_name') is-invalid @enderror" name="father_name" value="{{$agent->father_name, old('father_name')}}">
                                  @error('father_name')
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                  </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small> Mother Name <span class="text-danger">*</span></small>
                                    <input type="text" class="form-control  @error('mother_name') is-invalid @enderror" name="mother_name" value="{{$agent->mother_name, old('mother_name')}}">
                                  @error('mother_name')
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                  </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
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
                          <div class="col-lg-3 col-md-3">
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
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small> Profile Photo </small>
                                    <input type="file" class="form-control" onchange="readURL(this);" name="profile_photo_path" id="formFile">
                                
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="text-center student-photo">
                                    <p id="photoId"></p>
                                    <img id="blah" src="{{ asset('storage/app') }}/{{ $agent->profile_photo_path }}" class="img-fluid rounded img-responsive" alt="" >
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

  @push('script')

  <script type=text/javascript>
    $('#Division').change(function(){
    var division_id = $(this).val();
    if(division_id){
      $.ajax({
        type:"GET",
        url:"{{url('get-district-list')}}?division_id="+division_id,
        success:function(res){
          // console.log(res)
        if(res){
          $("#district").empty();
          $("#upazila").html('<option selected disabled>Please select Upazila*</option>');
          $("#district").append('<option selected disabled>Please select District*</option>');
          $.each(res,function(key,value){
            $("#district").append('<option value="'+key+'">'+value+'</option>');
          });

        }else{
          $("#district").empty();
        }
        }
      });
    }else{
      $("#district").empty();
      $("#upazila").empty();
    }
    });
    $('#district').on('change',function(){
    var district_id = $(this).val();
    if(district_id){
      $.ajax({
        type:"GET",
        url:"{{url('get-upazila-list')}}?district_id="+district_id,
        success:function(res){
        if(res){
          $("#upazila").empty();
          $("#upazila").append('<option selected disabled>Please select Upazila*</option>');
          $.each(res,function(key,value){
            $("#upazila").append('<option value="'+key+'">'+value+'</option>');
          });

        }else{
          $("#upazila").empty();
        }
        }
      });
    }else{
      $("#upazila").empty();
    }

    });
    $('#upazila').on('change',function(){
    var upazilla_id  = $(this).val();
    if(upazilla_id){
      $.ajax({
        type:"GET",
        url:"{{url('get-unions-list')}}?upazilla_id="+upazilla_id,
        success:function(res){
        if(res){
          $("#union").empty();
          $("#union").append('<option selected disabled>Please select Union*</option>');
          $.each(res,function(key,value){
            $("#union").append('<option value="'+key+'">'+value+'</option>');
          });

        }else{
          $("#union").empty();
        }
        }
      });
    }else{
      $("#union").empty();
    }

    });
  </script>

      
  @endpush
  