@extends('backEnd.layouts.master')
@push('style')
<style>
      #blah{ width: 200px !important; height: auto !important; }
      input[type=file]{
      padding:10px;}
      .text-end{
          text-align: end;
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
                    <a href="{{ URL::TO('student/managefor/admin')}}" class="btn btn-info btn-sm">Back</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
                <div class="card-body">
                    <form  action="{{url('student/update/foradmin/' .$user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-3 col-md-3">
                                <div class="form-group">
                                    <small>Student Name <span class="text-danger">*</span></small>
                                    <input type="text" class="form-control  @error('student_name') is-invalid @enderror" name="student_name"
                                     value="{{$user->student_name}}">
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
                                    <input type="date" class="form-control  @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{$user->date_of_birth}}">
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
                                    <input type="number" class="form-control  @error('phone_no') is-invalid @enderror" name="phone_no" 
                                    value="{{$user->phone_no}}">
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
                                        <option value="Buddhism" {{$user->religion == "Buddhism" ? 'selected': null}}>Buddhism</option>
                                        <option value="Christianity" {{$user->religion == "Christianity" ? 'selected': null}}>Christianity</option>
                                        <option value="Hinduism" {{$user->religion == "Hinduism" ? 'selected': null}}>Hinduism</option>
                                        <option value="Islam"  {{$user->religion == "Islam" ? 'selected': null}}>Islam</option>
                                        <option value="Jainism" {{$user->religion == "Jainism" ? 'selected': null}}>Jainism</option>
                                        <option value="Judaism" {{$user->religion== "Judaism" ? 'selected': null}}>Judaism</option>
                                        <option value="Sikhism" {{$user->religion == "Sikhism" ? 'selected': null}}>Sikhism</option>
                                        <option value="Others" {{$user->religion == "Others" ? 'selected': null}}>Others</option>
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
                                        <option value="1" {{$user->gender == 1 ? 'selected': null}}>Male</option>
                                        <option value="2" {{$user->gender == 2 ? 'selected': null}}>Female</option>
                                        <option value="3" {{$user->gender == 3 ? 'selected': null}}>Others</option>
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
                                          <option value="{{$class_name->id}}" {{$class_name->id === $user->class_id ? 'selected': null}}>{{$class_name->class_name}}</option>
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
                                    <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address" value="{{$user->address, old('address')}}">
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
                                    <input type="text" class="form-control  @error('father_name') is-invalid @enderror" name="father_name" value="{{$user->father_name, old('father_name')}}">
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
                                    <input type="text" class="form-control  @error('mother_name') is-invalid @enderror" name="mother_name" value="{{$user->mother_name, old('mother_name')}}">
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
                                    <img id="blah" src="{{ asset('storage/app') }}/{{ $user->image }}" class="img-fluid rounded img-responsive" alt="" >
                                </div>
                            </div>
                       </div>
                        <div class="footer">
                          <input type="submit" class="btn btn-success  mt-2" value="Update">
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
