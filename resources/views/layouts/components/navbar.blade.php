 <!-- partial:partials/_navbar.html -->
 <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo mr-50" ><img src="/images/poulty.png" class="mr-50" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" ><img src="/images/kulungan.svg" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu"></span>
      </button>
      <ul class="navbar-nav mx-2">
        {{-- <li class="nav-item nav-search d-none d-lg-block">
          <div class="input-group">
            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
              <span class="input-group-text" id="search">
                <i class="icon-search"></i>
              </span>
            </div>
            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
          </div>
        </li> --}}
        <li class="nav-item">
          <i class="mdi mdi-water display-4" style="color:red" id="stat-water"></i>
        </li>
        <li class="nav-item">
          <i class="mdi mdi-food display-4" style="color:red" id="stat-feeder"></i>
        </li>
        <li class="nav-item">
          <i class="mdi mdi-lightbulb display-4" style="color:red" id="stat-light"></i>
        </li>
        <li class="nav-item">
          <i class="mdi mdi-thermometer display-4" style="color:red" id="stat-temperature"></i>
        </li>
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        {{-- <li class="nav-item dropdown"> --}}
          {{-- <a class="nav-link">
            <i class=""></i>
            <span class="count"></span>
          </a> --}}
          {{-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown"> --}}
            {{-- <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p> --}}
            {{-- <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-success">
                  <i class="ti-info-alt mx-0"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal">Application Error</h6>
                <p class="font-weight-light small-text mb-0 text-muted">
                  Just now
                </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-warning">
                  <i class="ti-settings mx-0"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject font-weight-normal">Settings</h6>
                <p class="font-weight-light small-text mb-0 text-muted">
                  Private message
                </p>
              </div>
            </a>
            <a class="">
              <div class="">
                <div class="">
                  <i class=""></i>
                </div>
              </div>
            
            </a> --}}
          {{-- </div> --}}
        {{-- </li> --}}
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="/images/faces/user_pic.jpg" alt="profile"/>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            {{-- <a class="dropdown-item">
              <i class="ti-settings text-primary"></i>
              Settings
            </a> --}}
            <form method="POST" action="{{ route('logout') }}">@csrf
            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
              <i class="ti-power-off text-primary"></i>
              Logout
            </a></form>
          </div>
        </li>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </ul>
    </div>
  </nav>
  <!-- partial -->
