<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
   
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          @auth
          @if (auth()->user()->type == 4)
            <a href="{{url('profile')}}" class="dropdown-item">  Profile </a>
            <div class="dropdown-divider"></div>
            <a href="{{url('change/password')}}" class="dropdown-item"> Change password </a>
            <div class="dropdown-divider"></div>
            <a href="{{url('profile/edit')}}" class="dropdown-item"> Update Profile </a>
            <div class="dropdown-divider"></div>
          @endif
          @endauth
         
          <a href="" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>
          <form  action="{{route('logout')}}" method="POST" id="logout-form" class="d-none">
              @csrf
          </form>
        </div>
      </li>

    </ul>
  </nav>