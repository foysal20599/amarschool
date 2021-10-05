
@auth
@if (auth()->user()->type == 4)
@push('style')
  <style>
    .os-viewport.os-viewport-native-scrollbars-invisible {
    background: #1d022d;
}
.elevation-4{
  background: #1d022d;
}
</style>
@endpush
@endif
@endauth

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

@auth
  @if (auth()->user()->type == 1)
  <a href="#" class="brand-link">
    <img src="{{ asset('public/backEnd') }}/assets/avatar/avatar.jpg" alt="Amar online school" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light" style="text-transform: uppercase;">Amar online school</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('public/backEnd') }}/assets/avatar/avatar.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">
          
          {{ auth()->user()->name}}
        {{-- @endif --}}
        </a>
      </div>
    </div>

    @elseif (auth()->user()->type == 2)

    <a href="#" class="brand-link">
      <img src="{{ asset('public/backEnd') }}/assets/avatar/avatar.jpg" alt="Amar online school" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light" style="text-transform: uppercase;">Amar online school</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('public/backEnd') }}/assets/avatar/avatar.jpg" class="img-circle elevation-2" alt="Amar online school">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name}}</a>
        </div>
      </div>

      @elseif (auth()->user()->type == 3)
      <a href="#" class="brand-link">
        <img src="{{ asset('public/backEnd') }}/assets/avatar/avatar.jpg" alt="amar online school" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light" style="text-transform: uppercase;">Amar online school</span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            @if (auth()->user()->profile_photo_path)
            <img src="{{ asset('storage/app') }}/{{ auth()->user()->profile_photo_path }}" alt="amar online school" class="brand-image img-circle elevation-3"
            style="opacity: .8 height:80px !important; width:50px !important;">
            @else
            <img src="{{ asset('public/backEnd') }}/assets/avatar/avatar.jpg" alt="amar online school" class="brand-image img-circle elevation-3"
            style="opacity: .8">
            @endif
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ auth()->user()->name}}</a>
          </div>
        </div>

        @else
        <a href="#" class="brand-link">
          <img src="{{ asset('public/backEnd') }}/assets/avatar/avatar.jpg" alt="amar online school" class="brand-image img-circle elevation-3"
               style="opacity: .8">
          <span class="brand-text font-weight-light" style="text-transform: uppercase;">Amar online school</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              @if (auth()->user()->profile_photo_path)
              <img src="{{ asset('storage/app') }}/{{ auth()->user()->profile_photo_path }}" alt="amar online school" class="brand-image img-circle elevation-3"
              style="opacity: .8 height:80px !important; width:50px !important;">
              @else
              <img src="{{ asset('public/backEnd') }}/assets/avatar/avatar.jpg" alt="amar online school" class="brand-image img-circle elevation-3"
              style="opacity: .8">
              @endif
            </div>
            <div class="info">
              <a href="#" class="d-block">{{ auth()->user()->name}}</a>
            </div>
          </div>

  @endif
@endauth


{{-- nav section auth --}}
@auth
  @if (auth()->user()->type == 1)
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="{{url('dashboard')}}" class="nav-link {{'dashboard' == request()->path() ? 'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle"></i>
              </p> 
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Sub admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::to('subadmin/create')}}" class="nav-link {{'subadmin/create' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::to('subadmin/manage/')}}" class="nav-link {{'subadmin/manage/' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage </p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
               Upload video
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::to('video/create')}}" class="nav-link {{'video/create' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::to('video/manage')}}" class="nav-link {{'video/manage' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage </p>
                </a>
              </li>
            </ul>
          </li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
               YouTube video Upload
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::to('youtube/video/upload')}}" class="nav-link {{'youtube/video/upload' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::to('youtube/video/manage')}}" class="nav-link {{'youtube/video/manage' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage </p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Unions
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::to('create/unions')}}" class="nav-link {{'create/unions' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::to('manage/union')}}" class="nav-link {{'manage/union' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Class
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::to('class/create/')}}" class="nav-link {{'class/create/' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::to('class/manage/')}}" class="nav-link {{'class/manage/' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Agent
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::to('agent/create')}}" class="nav-link {{'agent/create' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::to('agent/manage')}}" class="nav-link {{'agent/manage' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Student
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::to('student/managefor/admin')}}" class="nav-link {{'student/managefor/admin' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage </p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>


      @elseif (auth()->user()->type == 2)
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="{{url('dashboard')}}" class="nav-link {{'dashboard' == request()->path() ? 'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle"></i>
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
               Student
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::to('student/create')}}" class="nav-link {{'student/create' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::to('student/manage/')}}" class="nav-link {{'student/manage/' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage </p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>

      @elseif (auth()->user()->type == 3)
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="{{url('dashboard')}}" class="nav-link {{'dashboard' == request()->path() ? 'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle"></i>
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
               Upload video
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::to('video/create')}}" class="nav-link {{'video/create' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::to('video/manage')}}" class="nav-link {{'video/manage' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
               YouTube video Upload
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::to('youtube/video/upload')}}" class="nav-link {{'youtube/video/upload' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::to('youtube/video/manage')}}" class="nav-link {{'youtube/video/manage' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Agent
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ URL::to('agent/create')}}" class="nav-link {{'agent/create' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ URL::to('agent/manage')}}" class="nav-link {{'agent/manage' == request()->path() ? 'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage </p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>

      @else
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="{{url('dashboard')}}" class="nav-link {{'dashboard' == request()->path() ? 'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle"></i>
              </p>
            </a>
          </li>
        </ul>
      </nav>

      @endif

      @endauth


      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>