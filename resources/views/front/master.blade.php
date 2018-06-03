@include('front.partial.header')
  <!-- Left side column. contains the logo and sidebar -->
 @include('front.partial.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('page_header')      
      </h1>      
    </section>
     <section class="content-header">
     
        @yield('page_description')      
         
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('front.partial.footer')