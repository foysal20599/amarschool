@extends('backEnd.layouts.master')

@push('style')
<style>
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @auth
            @if(auth()->user()->type == 1)
             <h1 class="m-0 text-info" style="text-transform:uppercase; ">Admin Dashboard</h1>
             @elseif(auth()->user()->type == 2)
             <h1 class="m-0 text-info" style="text-transform:uppercase; ">Agent Dashboard</h1>
             @elseif (auth()->user()->type == 3)
             <h1 class="m-0 text-info" style="text-transform:uppercase; ">Sub-admin Dashboard</h1>
             @else
             <h1 class="m-0 text-info" style="text-transform:uppercase; ">Student Dashboard</h1>
            @endif
            @endauth
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            @auth
            @if(auth()->user()->type == 1)
                <li class="breadcrumb-item active">Admin</li>
              @elseif(auth()->user()->type == 2)
                <li class="breadcrumb-item active">Agent</li>
              @elseif(auth()->user()->type == 3)
                <li class="breadcrumb-item active">Sub-admin</li>
                @else
                <li class="breadcrumb-item active">Class Video</li>
            @endif
            @endauth
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @auth
    @if(auth()->user()->type == 1)
    @php
      $agent = App\Models\User::where('type', 2)->count();
      $sub_admin = App\Models\User::where('type', 3)->count();
      $student = App\Models\User::where('type', 4)->count();
      $video  = App\Models\Upload::all()->count();
      $youtube_video  = App\Models\YoutubeVideo::all()->count();
      $class  = App\Models\ClassModel::all()->count();
    @endphp
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner text-center">
                <h3>{{ $agent  }}</h3>
                <p style="text-transform: uppercase;">Total Agent</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner text-center">
                <h3>{{$sub_admin}}</h3>
                <p style="text-transform: uppercase;">Total Sub-Admin</p>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner text-center">
                <h3>{{$student}}</h3>
                <p style="text-transform: uppercase;">Totan Student</p>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner text-center">
                <h3>{{$video}}</h3>
                <p style="text-transform: uppercase;">Total Video</p>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner text-center">
                <h3>{{ $youtube_video }}</h3>
                <p style="text-transform: uppercase;">Total youtube Video</p>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner text-center">
                <h3>{{$class}}</h3>
                <p style="text-transform: uppercase;">Total Class</p>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>


    @elseif(auth()->user()->type == 2)
    @php
      $id = Auth::user()->id;
      $student_count = App\Models\Student::where('agent_id', $id)->count();
      $student_active = App\Models\Student::where(['agent_id' => $id, 'is_active' => 1])->count();
      $student_inactive = App\Models\Student::where(['agent_id' => $id, 'is_active' => 0])->count();
      $class  = App\Models\ClassModel::all()->count();
    @endphp

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner text-center">
                <h3>{{$student_count}}</h3>
                <p style="text-transform: uppercase;">Total Student</p>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner text-center">
                <h3>{{$student_active}}</h3>
                <p style="text-transform: uppercase;">Total Active Student</p>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner text-center">
                <h3>{{$student_inactive}}</h3>
                <p style="text-transform: uppercase;">Total Inactive Student</p>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner text-center">
                <h3>{{$class}}</h3>
                <p style="text-transform: uppercase;">Total Class</p>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>



    {{--  sub-admin--}}
    @elseif (auth()->user()->type == 3)
    @php
      $id = Auth::user()->id;
      $video = App\Models\Upload::where('user_id', $id)->count();
      $student_count = App\Models\User::where('type', 4)->count();
      $class = App\Models\ClassModel::count();
      $agent = App\Models\User::where('type', 2)->count();
      $youtube_video  = App\Models\YoutubeVideo::where('user_id', $id)->count();
    @endphp
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner text-center">
                <h3>{{$agent}}</h3>
                <p style="text-transform: uppercase;">Total Agent</p>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner text-center">
                <h3>{{$student_count}}</h3>
                <p style="text-transform: uppercase;">Total Student</p>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner text-center">
                <h3>{{$video}}</h3>
                <p style="text-transform: uppercase;">Total Video</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner text-center">
                <h3>{{ $youtube_video }}</h3>
                <p style="text-transform: uppercase;">Total Youtube Video</p>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner text-center">
                <h3>{{ $class }}</h3>
                <p style="text-transform: uppercase;">Total Class</p>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    @else
    @php
        $user = App\Models\User::where('id', Auth::user()->id)->first()->id;
        $class_id = App\Models\Student::where('user_id', $user)->first()->class_id;
        $all_courses = App\Models\Upload::with('student')->where(['class_id' => $class_id, 'status' => 1])->get();
        $video_count = App\Models\Upload::with('student')->where('class_id', $class_id)->count();
        $all_youtube_video = App\Models\YoutubeVideo::with('student')->where('class_id', $class_id)->get();
        $youtube_video_count = App\Models\YoutubeVideo::with('student')->where('class_id', $class_id)->count();
        $class_name = App\Models\ClassModel::where('id', $class_id)->first()->class_name;
        $student_img = App\Models\Student::where('user_id', $user)->first()->image;
    @endphp
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
                  <h3 class="hny-title text-left" style="text-transform:uppercase;">Student Profile</h3>
                  <span class="sub-title">Best of luck</span>
                </div>
                <div class="col-lg-12 col-md-12 mb-5 mt-5">
                  <div class="card mb-3" >
                    <div class="row no-gutters">
                      @if ($student_img)
                      <div class="col-md-4 img_margin">
                        <img class="img-fluid rounded" src="{{ asset('storage/app') }}/{{$student_img}}" alt="amar online school">
                      </div>
                      @else
                      <div class="col-md-4 img_margin" style="border: 1px solid;">
                        <img class="img-fluid" src="{{ asset('public/backEnd') }}/assets/avatar/avatar.png" alt="amar online school">
                      </div>
                      @endif
                     
                      <div class="col-md-7">
                        <div class="card-body">
                          <p class="card_name card_item">{{auth()->user()->name}}</p>
                          <p class="card-class-name card_item">{{$class_name}}</p>
                          <p class=" card-video-list card_item">Total Course Video: {{$youtube_video_count}}</p> 
                          <p class=" card-video-list card_item">Total browser Video: {{$video_count}}</p> 
                        </div>
                      </div>
                    </div>
                </div>
                </div>
                <div class="header-title mb-3">
                    <span class="sub-title">Recent Upload video<i class="ri-video-add-fill"></i></span>
                    <h3 class="hny-title text-left">Browse Our Top Courses.</h3>
                </div>
                <div class="row top-pics mb-5 mt-5">
                  @forelse ($all_youtube_video as $all_youtube)
                              @php
                              $value = $all_youtube->video_link;
                              $list = str_split($value);
                              $arr = array_search("=",$list);
                              $data = array_slice($list,$arr+1);
                              $string_array = implode($data); 
                              @endphp
                                <div class="col-lg-4 col-md-6 item">
                                  <div class="card">
                                      <div class="card-header p-0 position-relative text-center">
                                        <iframe  src="https://www.youtube.com/embed/{{ $string_array }}" title="{{$all_youtube->video_title}}" frameborder="0" 
                                          allow=" autoplay;" allowfullscreen></iframe>
                                      </div>
                                      <div class="card-body blog-details">
                                        <p>{{ $all_youtube->video_title }} </p>
                                      </div>
                                  
                                  </div>
                                
                              </div>
                              @empty
                              <h3 class="text-danger"> No Video Found! </h3>
                      @endforelse
                  </div>

                @if ($all_courses)
                <div class="header-title mb-3">
                    <h3 class="hny-title text-left">News </h3>
                </div>
                <div class="row top-pics mb-5 mt-5">
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
                                        <video class="embed-responsive embed-responsive-4by3" controls> 
                                          <source  allow="fullscreen" allowfullscreen src="{{ asset('storage/app') }}/{{ $all_course->video_path }}">
                                        </video>
                                      </div>
                                      <div class="card-body blog-details">
                                        <p>{{ ($all_course->video_status) }} </p>
                                          
                                      </div>
                                  </div>
                                
                              </div>
                              @endif
                              @empty
                              <h3 class="text-danger"> No Video Found! </h3>
                      @endforelse
                  </div>
                  @endif
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
  </div>
    @endif
    @endauth
  </div>


  
@endsection


