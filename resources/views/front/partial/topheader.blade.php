<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>RHS | JOBS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  {!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
  <!-- Font Awesome -->
   {!! Html::style('bower_components/font-awesome/css/font-awesome.min.css') !!}
  <!-- Ionicons -->
   {!! Html::style('bower_components/Ionicons/css/ionicons.min.css') !!}
  <!-- Theme style -->
   {!! Html::style('dist/css/AdminLTE.min.css') !!}
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  {!! Html::style('dist/css/skins/_all-skins.min.css') !!}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
       <!--  <div class="navbar-header">
         <a href="../../index2.html" class="navbar-brand"><b>Admin</b>LTE</a>
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
           <i class="fa fa-bars"></i>
         </button>
       </div> -->

        <!-- Collect the nav links, forms, and other content for toggling -->
       <!--  <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
         <ul class="nav navbar-nav">
           <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
           <li><a href="#">Link</a></li>
           <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
             <ul class="dropdown-menu" role="menu">
               <li><a href="#">Action</a></li>
               <li><a href="#">Another action</a></li>
               <li><a href="#">Something else here</a></li>
               <li class="divider"></li>
               <li><a href="#">Separated link</a></li>
               <li class="divider"></li>
               <li><a href="#">One more separated link</a></li>
             </ul>
           </li>
         </ul>
       </div> -->
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
       <!--  <div class="navbar-custom-menu">
         <ul class="nav navbar-nav">
           <li class="dropdown user user-menu">
             Menu Toggle Button
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               The user image in the navbar
               <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
               hidden-xs hides the username on small devices so only the image appears.
               <span class="hidden-xs">Alexander Pierce</span>
             </a>
             <ul class="dropdown-menu">
               The user image in the menu
               <li class="user-header">
                 <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
       
                 <p>
                   Alexander Pierce - Web Developer
                   <small>Member since Nov. 2012</small>
                 </p>
               </li>
               Menu Body
               <li class="user-body">
                 <div class="row">
                   <div class="col-xs-4 text-center">
                     <a href="#">Followers</a>
                   </div>
                   <div class="col-xs-4 text-center">
                     <a href="#">Sales</a>
                   </div>
                   <div class="col-xs-4 text-center">
                     <a href="#">Friends</a>
                   </div>
                 </div>
                 /.row
               </li>
               Menu Footer
               <li class="user-footer">
                 <div class="pull-left">
                   <a href="#" class="btn btn-default btn-flat">Profile</a>
                 </div>
                 <div class="pull-right">
                   <a href="#" class="btn btn-default btn-flat">Sign out</a>
                 </div>
               </li>
             </ul>
           </li>
         </ul>
       </div> -->
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Wi