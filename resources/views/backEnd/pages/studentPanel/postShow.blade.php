@extends('backEnd.layouts.master')
@push('style')
<style>
      #blah{ width: 200px !important; height: auto !important; }
      input[type=file]{
      padding:10px;}
      .card-img-bottom {  height: 200px;  object-fit: scale-down;}
      .blog-details p{
        font-family: 'Mukti', sans-serif;
      }
    .header-title.mb-3 {
      background: rgb(93 27 134);
      padding: 10px 0;
      border-radius: 10px;
    }
    .header-title span, h3{
      color: white;
      margin: 0 20px;
    }
    .img_margin{
      margin: 10px;
      border-radius: 10px;
    }
    .card_item{
      background-color: #3e3c3f;
      padding: 15px 15px;
      border-radius: 10px;
      color: white;
      font-size: 20px;
      font-weight: bold;
      max-width: 60%;
      text-align: center;
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
              <li class="breadcrumb-item active">All Class</li>
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
          <!--/courses-->
          <div class="ssitl-homeblog py-5" id="homeblog">
            <div class="container py-lg-5 py-md-4">
                <div class="header-title mb-3">
                  <span class="sub-title" style="text-transform:uppercase;">Student Dashboard</span>
                  <h3 class="hny-title text-left">Student Profile</h3>
                </div>
                <div class="col-lg-12 col-md-12 mb-5 mt-5">
                  <div class="card mb-3" >
                    <div class="row no-gutters">
                      <div class="col-md-4 img_margin" style="border: 1px solid;">
                        <img class="img-fluid" src="{{ asset('public/backEnd') }}/assets/avatar/avatar.png" alt="...">
                      </div>
                      <div class="col-md-7">
                        <div class="card-body">
                          <p class="card_name card_item">{{auth()->user()->name}}</p>
                          <p class="card-class-name card_item">Class Name</p>
                          <p class=" card-video-list card_item">Total Video: 20</p> 
                        </div>
                      </div>
                    </div>
                </div>
                </div>
                <div class="header-title mb-3">
                    <span class="sub-title">Top Courses</span>
                    <h3 class="hny-title text-left">Browse Our Top Courses.</h3>
                </div>
                <div class="row top-pics ">
                @forelse ($all_courses as $all_course)
                        @php
                        $file = new SplFileInfo($all_course->video_path);
                            $ext  = $file->getExtension();
                            // dd($ext);
                            @endphp
                                @if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png')
                                <div class="col-lg-4 col-md-6 item">
                                    <div class="card">
                                        <div class="card-header p-0 position-relative">
                                                <img class="card-img-bottom d-block img-fluid rounded radius-image-full" src="{{ asset('storage/app') }}/{{ $all_course->video_path }}" alt="amaronlineschool">
                                            
                                        </div>
                                        <div class="card-body blog-details">
                                          <p >{{ ($all_course->video_status) }} </p>
                                        </div>
                                    </div>
                                </div>
                                @else
                              <div class="col-lg-4 col-md-6 item">
                                <div class="card">
                                    <div class="card-header p-0 position-relative">
                                      <video class="card-img-bottom col-lg-12 col-md-12 col-sm-12" controls> 
                                        <source src="{{ asset('storage/app') }}/{{ $all_course->video_path }}">
                                      </video>
                                    </div>
                                    <div class="card-body blog-details">
                                      <p>{{ ($all_course->video_status) }} </p>
                                        
                                    </div>
                                
                                </div>
                              
                            </div>
                            @endif
                            @empty
                            <h1> No result Found! </h1>
                    @endforelse
                </div>
            </div>
        </div>
        <!--//courses-->

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


      
  
  