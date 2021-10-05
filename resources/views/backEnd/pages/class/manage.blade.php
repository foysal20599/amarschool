@extends('backEnd.layouts.master')
@push('style')
<style>
  table.table.table-sm.table-bordered tr td {
    vertical-align: middle;
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
              <li class="breadcrumb-item active">Class Manage</li>
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
          <div class="col-md-8">
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Manage</h3>
                <div class="add-button text-end">
                    <a href="{{URL::to('class/create')}}" class="btn btn-info btn-sm">Add</a>
                </div>
              </div>
             <div class="card-body">
                <div class="card-body p-0">
                    <table class="table table-sm table-bordered">
                      <thead>
                        <tr class="text-center">
                          <th style="width: 10%">#</th>
                          <th style="width: 30% ">Class Name</th>
                          <th style="width: 30% ">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($class_item as $class)
                            <tr class="text-center">
                                  <td>{{ $loop->index + 1 }} </td>
                                  <td>{{ $class->class_name }} </td>
                                  <td class="text-center">
                                      <a href="{{ URL::to('class/edit/' .$class->id) }}" class="btn btn-info btn-sm">Edit</a>
                                      @if ($class->status == 1)
                                      <a href="{{ URL::to('class/active/' .$class->id) }}" class="btn btn-dark btn-sm">Active</a>
                                          @else
                                      <a href="{{ URL::to('class/inactive/' .$class->id) }}" class="btn btn-warning btn-sm">Inactive</a>
                                         @endif
                                      <a href="{{ URL::to('class/delete/' .$class->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                  </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
             </div>
            </div>
            <!-- /.card -->
          </div>
    
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endsection

