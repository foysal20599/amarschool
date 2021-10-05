@extends('frontEnd.layouts.master')

@section('content')
@include('frontEnd.include.header')
<hr>
    <div class="container mt-3 pt-3">
        <div class="alert  text-center">
            <h2 class="display-3">404</h2>
            <p class="display-5">Oops! Something is wrong.</p>
            <img class="img-fluid" style="height: 500px; width:650px;" src="{{ asset('public/frontEnd') }}/assets/images/404.png" alt="amar online school">
        </div>
    </div>

@include('frontEnd.include.footer')
@endsection