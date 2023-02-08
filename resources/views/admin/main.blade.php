
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
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>{{$title}}</h3>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            @if(!empty($page_view)) 
              @include($page_view)
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