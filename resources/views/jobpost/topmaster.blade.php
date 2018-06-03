@include('front.partial.topheader')
  <!-- Left side column. contains the logo and sidebar -->
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('page_header')      
      </h1>      
    </section>
    <section class="content-header">
      <h1>
        @yield('page_register')      
      </h1>      
    </section>

    <!-- Main content -->
     <section class="content">
        @yield('content')
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('front.partial.bottom-footer')