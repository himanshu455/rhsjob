
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
        <li class="header"><a href="{{ route('applied-job-app') }}"><i class="fa fa-link"></i> <span>Job Application</span></a></li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="{{ route("userpersonalinformation",['userid'=>request()->id,'jobid'=>request()->jobid]) }}"><i class="fa fa-link"></i> <span>Personal Information</span></a></li>
        <li><a href="{{ route("adminemploymenthistory",['userid'=>request()->id,'jobid'=>request()->jobid]) }}"><i class="fa fa-link"></i> <span>Employment History</span></a></li>
        <li><a href="{{ route("admineduqualification",['userid'=>request()->id,'jobid'=>request()->jobid]) }}"><i class="fa fa-link"></i> <span>Education,Qualifications & Skills</span></a></li>
        <li><a href="{{ route("adminpersonalstatement",['userid'=>request()->id,'jobid'=>request()->jobid]) }}"><i class="fa fa-link"></i> <span>Personal Statement</span></a></li>
        <li><a href="{{ route("adminreferences",['userid'=>request()->id,'jobid'=>request()->jobid]) }}"><i class="fa fa-link"></i> <span>References</span></a></li>
        <li><a href="{{ route("adminworkingwithchild",['userid'=>request()->id,'jobid'=>request()->jobid]) }}"><i class="fa fa-link"></i> <span>Working with children & vulnerable adults</span></a></li>
        <li><a href="{{ route("admincriminalcon",['userid'=>request()->id,'jobid'=>request()->jobid]) }}"><i class="fa fa-link"></i> <span>Criminal Convictions</span></a></li>
        <li><a href="{{ route("adminreasonaladjustment",['userid'=>request()->id,'jobid'=>request()->jobid]) }}"><i class="fa fa-link"></i> <span>Reasonable Adjustment</span></a></li>
         <li><a href="{{ route("adminuploaddoc",['userid'=>request()->id,'jobid'=>request()->jobid]) }}"><i class="fa fa-link"></i> <span>Document Upload</span></a></li>
         <li><a href="{{ route("admindeclartion",['userid'=>request()->id,'jobid'=>request()->jobid]) }}"><i class="fa fa-link"></i> <span>Declaration</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>