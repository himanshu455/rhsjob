@include('admin.partial.header')
  <!-- Left side column. contains the logo and sidebar -->
 @include('admin.partial.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('page_header')      
      </h1>      
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      @yield('content')

    </section>

    <section class="content-header">
      <h1>
        @yield('page_top_header')      
      </h1>      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('admin.partial.footer')