<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RHS  | JOBS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 {!! Html::style("bower_components/bootstrap/dist/css/bootstrap.min.css") !!}
  <!-- Font Awesome -->
 {!! Html::style("bower_components/font-awesome/css/font-awesome.min.css") !!}
  <!-- DataTables -->
 {!! Html::style("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") !!}
  <!-- Ionicons -->
 {!! Html::style("bower_components/Ionicons/css/ionicons.min.css") !!}
  <!-- Theme style -->
 {!! Html::style("dist/css/AdminLTE.min.css") !!}
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  {!! Html::style("dist/css/skins/skin-blue.min.css") !!}

  {!! Html::style("bower_components/Ionicons/css/ionicons.min.css") !!}
  {!! Html::style("bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css") !!}
  {!! Html::style("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css") !!}

  



   

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
         {!! Html::script('bower_components/tinymce/js/tinymce/tinymce.min.js') !!}

     <script type="text/javascript">

     tinymce.init({

      selector: 'textarea.editor',

      height: 150,

      theme: 'modern',

      plugins: [

        'advlist autolink lists link image charmap print preview hr anchor pagebreak',

        'searchreplace wordcount visualblocks visualchars code fullscreen',

        'insertdatetime media nonbreaking save table contextmenu directionality',

        'template paste textcolor colorpicker textpattern imagetools'

      ],

      toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',

      toolbar2: '',

      image_advtab: true,

      relative_urls: false   

     });



    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>RHS</b>jobs</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
           
            <ul class="dropdown-menu">
         
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                       <!--  <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
                        {!! Html::image('dist/img/user2-160x160.jpg','User Image',['class'=>'img-circle']) !!}
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
             
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
         
          <!-- Tasks Menu -->
        
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
                {!! Html::image('dist/img/user2-160x160.jpg','User Image',['class'=>'user-image']) !!}
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ title_case(Auth::user()->name) }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                {!! Html::image('dist/img/user2-160x160.jpg','User Image',['class'=>'img-circle']) !!}

                <p>
               {{ title_case(Auth::user()->name) }}
                  
                </p>
              </li>             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('profile',['id'=>1]) }}" class="btn btn-default btn-flat">Profile</a>
                </div>
               <div class="pull-right">
                  <a onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                  
                  <form id="logout-form" action="{{ route('adminloginlogout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>