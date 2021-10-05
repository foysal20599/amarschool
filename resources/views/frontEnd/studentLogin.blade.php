@extends('frontEnd.layouts.master')
@push('style')
<style>
   header {
    background: black;
}
</style>
    
@endpush

@section('content')

 @include('frontEnd.include.header')
 <div class="inner-banner slider-item">
    <section class="ssitl-breadcrumb">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active"><span class="fa fa-chevron-right mx-2" aria-hidden="true"></span> Login</li>
            </ul>
        </div>
    </section>
</div>
    <!-- main-slider -->
    <section class="ssit-bottom-grids-6 py-5" id="features">
        <div class="container py-lg-5 py-md-4">
            <div class="grids-area-hny main-cont-wthree-fea">
                <!-- /feature-left-->
               <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="text-light text-center" style=" text-transform: uppercase;">Student Login</h3>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                        <p class="text-danger"> {{session('status')}} </p>   
                        @endif
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Mobile number</label>
                                  <input type="text" class="form-control  @error ('email') is-invalid @enderror" name="email">
                                  @error('email')
                                  <small class="text-danger">{{ $message }}</small>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Password</label>
                                  <input type="password" class="form-control @error ('password') is-invalid @enderror" name="password">
                                  @error('password')
                                  <small class="text-danger">{{ $message }}</small>
                                  @enderror
                                </div>
                                <input type="submit" class="btn btn-success" value="Login"/>
                              </form>
                    </div>
                </div>
               </div>
                
            </div>
        </div>
    </section>
    <!-- //bottom-grids-->


   @include('frontEnd.include.footer')
   @endsection