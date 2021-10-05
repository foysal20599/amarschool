@extends('backEnd.layouts.master')
@push('style')
<style>
    .box__dragndrop,
    .box__uploading,
    .box__success,
    .box__error {
    display: none;
    }
    .box.is-dragover {
  background-color: grey;
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
              <li class="breadcrumb-item active">YouTube Video Upload</li>
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
                <h3 class="card-title" style="text-transform: uppercase;">YouTube Video Upload</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
                <div class="card-body">
                    <form  action="{{url('youtube/video/update/'.$video->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <small> Select class name <span class="text-danger">*</span> </small>
                                    <select class="form-control @error('class_id') is-invalid @enderror" name="class_id">
                                        <option value="" selected>Select</option>
                                        @foreach ($class_item as $item)
                                          <option value="{{ $item->id }}"  {{ $item->id == $video->class_id? 'selected': '', old('class_id') == $item->id ? 'selected' : ''}}>{{$item->class_name}}</option>
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
                                        <h6><b>Write video title</b> <small>max:150 <span class="text-danger">*</span></small></h6>
                                        <div class="mb-3">
                                          <input name="video_title" class="form-control @error('video_title') is-invalid @enderror" value="{{$video->video_title, old('video_title')}}"> 
                                          @error('video_title')
                                          <span class="invalid-feedback" role="alert">
                                              <small>{{ $message }}</small>
                                          </span>
                                          @enderror
                                    </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <small> Upload youtube embed code <span class="text-danger">*</span> </small>
                                   <input type="text" class="form-control @error('video_link') is-invalid @enderror" name="video_link" row="3" value="{{$video->video_link, old('video_link')}}">
                                    @error('video_link')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                       </div>
                        <div class="footer">
                          <input type="submit" class="btn btn-success" value="Upload">
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

 

