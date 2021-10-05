@extends('backEnd.layouts.master')
@push('style')
<style>
  table.table-bordered tr {
    vertical-align: middle !important;
}
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
  
  <!-- Content Wrapper. Contains page content -->
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
              <li class="breadcrumb-item active">Student list</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title ">Manage</h3>
                   
                  </div>
                    
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('search.studentsearch')}}" method="POST">
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
  
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <div class="form-group">
                        <input type="submit" value="Search" class="btn btn-success">
                    </div>
                  </div>
                </form>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th style="width: 5%;">#</th>
                    <th>Agent Name</th>
                    <th>Student Name</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <th>Class</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td> {{$user->agent->name}}</td>
                            <td> {{$user->student_name}}</td>
                            <td>{{$user->phone_no}}</td>
                            <td> {{$user->date_of_birth}}</td>
                            <td>{{$user->classname['class_name']}}</td>
                            <td><img class="img-fluid img-rounded" src="{{ asset('storage/app') }}/{{ $user->image}}" class="elevation-2" alt="" style="width: 150px;"></td>
                            <td class="text-center">
                                <a href="{{ URL::to('student/edit/foradmin/' .$user->id)}}" class="text-dark btn-sm"><i class="flaticon-edit"></i></a>
                                <a href="{{ URL::to('student/view/foradmin/' .$user->id)}}" class="text-info btn-sm"><i class="fas fa-eye"></i></a>
                                 @if ($user->is_active == 1)
                                <a href="{{ URL::to('student/active/foradmin/' .$user->id)}}" class="text-success btn-sm"><i class="fas fa-user-check"></i></a>
                                 @else
                                <a href="{{ URL::to('student/inactive/foradmin/' .$user->id)}}" class="text-danger btn-sm"><i class="fas fa-user-slash"></i></a>
                                @endif
                                <a href="{{ URL::to('student/delete/foradmin/' .$user->id)}}" class="text-danger btn-sm"><i class="flaticon-delete"></i></a>
                            </td>
                        </tr>       
                      @endforeach
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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

<script>

 </script>

      
  @endpush
  


