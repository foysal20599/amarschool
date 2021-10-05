@extends('backEnd.layouts.master')
@push('style')
<style>
  table.table-bordered tr {
    vertical-align: middle !important;
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
              <li class="breadcrumb-item active">Agent manage</li>
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
              <div class="card-header">
                  <h6>Search result</h6>
                <form action="{{ route('agent.agentsearch')}}" method="POST"> 
                  @csrf
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
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
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
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
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
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
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                          <select class="form-control @error('union_id') is-invalid @enderror" id="union" name="union_id">
                            <option selected disabled>Select union</option>
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
                  <input type="submit" value="Search" class="btn btn-success">
                </div>
              </div>
              </form>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th style="width: 5%;">#</th>
                    <th>Agent Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($agents as $agent)
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td> {{$agent->name}}</td>
                            <td>{{$agent->phone_no}}</td>
                            <td> {{$agent->email}}</td>
                            <td>{{$agent->address}}</td>
                            <td><img class="img-fluid img-rounded" src="{{ asset('storage/app') }}/{{ $agent->profile_photo_path }}" class="elevation-2" alt="" style="width: 150px;"></td>
                            <td class="text-center">
                                <a href="{{ URL::to('agent/edit/' .$agent->id)}}" class="text-dark btn-sm"><i class="flaticon-edit"></i></a>
                                <a href="{{ URL::to('agent/view/' .$agent->id)}}" class="text-info btn-sm"><i class="fas fa-eye"></i></a>
                                 @if ($agent->status == 1)
                                <a href="{{ URL::to('agent/active/' .$agent->id)}}" class="text-success btn-sm"><i class="fas fa-user-check"></i></a>
                                 @else
                                <a href="{{ URL::to('agent/inactive/' .$agent->id)}}" class="text-danger btn-sm"><i class="fas fa-user-slash"></i></a>
                                @endif
                                <a href="{{ URL::to('agent/delete/' .$agent->id)}}" class="text-danger btn-sm"><i class="flaticon-delete"></i></a>
                                <a href="{{ URL::to('agent/student/list/' .$agent->id)}}" class="text-secandary btn-sm"><i class="fas fa-users"></i></a>
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
//    $(document).ready(function(){
//     $("#Division").on('change', function(){
//       var value = $(this).val();
//       alert(value);
//       // $.ajax({
//       //   url:"manage/union",
//       //   type:"POST",
//       //   data:'request=' + value;
//       //   beforeSend:function(data){
//       //     // console.log(data);
//       //     $("container").html("<span> working...</span>");
//       //   },
//       //   success:function(){
//       //     $(".container").html(data);
//       //   }
//       // });
//     });
//    });
</script>


@endpush
  



