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
              <li class="breadcrumb-item active">Profile Update</li>
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
                <h3 class="card-title" style="text-transform: uppercase;"> Profile Update</h3>
                <div class="text-end">
                    <a href="{{ URL::TO('dashboard')}}" class="btn btn-info btn-sm">Back</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
              <div class="card-body">
                <form  action="{{url('profile/update/' .$user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <small>Student Name <span class="text-danger">*</span></small>
                                <input type="text" class="form-control  @error('student_name') is-invalid @enderror" name="student_name"
                                 value="{{$user->student['student_name']}}">
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
                                <input type="date" class="form-control  @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{$user->student['date_of_birth']}}">
                              @error('date_of_birth')
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
                                    <option value="Buddhism" {{$user->student['religion'] == "Buddhism" ? 'selected': null}}>Buddhism</option>
                                    <option value="Christianity" {{$user->student['religion'] == "Christianity" ? 'selected': null}}>Christianity</option>
                                    <option value="Hinduism" {{$user->student['religion'] == "Hinduism" ? 'selected': null}}>Hinduism</option>
                                    <option value="Islam"  {{$user->student['religion'] == "Islam" ? 'selected': null}}>Islam</option>
                                    <option value="Jainism" {{$user->student['religion'] == "Jainism" ? 'selected': null}}>Jainism</option>
                                    <option value="Judaism" {{$user->student['religion']== "Judaism" ? 'selected': null}}>Judaism</option>
                                    <option value="Sikhism" {{$user->student['religion'] == "Sikhism" ? 'selected': null}}>Sikhism</option>
                                    <option value="Others" {{$user->student['religion'] == "Others" ? 'selected': null}}>Others</option>
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
                                    <option value="1" {{$user->student['gender'] == 1 ? 'selected': null}}>Male</option>
                                    <option value="2" {{$user->student['gender'] == 2 ? 'selected': null}}>Female</option>
                                    <option value="3" {{$user->student['gender'] == 3 ? 'selected': null}}>Others</option>
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
                                      <option value="{{$class_name->id}}" {{$class_name->id === $user->student['class_id'] ? 'selected': null}}>{{$class_name->class_name}}</option>
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
                                <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address" value="{{$user->student['address'], old('address')}}">
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
                                <input type="text" class="form-control  @error('father_name') is-invalid @enderror" name="father_name" value="{{$user->student['father_name'], old('father_name')}}">
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
                                <input type="text" class="form-control  @error('mother_name') is-invalid @enderror" name="mother_name" value="{{$user->student['mother_name'], old('mother_name')}}">
                              @error('mother_name')
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
                                <img id="blah" src="{{ asset('storage/app') }}/{{ $user->student['image'] }}" class="img-fluid rounded img-responsive" alt="" >
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
