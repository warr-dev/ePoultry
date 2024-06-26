<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}">
          <i class="icon-grid menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('settings')}}">
          <i class="icon-cog menu-icon"></i>
          <span class="menu-title">Settings</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('feeding')}}">
          <i class="icon-arrow-down menu-icon"></i>
          <span class="menu-title">Feeding</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('water')}}">
          <i class="icon-drop menu-icon"></i>
          <span class="menu-title">Water</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('light')}}">
          <i class="icon-sun menu-icon"></i>
          <span class="menu-title">Light</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('fan')}}">
          <i class="icon-thermometer menu-icon"></i>
          <span class="menu-title">Fan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('manure')}}">
          <i class="icon-thermometer menu-icon"></i>
          <span class="menu-title">Manure Drier</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="icon-head menu-icon"></i>
          <span class="menu-title">User Pages</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
          </ul>
        </div>
      </li> --}}
    </ul>
  </nav>
  <!-- partial -->