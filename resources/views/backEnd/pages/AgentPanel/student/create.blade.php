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
              <li class="breadcrumb-item active">Create Student</li>
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
                <h3 class="card-title" style="text-transform: uppercase;">Create Student </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
                <div class="card-body">
                    <form  action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                              <select class="form-control @error('division_id') is-invalid @enderror" id="Division" name="division_id">
                                <option selected disabled>Selest division <span class="text-danger">*</span></option>
                                @foreach ($divisions as $division)
                                  <option value="{{$division->id}}">{{$division->name}}</option>
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
                                <option selected disabled>Select district <span class="text-danger">*</span></option>
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
                                    <small>Student Name <span class="text-danger">*</span></small>
                                    <input type="text" class="form-control  @error('student_name') is-invalid @enderror" name="student_name" value="{{ old('student_name')}}">
                                  @error('student_name')
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                  </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small> Date of birth <span class="text-danger">*</span></small>
                                    <input type="date" class="form-control  @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth')}}">
                                  @error('date_of_birth')
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                  </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small>Phone Number <span class="text-danger">*</span></small>
                                    <input type="number" class="form-control  @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ old('phone_no')}}">
                                  @error('phone_no')
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                  </span>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <small>Select Religion <span class="text-danger">*</span></small>
                                    <select class="form-control @error('religion') is-invalid @enderror" name="religion">
                                        <option value=" ">Select </option>
                                        <option value="Buddhism">Buddhism</option>
                                        <option value="Christianity">Christianity</option>
                                        <option value="Hinduism">Hinduism</option>
                                        <option value="Islam" selected="">Islam</option>
                                        <option value="Jainism">Jainism</option>
                                        <option value="Judaism">Judaism</option>
                                        <option value="Sikhism">Sikhism</option>
                                        <option value="Others">Others</option>
                                      </select>
                                      @error('religion')
                                      <span class="invalid-feedback" role="alert">
                                          <small>{{ $message }}</small>
                                      </span>
                                       @enderror
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <small>Select gendar <span class="text-danger">*</span></small>
                                    <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                        <option selected value=" ">Select </option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Others</option>
                                      </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                    @enderror 
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <small>Select class name <span class="text-danger">*</span></small>
                                    <select class="form-control @error('class_id') is-invalid @enderror" name="class_id">
                                        <option selected value=" ">Select </option>
                                        @foreach ($class_names as $class_name)
                                          <option value="{{$class_name->id}}">{{$class_name->class_name}}</option>
                                        @endforeach
                                      </select>
                                      @error('class_id')
                                      <span class="invalid-feedback" role="alert">
                                          <small>{{ $message }}</small>
                                      </span>
                                       @enderror
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small> Address </small>
                                    <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address" value="{{ old('address')}}">
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
                                    <input type="text" class="form-control  @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name')}}">
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
                                    <input type="text" class="form-control  @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ old('mother_name')}}">
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
                                    <input type="file" class="form-control" onchange="readURL(this);" name="image" id="formFile">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="text-center student-photo">
                                    <p id="photoId"></p>
                                    <img id="blah" src="" class="img-fluid rounded img-responsive" alt="" >
                                </div>
                            </div>
                       </div>
                        <div class="footer">
                          <input type="submit" class="btn btn-success  mt-2" value="Create">
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
  