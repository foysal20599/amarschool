@extends('backEnd.layouts.master')
@push('style')
<style>
  table.table-bordered tr {
    vertical-align: middle !important;
    
}
iframe {
    height: auto !important;
    width: auto !important;
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
              <li class="breadcrumb-item active">Manage Youtube Video</li>
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
                    <h3 class="card-title">Manage Youtube Video</h3>
                </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th style="width: 5%;">#</th>
                    <th style="width: 20%;">Video</th>
                    <th style="width: 15%;">Class Name</th>
                    <th style="width: 30%;">Video Title</th>
                    <th style="width: 15%;">Action</th>
                  </tr>
                  </thead>
                    <tbody>
                        @foreach($uploads as $upload)
                        @php
                         $value = $upload->video_link;
                        $list = str_split($value);
                        $arr = array_search("=",$list);
                        $data = array_slice($list,$arr+1);
                        $string_array = implode($data); 
                        @endphp
                       
                    <tr>
                        <td>{{ $loop->index + 1}}</td>
                       
                        <td >
                          <iframe  src="https://www.youtube.com/embed/{{ $string_array }}" title="{{$upload->video_title}}" frameborder="0" 
                            allow=" autoplay;" allowfullscreen></iframe>
                           
                        </td>
                        <td>{{$upload->class_name}}</td>
                        <td> {{ Str::words($upload->video_title, '50', '...') }}</td>
                        <td class="text-center">
                            <a href="{{ URL::to('youtube/video/edit/' .$upload->id)}}" class="text-dark btn-sm"><i class="flaticon-edit"></i></a>
                            @if ($upload->status == 1)
                            <a href="{{ URL::to('youtube/video/active/' .$upload->id)}}" class="text-success btn-sm"><i class="fas fa-user-check"></i></a>
                            @else
                            <a href="{{ URL::to('youtube/video/inactive/' .$upload->id)}}" class="text-danger btn-sm"><i class="fas fa-user-slash"></i></a>
                            @endif
                            <a href="{{ URL::to('youtube/video/delete/' .$upload->id)}}" class="text-danger btn-sm"><i class="flaticon-delete"></i></a>
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

  



