<!DOCTYPE html>
<html lang="en">

@include('layouts.components.head')

<body>
  <div class="container-scroller">

   @include('layouts.components.navbar')

    <div class="container-fluid page-body-wrapper">

      @include('layouts.components.themes')

      @include('layouts.components.rightsidebar')

      @include('layouts.components.leftsidebar')

      <div class="main-panel">
        <div class="content-wrapper">
          @include('layouts.components.contentheader')
          

          @yield('content')

          
        </div>
        <!-- content-wrapper ends -->
       
        @include('layouts.components.footer')

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('layouts.components.scripts')

</body>

</html>

