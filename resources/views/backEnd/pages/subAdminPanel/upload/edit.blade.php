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
              <li class="breadcrumb-item active">Update</li>
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
                <h3 class="card-title" style="text-transform: uppercase;">Update </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
                <div class="card-body">
                    <form  action="{{url('video/update/' .$video->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <small> Select class name <span class="text-danger">*</span> </small>
                                    <select class="form-control @error('class_id') is-invalid @enderror" name="class_id">
                                        <option value="" selected>Select</option>
                                        @foreach ($class_item as $item)
                                          <option value="{{$item->id}}" {{$item->id == $video->id? 'selected' : null }}>{{$item->class_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('class_id')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <div class="card-body pad">
                                        <h6><b>Write your status</b></h6>
                                        <div class="mb-3">
                                          <textarea name="video_status" class="textarea" placeholder="Place some text here"> 
                                              {{ $video->video_status}}
                                          </textarea>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <small> Upload video/photo <span class="text-danger">*</span> </small>
                                   <input type="file" class="form-control @error('video_path') is-invalid @enderror" name="video_path">
                                    @error('video_path')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <small> Old File</small>
                                <div class="form-group">
                                    
                                    @php
                                    $file = new SplFileInfo($video->video_path);
                                        $ext  = $file->getExtension();
                                        // dd($ext);
                                    @endphp
                                       @if ($ext !== 'jpeg' && $ext !== 'jpg' && $ext !== 'png')
                                       <iframe  style="width: 250px;" src="{{ asset('storage/app') }}/{{ $video->video_path }}"> </iframe>
                                      @endif

                                      @if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png')
                                          <img class="img-fluid img-rounded" src="{{ asset('storage/app') }}/{{ $video->video_path }}" class="elevation-2" alt="" style="width: 150px;">
                                     @endif
                                      
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
 @endsection
 

