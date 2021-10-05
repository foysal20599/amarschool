@extends('frontEnd.layouts.master')

@section('content')

 @include('frontEnd.include.header')
    <!-- main-slider -->
    <div class="inner-banner">
        <section class="ssitl-breadcrumb text-left">
          <div class="container">
            <ul class="breadcrumbs-custom-path">
              <li><a href="index.html">Home</a></li>
              <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span> All Class</li>
            </ul>
          </div>
        </section>
      </div>




   <!--/courses-->
   <div class="ssitl-homeblog py-5" id="homeblog">
    <div class="container py-lg-5 py-md-4">
        <div class="header-title mb-3">
            <span class="sub-title">Top Courses</span>
            <h3 class="hny-title text-left">Browse Our Top Courses.</h3>
        </div>
        <div class="row top-pics ">
        @foreach ($all_courses as $all_course)
          
                @php
                $file = new SplFileInfo($all_course->video_path);
                    $ext  = $file->getExtension();
                    // dd($ext);
                    @endphp
                        @if ($ext == 'jpeg' || $ext == 'jpg' || $ext == 'png'  && $all_course->video_status)
                        <div class="col-lg-4 col-md-6 item">
                            <div class="card">
                                <div class="card-header p-0 position-relative">
                                    <a href="blog-single.html">
                                        <img class="card-img-bottom d-block radius-image-full" src="{{ asset('storage/app') }}/{{ $all_course->video_path }}" alt="amaronlineschool">
                                    </a>
                                </div>
                                <div class="card-body blog-details">
                                    <a href="blog-single.html" class="blog-desc">Learning to Write as a Professional Author
                                    </a>
                                    <div class="author align-items-center">
                                        <img src="assets/images/admin.jpg" alt="" class="img-fluid rounded-circle">
                                        <ul class="blog-meta">
                                            <li>
                                                <a href="#">Isabella ava</a> 
                                            </li>
                                            <li class="meta-item blog-lesson">
                                                <span class="meta-value"> Sep 13, 2020 </span>. <span class="meta-value ml-2"><span class="fa fa-clock-o"></span> 1 min</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @else

                        <div class="col-lg-4 col-md-4 col-sm-6 item">            
                            <!-- home page video popup section -->
                            <div class="ssitl-videohny" id="video">
                                <div class="new-block py-5">
                                    <div class="container py-lg-5">
                                            <div class="history-info position-relative">
                                                    <!--//video-->
                                                    <a href="#small-dialog" class="popup-with-zoom-anim play-view text-center pl-3">
                                                        <span class="video-play-icon">
                                                            <span class="fa fa-play"></span>
                                                        </span>
                                                    </a>

                                                    <!-- dialog itself, mfp-hide class is required to make dialog hidden -->
                                                    <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                                                        <iframe src="{{ asset('storage/app') }}/{{ $all_course->video_path }}" frameborder="0"
                                                            allow=" fullscreen" allowfullscreen autoplay="false"></iframe>
                                                    </div>
                                                    <!--//video-->
                                                </div>

                                            <!-- dialog itself, mfp-hide class is required to make dialog hidden -->
                                            <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                                                <iframe src="{{ asset('storage/app') }}/{{ $all_course->video_path }}" frameborder="0"
                                                            allow="autoplay; fullscreen" allowfullscreen autoplay="false"> </iframe>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            
                      </div>
                        @endif
                                 
           
            @endforeach
           
        </div>
        <div class="readhny-btm text-center mx-auto mt-md-4">
            <a class="btn btn-primary btn-style mt-md-5 mt-4" href="about.html">Read More <span
                    class="fa fa-chevron-right ml-2" aria-hidden="true"></span></a>
        </div>
    </div>
</div>
<!--//courses-->




    <!-- testimonials -->
    <section class="ssitl-clients-1" id="testimonials">
        <!-- /grids -->
        <div class="cusrtomer-layout py-5">
            <div class="container py-lg-5 py-md-4">
                <div class="header-title mb-md-5 mb-4">
                    <span class="sub-title">Testimonials</span>
                    <h3 class="hny-title text-left">What People Say</h3>
                </div>
                <!-- /grids -->
                <div class="testimonial-row">
                    <div id="owl-demo1" class="owl-two owl-carousel owl-theme mb-md-3 mb-sm-5 mb-4">
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <q>Lorem ipsum dolor sit amet int consectetur adipisicing elit. Velita beatae
                                            laudantium Quas minima sunt natus tempore, maiores aliquid modi felis vitae
                                            facere aperiam sequi optio lacinia id ipsum non velit, culpa.
                                            voluptate rem ullam dolore nisi est quasi, doloribus tempora.</q>
                                    </blockquote>
                                </div>
                                <div class="testi-des">
                                    <div class="test-img">
                                        <img src="{{ asset('public/frontEnd') }}/assets/images/team1.jpg" class="img-fluid" alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h4>Gloria Parker</h4>
                                        <p class="indentity">Student </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <q>Lorem ipsum dolor sit amet int consectetur adipisicing elit. Velita beatae
                                            laudantium Quas minima sunt natus tempore, maiores aliquid modi felis vitae
                                            facere aperiam sequi optio lacinia id ipsum non velit, culpa.
                                            voluptate rem ullam dolore nisi est quasi, doloribus tempora.</q>
                                    </blockquote>
                                </div>
                                <div class="testi-des">
                                    <div class="test-img"><img src="{{ asset('public/frontEnd') }}/assets/images/team2.jpg" class="img-fluid"
                                        alt="client-img">
                                </div>
                                    <div class="peopl align-self">
                                        <h4>Tommy sakura</h4>
                                        <p class="indentity">Student </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                   
                                    <blockquote>
                                        <q>Lorem ipsum dolor sit amet int consectetur adipisicing elit. Velita beatae
                                            laudantium Quas minima sunt natus tempore, maiores aliquid modi felis vitae
                                            facere aperiam sequi optio lacinia id ipsum non velit, culpa.
                                            voluptate rem ullam dolore nisi est quasi, doloribus tempora.</q>
                                    </blockquote>
                                   
                                </div>
                                <div class="testi-des">
                                    <div class="test-img"><img src="{{ asset('public/frontEnd') }}/assets/images/team3.jpg" class="img-fluid"
                                        alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h4>Bruce Bailey </h4>
                                        <p class="indentity">Student </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <q>Lorem ipsum dolor sit amet int consectetur adipisicing elit. Velita beatae
                                            laudantium Quas minima sunt natus tempore, maiores aliquid modi felis vitae
                                            facere aperiam sequi optio lacinia id ipsum non velit, culpa.
                                            voluptate rem ullam dolore nisi est quasi, doloribus tempora.</q>
                                    </blockquote>
                                  
                                </div>
                                <div class="testi-des">
                                    <div class="test-img"><img src="{{ asset('public/frontEnd') }}/assets/images/team3.jpg" class="img-fluid"
                                        alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h4>Ruth Edwards</h4>
                                        <p class="indentity">Student </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <q>Lorem ipsum dolor sit amet int consectetur adipisicing elit. Velita beatae
                                            laudantium Quas minima sunt natus tempore, maiores aliquid modi felis vitae
                                            facere aperiam sequi optio lacinia id ipsum non velit, culpa.
                                            voluptate rem ullam dolore nisi est quasi, doloribus tempora.</q>
                                    </blockquote>
                                </div>
                                <div class="testi-des">
                                    <div class="test-img">
                                        <img src="{{ asset('public/frontEnd') }}/assets/images/team1.jpg" class="img-fluid" alt="client-img">
                                    </div>
                                    <div class="peopl align-self">
                                        <h4>Gloria Parker</h4>
                                        <p class="indentity">Student </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-content">
                                <div class="testimonial">
                                    <blockquote>
                                        <q>Lorem ipsum dolor sit amet int consectetur adipisicing elit. Velita beatae
                                            laudantium Quas minima sunt natus tempore, maiores aliquid modi felis vitae
                                            facere aperiam sequi optio lacinia id ipsum non velit, culpa.
                                            voluptate rem ullam dolore nisi est quasi, doloribus tempora.</q>
                                    </blockquote>
                                </div>
                                <div class="testi-des">
                                    <div class="test-img"><img src="{{ asset('public/frontEnd') }}/assets/images/team2.jpg" class="img-fluid"
                                        alt="client-img">
                                </div>
                                    <div class="peopl align-self">
                                        <h4>Tommy sakura</h4>
                                        <p class="indentity">Student </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /grids -->
        </div>
        <!-- //grids -->
    </section>
    <!-- //testimonials -->


   @include('frontEnd.include.footer')
   @endsection