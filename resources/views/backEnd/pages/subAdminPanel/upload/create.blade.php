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
 

form{
    background: #fff;
    padding: 20px;
}

.progress { 
    position:relative;
    width:100%;
    background-color: #979ca0;
    margin: 10px 0;
}
.bar { 
    background-color: #082708;
    width:0%;
    height:20px;
}
.percent {
    position:absolute;
    display:inline-block; 
    left:50%;
    color: #fff;
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
              <li class="breadcrumb-item active">Upload Video</li>
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
                <h3 class="card-title" style="text-transform: uppercase;">Upload Video </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
                <div class="card-body">
                    <form  action="{{route('upload.video')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <small> Select class name <span class="text-danger">*</span> </small>
                                    <select class="form-control @error('class_id') is-invalid @enderror" name="class_id">
                                        <option value="" selected>Select</option>
                                        @foreach ($class_item as $item)
                                          <option value="{{$item->id}}">{{$item->class_name}}</option>
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
                                        <h6><b>Write your post title</b> <small>max:150 <span class="text-danger">*</span></small></h6>
                                        <div class="mb-3">
                                          <input name="video_status" class="form-control @error('video_status') is-invalid @enderror"> 
                                          @error('video_status')
                                          <span class="invalid-feedback" role="alert">
                                              <small>{{ $message }}</small>
                                          </span>
                                          @enderror
                                    </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <small> Upload video/photo <span class="text-danger">*</span> </small>
                                   <input type="file" class="form-control @error('video_path') is-invalid @enderror" name="video_path">
                                    <div class="progress">
                                      <div class="bar"></div >
                                      <div class="percent">0%</div >
                                    </div>
                                    @error('video_path')
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

 @push('script')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
 <script type="text/javascript">
  var SITEURL = "{{URL('/')}}";
  $(function () {
      $(document).ready(function () {
          var bar = $('.bar');
          var percent = $('.percent');
          $('form').ajaxForm({
              beforeSend: function () {
                  var percentVal = '0%';
                  bar.width(percentVal)
                  percent.html(percentVal);
              },
              uploadProgress: function (event, position, total, percentComplete) {
                  var percentVal = percentComplete + '%';
                  bar.width(percentVal)
                  percent.html(percentVal);
              },
              complete: function (xhr) {
                  alert('Video Uploaded Successfully');
                  window.location.href = SITEURL + "/video/manage";
              }
          });
      });
  });
</script>
 @endpush
 

