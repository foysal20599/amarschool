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
              <li class="breadcrumb-item active">Update Union</li>
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
          <div class="col-md-10 offset-md-1">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Update Union </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <small>write your division name <span class="text-danger">*</span></small>
                                  <select class="form-control @error('division_id') is-invalid @enderror" id="Division" name="division_id">
                                    <option selected disabled>Selest division</option>
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
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <small>write your district name <span class="text-danger">*</span></small>
                                  <select class="form-control @error('district_id') is-invalid @enderror" id="district" name="district_id">
                                    <option selected disabled>Select district</option>
                                  </select>
                                  @error('district_id')
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                  </span>
                                   @enderror
                                </div>
                              </div>
                        </div>
                        <form  action="{{URL::to('update/union/' .$union->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <small>write your upozilla name <span class="text-danger">*</span></small>
                                  <select class="form-control @error('upazilla_id') is-invalid @enderror" id="upazila" name="upazilla_id">
                                    <option selected disabled>Select upozilla</option>
                                  </select>
                                  @error('upazilla_id')
                                  <span class="invalid-feedback" role="alert">
                                      <small>{{ $message }}</small>
                                  </span>
                                   @enderror
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <small>write your union name <span class="text-danger">*</span></small>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  placeholder="Union name" 
                                    value="{{ $union->name, old('name')}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                     @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                              <input type="submit" class="btn btn-success" value="Update">
                            </div>
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
  
  @push('script')

  <script type=text/javascript>
//    alert('ok');
      $('#Division').change(function(){
      var division_id = $(this).val();
    //   console.log(division_id)
      if(division_id){
        $.ajax({
          type:"GET",
          url:"{{url('get-district-list')}}?division_id="+division_id,
          success:function(res){
            console.log(res)
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
    </script>
  @endpush
  
