@extends('backEnd.layouts.master')
@push('style')
<style>
  table.table-bordered tr {
    vertical-align: middle !important;
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
              <li class="breadcrumb-item active">Agent manage</li>
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
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Manage</h3>
                </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th style="width: 5%;">#</th>
                    <th>Sub-Admin Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($subadmins as $subadmin)
                        <tr>
                            <td>{{ $loop->index + 1}}</td>
                            <td> {{$subadmin->name}}</td>
                            <td>{{$subadmin->phone_no}}</td>
                            <td> {{$subadmin->email}}</td>
                            <td>{{$subadmin->address}}</td>
                            <td><img class="img-fluid img-rounded" src="{{ asset('storage/app') }}/{{ $subadmin->profile_photo_path }}" class="elevation-2" alt="" style="width: 150px;"></td>
                            <td class="text-center">
                                <a href="{{ URL::to('subadmin/edit/' .$subadmin->id)}}" class="text-dark btn-sm"><i class="flaticon-edit"></i></a>
                                 @if ($subadmin->status == 1)
                                <a href="{{ URL::to('subadmin/active/' .$subadmin->id)}}" class="text-success btn-sm"><i class="fas fa-user-check"></i></a>
                                 @else
                                <a href="{{ URL::to('subadmin/inactive/' .$subadmin->id)}}" class="text-danger btn-sm"><i class="fas fa-user-slash"></i></a>
                                @endif
                                <a href="{{ URL::to('subadmin/delete/' .$subadmin->id)}}" class="text-danger btn-sm"><i class="flaticon-delete"></i></a>
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

  



