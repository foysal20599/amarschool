@extends('frontEnd.layouts.master')
@push('style')
<style>
    .hytPlayerWrap {
        display: inline-block;
        position: relative;
    }
    .hytPlayerWrap.ended::after {
        content:"";
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        cursor: pointer;
        background-color: black;
        background-repeat: no-repeat;
        background-position: center;
        background-size: 64px 64px;
        background-image: url(data:image/svg+xml;utf8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMjgiIGhlaWdodD0iMTI4IiB2aWV3Qm94PSIwIDAgNTEwIDUxMCI+PHBhdGggZD0iTTI1NSAxMDJWMEwxMjcuNSAxMjcuNSAyNTUgMjU1VjE1M2M4NC4xNSAwIDE1MyA2OC44NSAxNTMgMTUzcy02OC44NSAxNTMtMTUzIDE1My0xNTMtNjguODUtMTUzLTE1M0g1MWMwIDExMi4yIDkxLjggMjA0IDIwNCAyMDRzMjA0LTkxLjggMjA0LTIwNC05MS44LTIwNC0yMDQtMjA0eiIgZmlsbD0iI0ZGRiIvPjwvc3ZnPg==);
    }
    .hytPlayerWrap.paused::after {
        content:"";
        position: absolute;
        top: 70px;
        left: 0;
        bottom: 50px;
        right: 0;
        cursor: pointer;
        background-color: black;
        background-repeat: no-repeat;
        background-position: center;
        background-size: 40px 40px;
        background-image: url(data:image/svg+xml;utf8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEiIHdpZHRoPSIxNzA2LjY2NyIgaGVpZ2h0PSIxNzA2LjY2NyIgdmlld0JveD0iMCAwIDEyODAgMTI4MCI+PHBhdGggZD0iTTE1Ny42MzUgMi45ODRMMTI2MC45NzkgNjQwIDE1Ny42MzUgMTI3Ny4wMTZ6IiBmaWxsPSIjZmZmIi8+PC9zdmc+);
    }

</style>
@endpush

@section('content')
@include('frontEnd.include.header')
 
    <!-- main-slider -->
    <section class="ssit-main-slider" id="home">
        <div class="companies20-content">
            <div class="owl-one owl-carousel owl-theme">
                <div class="item slider-item">
                    <li>
                        <div class="slider-info banner-view bg bg2">
                            <div class="banner-info">
                                <div class="container">
                                    <div class="banner-info-bg">
                                        <h5>????????????????????? ??????????????? ???????????????????????????</h5>
                                        <p class="mt-4 pr-lg-4">???????????????  ???????????????????????????????????????  ???????????????  ???????????????  ????????????????????? ???</p>
                                       
                                        <a class="btn btn-style btn-white mt-xl-5 mt-4" href="#stats"> View
                                            Courses <span class="fa fa-chevron-right ml-2"
                                                aria-hidden="true"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
                <div class="item slider-item">
                    <li>
                        <div class="slider-info  banner-view banner-top1 bg bg2">
                            <div class="banner-info">
                                <div class="container">
                                    <div class="banner-info-bg">
                                        <h5>????????????????????? ??????????????? ???????????????????????????</h5>
                                        <p class="mt-4 pr-lg-4">?????????????????? ?????????????????? ??????????????????????????? ???????????????  ???????????? ???????????? ????????????,???????????????????????? ????????????????????? ????????? ??? ???????????? ????????? ?????????????????? ???????????????????????????????????? ??????????????? ????????? ???????????????</p>
                                        <a class="btn btn-style btn-white mt-xl-5 mt-4" href="#stats"> View
                                            Courses <span class="fa fa-chevron-right ml-2"
                                                aria-hidden="true"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
                <div class="item slider-item">
                    <li>
                        <div class="slider-info banner-view banner-top2 bg bg2">
                            <div class="banner-info">
                                <div class="container">
                                    <div class="banner-info-bg">
                                        <h5>????????????????????? ??????????????? ???????????????????????????</h5>
                                        <p class="mt-4 pr-lg-4">
                                            ?????????????????? ??????????????? ???????????? ?????????????????? ??????????????? ???????????? ???????????????????????????????????? ??????????????? ??????????????????????????? ?????????????????? ????????? ???????????? ????????? ????????????????????? ???????????? ??????????????? ???????????????
                                            </p>
                                        <a class="btn btn-style btn-white mt-xl-5 mt-4" href="#stats"> View
                                            Courses <span class="fa fa-chevron-right ml-2"
                                                aria-hidden="true"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
               
            </div>
            <div class="ssit-banner-grids">
                <div class="bangrids-inn">
                    <div class="banhny-grid-1">
                        <div class="banhny-grid-icon">
                            <span class="fa fa-laptop fa-icon-mmit"></span>
                        </div>
                        <div class="banhny-grid-right-info">
                            <h6><a href="#url">100,000 online courses</a></h6>
                            <p>Focus is having the unwavering attention.</p>
                        </div>
                    </div>
                    <div class="banhny-grid-1">
                        <div class="banhny-grid-icon">

                            <span class="fa fa-users fa-icon-mmit"></span>

                        </div>
                        <div class="banhny-grid-right-info">
                            <h6><a href="#url">Lifetime entrance</a></h6>
                            <p>New skills online the best way is to develop and follow.</p>
                        </div>
                    </div>
                    <div class="banhny-grid-1">
                        <div class="banhny-grid-icon">
                            <span class="fa fa-book fa-icon-mmit"></span>
                        </div>
                        <div class="banhny-grid-right-info">
                            <h6><a href="#url">Live learning</a></h6>
                            <p>Start with your goals in mind and then work.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
   


    <!-- middle -->
    <div class="middle py-5">
        <div class="container pt-lg-2 pb-lg-4 py-4" >
            <div class="welcome-left text-center py-lg-4" >
                <h3 class="hny-title" style="color:black !important;">Amar Online School All Class List.</h3>
            </div>
        </div>
    </div>
    <!-- //middle -->
    <!-- stats -->
    <section class="ssit_stats py-lg-0 py-5" id="stats">
        <div class="container">
            <div class="ssit-stats">
                <div class="row">
                   @foreach($classes as $class)
                 
                    <div class="col-md-3 col-6 mt-md-0 mt-5 mb-2" >
                        <div class="counter" style="border: 1px solid black;">
                            {{-- @php
                                $count = 0;
                            @endphp
                            @foreach ($class->upload as  $item) 
                            @if ($item->video_path)
                               @php
                                   $count += count((array)($item->video_path));
                               @endphp
                            @endif
                         @endforeach --}}
                        
                            <span class="fa fa-video-camera"></span>
                            {{-- <div class="timer count-title count-number mt-3" data-to="{{  $count ?? 0}}" data-speed="1500"></div> --}}
                            <p class="count-text "> <a style=" font-size: 25px;" class="btn btn-success-class mt-4" href="{{URL::to('/student/login?request=student')}}">{{ $class->class_name}} </a></p>
                        
                            
                        </div>
                    </div>
                   
                  @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- //stats -->

 

    <!-- home page video popup section -->
<section class="ssitl-videohny" id="video">
    <div class="new-block py-5">
        <div class="container py-lg-5 hytPlayerWrapOuter">
                <div class="history-info position-relative hytPlayerWrap">
                    {{-- <iframe height="100%;" width="100%;" src="https://www.youtube.com/embed/8hXOzbGS-CI?autoplay=1"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                 
                     <iframe loading="lazy" height="100%;" width="100%;" src="https://www.youtube.com/embed/8hXOzbGS-CI?rel=0&enablejsapi=1" frameborder="0"> </iframe>
            </div>
    </div>




    
<!-- //home page video popup section -->
    <!--/blog-post-->
    {{-- <section class="ssitl-blogpost-content py-5">
        <div class="container py-md-5">
            <div class="header-title mb-md-5 mt-4">
                <span class="sub-title">Latest Posts</span>
                <h3 class="hny-title text-left">Our Blog Posts</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 item ">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="blog-single.html">
                                <img class="card-img-bottom d-block radius-image-full" src="{{ asset('public/frontEnd') }}/assets/images/ab8.jpg" alt="Card image cap">
                            </a>
                        </div>
                        <div class="card-body blog-details">
                            <a href="blog-single.html" class="blog-desc">Learning to Write as a Professional Author
                            </a>
                            <div class="author align-items-center">
                                <img src="{{ asset('public/frontEnd') }}/assets/images/admin.jpg" alt="" class="img-fluid rounded-circle">
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
                <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="blog-single.html">
                                <img class="card-img-bottom d-block radius-image-full" src="{{ asset('public/frontEnd') }}/assets/images/ab2.jpg" alt="Card image cap">
                            </a>
                        </div>
                        <div class="card-body blog-details">
                            <a href="blog-single.html" class="blog-desc">Learning to Write as a Professional Author</a>
                            <div class="author align-items-center">
                                <img src="{{ asset('public/frontEnd') }}/assets/images/admin.jpg" alt="" class="img-fluid rounded-circle">
                                <ul class="blog-meta">
                                    <li>
                                        <a href="#">Charlotte mia</a> 
                                    </li>
                                    <li class="meta-item blog-lesson">
                                        <span class="meta-value"> Sep 13, 2020 </span>. <span class="meta-value ml-2"><span class="fa fa-clock-o"></span> 1 min</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                    <div class="card">
                        <div class="card-header p-0 position-relative">
                            <a href="blog-single.html">
                                <img class="card-img-bottom d-block radius-image-full" src="{{ asset('public/frontEnd') }}/assets/images/ab6.jpg" alt="Card image cap">
                            </a>
                        </div>
                        <div class="card-body blog-details">
                            <a href="blog-single.html" class="blog-desc">Learning to Write as a Professional Author
                            </a>
                            <div class="author align-items-center">
                                <img src="{{ asset('public/frontEnd') }}/assets/images/admin.jpg" alt="" class="img-fluid rounded-circle">
                                <ul class="blog-meta">
                                    <li>
                                        <a href="#">Elizabeth</a> 
                                    </li>
                                    <li class="meta-item blog-lesson">
                                        <span class="meta-value"> Sep 13, 2020 </span>. <span class="meta-value ml-2"><span class="fa fa-clock-o"></span> 1 min</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    
    {{-- <section class="ssit-bottom-grids-6 py-5" id="features">
        <div class="container py-lg-5 py-md-4">
            <div class="grids-area-hny main-cont-wthree-fea row">
                <!-- /feature-left-->
                <div class="col-md-4 grids-feature mt-4">
                    <div class="area-box">
                        <div class="row">
                            <div class="col-sm-2 icon">
                                <span class="fa fa-video-camera"></span>
                            </div>
                            <div class="col-sm-10 area-box-info">
                                <h4><a href="#feature" class="title-head">Become a instructor on DigitalEdu</a></h4>
                                <p class="mt-3">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet.</p>
                                <a class="btn btn-primary btn-style mt-4" href="about.html">Start today <span class="fa fa-chevron-right ml-2" aria-hidden="true"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grids-feature mt-4">
                    <div class="area-box">
                        <div class="row">
                            <div class="col-sm-2 icon">
                                <span class="fa fa-tasks"></span>
                            </div>
                            <div class="col-sm-10 area-box-info">
                                <h4><a href="#feature" class="title-head">DigitalEdu for business & Community</a></h4>
                                <p class="mt-3">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet..</p>
                                <a class="btn btn-primary btn-style mt-4" href="about.html">Start today <span class="fa fa-chevron-right ml-2" aria-hidden="true"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grids-feature mt-4">
                    <div class="area-box">
                        <div class="row">
                            <div class="col-sm-2 icon">
                                <span class="fa fa-tasks"></span>
                            </div>
                            <div class="col-sm-10 area-box-info">
                                <h4><a href="#feature" class="title-head">DigitalEdu for business & Community</a></h4>
                                <p class="mt-3">Lorem ipsum viverra feugiat. Pellen tesque libero ut justo, ultrices in ligula. Semper at tempufddfel. Lorem ipsum dolor sit amet..</p>
                                <a class="btn btn-primary btn-style mt-4" href="about.html">Start today <span class="fa fa-chevron-right ml-2" aria-hidden="true"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- //bottom-grids-->

    <!-- testimonials -->
    {{-- <section class="ssitl-clients-1" id="testimonials">
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
    <!-- //testimonials --> --}}
    <script>
        "use strict";
        document.addEventListener('DOMContentLoaded', function() {
            if (window.hideYTActivated) return;
            let onYouTubeIframeAPIReadyCallbacks = [];
            for (let playerWrap of document.querySelectorAll(".hytPlayerWrap")) {
                let playerFrame = playerWrap.querySelector("iframe");
    
                let tag = document.createElement('script');
                tag.src = "https://www.youtube.com/iframe_api";
                let firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    
                let onPlayerStateChange = function(event) {
                    if (event.data == YT.PlayerState.ENDED) {
                        playerWrap.classList.add("ended");
                    } else if (event.data == YT.PlayerState.PAUSED) {
                        playerWrap.classList.add("paused");
                    } else if (event.data == YT.PlayerState.PLAYING) {
                        playerWrap.classList.remove("ended");
                        playerWrap.classList.remove("paused");
                    }
                };
    
                let player;
                onYouTubeIframeAPIReadyCallbacks.push(function() {
                    player = new YT.Player(playerFrame, {
                        events: {
                            'onStateChange': onPlayerStateChange
                        }
                    });
                });
    
                playerWrap.addEventListener("click", function() {
                    let playerState = player.getPlayerState();
                    if (playerState == YT.PlayerState.ENDED) {
                        player.seekTo(0);
                    } else if (playerState == YT.PlayerState.PAUSED) {
                        player.playVideo();
                    }
                });
            }
    
            window.onYouTubeIframeAPIReady = function() {
                for (let callback of onYouTubeIframeAPIReadyCallbacks) {
                    callback();
                }
            };
    
            window.hideYTActivated = true;
        });
    </script>

   @include('frontEnd.include.footer')
   @endsection