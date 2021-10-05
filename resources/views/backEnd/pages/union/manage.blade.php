@extends('backEnd.layouts.master')

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
              <li class="breadcrumb-item active">Upozilla Name</li>
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
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th style="width: 5%;">#</th>
                    <th>Division</th>
                    <th>District</th>
                    <th>Upozilla</th>
                    <th>Union</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($unions as $union)
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td> {{$union->upozilla->district->division['name']}}</td>
                            <td>{{$union->upozilla->district['name']}}</td>
                            <td> {{$union->upozilla['name']}} </td>
                            <td>{{$union->name}}</td>
                            <td class="text-center">
                                <a href="{{ URL::to('edit/union/' .$union->id)}}" class="text-success btn-sm"><i class="flaticon-edit"></i></a>
                                <a href="{{ URL::to('delete/union/' .$union->id)}}" class="text-danger btn-sm"><i class="flaticon-delete"></i></a>
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

    // var getValue = fetch('/get-all-data');
    //                .than(res => res.json())
    //                .then(data => console.log(data))
      // console.log(promise);

          
          // function fatchdataall(){
          //   $.ajax({
          //     type:"GET",
          //     url:"/get-all-data",
          //     dataType: 'json',
          //     success: function (response){
          //       console.log(response);
                
          //     }
          //   });
          // }
          // fatchdataall();
  


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
  



