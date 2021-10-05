

 @extends('backEnd.layouts.master')
@push('style')
<style>
  table.table-bordered tr {
    vertical-align: middle !important;
}
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
  
  <!-- Content Wrapper. Contains page content -->
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
              <li class="breadcrumb-item active">Student list</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h3 class="card-title ">Manage</h3>
                    <div class="add-button text-end">
                        <a href="{{URL::to('student/create')}}" class="btn btn-info btn-sm">Add</a>
                    </div>
                  </div>
                    
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th style="width: 5%;">#</th>
                    <th>Student Name</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <th>Class</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td> {{$user->student_name}}</td>
                            <td>{{$user->phone_no}}</td>
                            <td> {{$user->date_of_birth}}</td>
                            <td>{{$user->classname->class_name}}</td>
                            <td><img class="img-fluid img-rounded" src="{{ asset('storage/app') }}/{{ $user->image }}" class="elevation-2" alt="" style="width: 150px;"></td>
                            <td class="text-center">
                              <a href="{{ URL::to('student/edit/' .$user->id)}}" class="text-dark btn-sm"><i class="flaticon-edit"></i></a>
                              <a href="{{ URL::to('student/view/' .$user->id)}}" class="text-info btn-sm"><i class="fas fa-eye"></i></a>
                               @if ($user->status == 1)
                              <a href="{{ URL::to('student/active/' .$user->id)}}" class="text-success btn-sm"><i class="fas fa-user-check"></i></a>
                               @else
                              <a href="{{ URL::to('student/inactive/' .$user->id)}}" class="text-danger btn-sm"><i class="fas fa-user-slash"></i></a>
                              @endif
                              <a href="{{ URL::to('student/delete/' .$user->id)}}" class="text-danger btn-sm"><i class="flaticon-delete"></i></a>
                          </td>
                        </tr>       
                      @endforeach
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection





