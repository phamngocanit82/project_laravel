
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.head')
  </head>
  <body class="sidebar">
    <!-- Loader starts  class="dark-sidebar pace-done dark-only"-->
    <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      @include('admin.header')
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper horizontal-menu">
        <!-- Page Sidebar Start-->
        @include('admin.sidebar')
        <!-- Page Sidebar Ends-->
        <div class="page-body" style="display: none; visibility: hidden;" id="body_content"> 
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            @if(!empty($display_view['page_view'])) 
              @include($display_view['page_view'])
            @endif
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        @include('admin.footer')
      </div>
    </div>
    @include('admin.foot')
  </body>
</html>