@extends('backEnd.layouts.master')
@push('style')
<style>
      #blah{ width: 200px !important; height: auto !important; }
      input[type=file]{
      padding:10px;}
      .text-end{
          text-align: end;
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
              <li class="breadcrumb-item active">Student Profile</li>
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
                <h3 class="card-title" style="text-transform: uppercase;">Profile</h3>
                <div class="text-end">
                    <a href="{{ URL::TO('student/edit/foradmin/' .$user->id)}}" class="btn btn-info btn-sm">Edit</a>
                </div>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 profile-image">
                        @if ($user->image)
                            <img class="img-fluid img-rounded" src="{{ asset('storage/app') }}/{{ $user->image }}" class="elevation-2" alt="">
                        @else
                            <img class="img-fluid img-rounded" style="border: 1px solid;" src="{{ asset('public/backEnd') }}/assets/avatar/avatar.jpg" class="elevation-2" alt="">
                        @endif
                       
                      
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <table id="example1" class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <td><h6 class="text-info">Agent Name</h6> </td>
                                    <td><h6 class="text-info">{{$user->agent->name }}</h6></td>
                                </tr>
                                <tr>
                                    <td>Student Name </td>
                                    <td>{{$user->student_name }}</td>
                                </tr>
                                <tr>
                                    <td>Father Name</td>
                                    <td>{{$user->father_name}}</td>
                                </tr>
                                <tr>
                                    <td>Mother Name</td>
                                    <td>{{$user->mother_name}}</td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td>{{$user->date_of_birth}}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{$user->phone_no}}</td>
                                </tr>
                                <tr>
                                    <td>Class Name </td>
                                    <td>{{$user->classname['class_name']}}</td>
                                </tr>
                                <tr>
                                    <td>Religion</td>
                                    <td>{{$user->religion}}</td>
                                </tr>
                                <tr>
                                    <td>Gendar</td>
                                    <td>
                                        @if ($user->gender == 1)
                                          Male
                                          @elseif($user->gender == 2)
                                          Female 
                                          @else
                                          Others
                                        @endif
                                     
                                    </td>
                                </tr>
                                @if ($user->address)
                                <tr>
                                    <td>Address</td>
                                    <td>{{$user->address}}</td>
                                </tr>
                                @endif
                                <tr>
                                  <td>Union Name</td>
                                  <td>{{$user->union['name']}}</td>
                              </tr>
                              <tr>
                                <td>Upozilla Name</td>
                                <td>{{$user->union->upozilla['name']}}</td>
                            </tr>
                            <tr>
                              <td>District Name</td>
                              <td>{{$user->union->upozilla->district['name']}}</td>
                          </tr>
                          <tr>
                            <td>Division Name</td>
                            <td>{{$user->union->upozilla->district->division['name']}}</td>
                        </tr>
                            </tbody>
                        </table>   
                    </div>
                  </div>
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

  