
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
         {!! Html::image('dist/img/user2-160x160.jpg','User Image',['class'=>'img-circle']) !!}
        </div>
        <div class="pull-left info">
          <p>{{ title_case(Auth::guard('member')->user()->name) }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>     

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">VACANCIES</li>
               <!-- Optionally, you can add icons to the links -->
        <!-- <li><a href=""><i class="fa fa-link"></i> <span>Change Password</span> --></a></li>
       @foreach($jobdata as $data)
        <li>
          <a href="{{route('jobpost',['id' => $data->id])}}"> <span>{{ $data->job_title }}</span></a>
        </li>
        @endforeach
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>