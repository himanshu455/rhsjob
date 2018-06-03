
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
         {!! Html::image('dist/img/user2-160x160.jpg','User Image',['class'=>'img-circle']) !!}
        </div>
        <div class="pull-left info">
          <p>{{ title_case(Auth::user()->name) }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>     

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigation</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="{{ route('password') }}"><i class="fa fa-link"></i> <span>Change Password</span></a></li>
        <li class="treeview {{ Route::currentRouteName() == 'jobs.index' 
        || Route::currentRouteName() == 'jobs.create' ? 'active' : '' }}">
          <a href="#"><i class="fa fa-user-md text-blue"></i> <span>Jobs</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>

              <ul class="treeview-menu">                
                <li class="{{ Route::currentRouteName() == 'jobs.index' 
        || Route::currentRouteName() == 'jobs.create' ? 'active' : '' }}">
                  <a href="{{ route('jobs.index') }}"><i class="fa fa-circle-o text-red"></i>List Jobs</a>
                </li>
                <li class="{{ Route::currentRouteName() == 'jobs.create' 
        || Route::currentRouteName() == 'jobs.create' ? 'active' : '' }}">
                  <a href="{{ route('jobs.create') }}"><i class="fa fa-circle-o text-red"></i>Create Jobs</a>
                </li>
              </ul>
          </a>
          
        </li>
          <li><a href="{{ route('applied-job-app') }}"><i class="fa fa-link"></i> <span>Job Application</span></a></li>

          <li><a href="{{ route('print-pdf') }}"><i class="fa fa-link"></i> <span>Print Pdf</span></a></li>
          <li><a href="{{ route('archive-job-app') }}"><i class="fa fa-link"></i> <span>Archive Job Application</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>