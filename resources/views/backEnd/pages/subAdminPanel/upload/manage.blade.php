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
              <li class="breadcrumb-item active">Video manage</li>
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
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Video Manage</h3>
                </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th style="width: 5%;">#</th>
                    <th style="width: 20%;">Video</th>
                    <th style="width: 15%;">Class Name</th>
                    <th style="width: 30%;">Video Status</th>
                    <th style="width: 15%;"> Image</th>
                    <th style="width: 15%;">Action</th>
                  </tr>
                  </thead>
                    <tbody>
                        @foreach($uploads as $upload)
                        @php
                            $file = new SplFileInfo($upload->video_path);
                                $ext  = $file->getExtension();
                                // dd($ext);
                        @endphp
                    <tr>
                        <td>{{ $loop->index + 1}}</td>
                        <td>
                        

                            @if ($ext !== 'jpeg' && $ext !== 'jpg' && $ext !== 'png')
                            <video width="320" height="240" controls>
                              <source src="{{ asset('storage/app') }}/{{ $upload->video_path }}" type="video/mp4">
                              Your browser does not support the video tag.
                            </video>
                            @endif
                        </td>
                        <td>{{$upload->class_name}}</td>
                        <td> {!! Str::words($upload->video_status, '50', '...') !!}</td>
                        <td>
                          @if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png')
                            <img class="img-fluid img-rounded" src="{{ asset('storage/app') }}/{{ $upload->video_path }}" class="elevation-2" alt="" style="width: 150px;">
                          @endif
                          
                        </td>
                        <td class="text-center">
                            <a href="{{ URL::to('video/edit/' .$upload->id)}}" class="text-dark btn-sm"><i class="flaticon-edit"></i></a>
                            @if ($upload->status == 1)
                            <a href="{{ URL::to('video/active/' .$upload->id)}}" class="text-success btn-sm"><i class="fas fa-user-check"></i></a>
                            @else
                            <a href="{{ URL::to('video/inactive/' .$upload->id)}}" class="text-danger btn-sm"><i class="fas fa-user-slash"></i></a>
                            @endif
                            <a href="{{ URL::to('video/delete/' .$upload->id)}}" class="text-danger btn-sm"><i class="flaticon-delete"></i></a>
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

  



