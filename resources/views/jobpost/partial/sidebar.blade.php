 @inject('data','App\Helps')
 
@php  
$jobstepdata = $data->getStep();
@endphp


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
        <li class="header"><a href="{{ url('/member/home') }}"><i class="fa fa-arrow-left text-green"></i>BACK TO JOB</a></li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="{{ route("jobpost",['jobid'=>request()->id]) }}">Personal Information
        
        @if(in_array('1', $jobstepdata))
        <i class="fa fa-check text-green"></i>
        @else 
         <i class="fa fa-times text-red"></i>
        @endif

        </a></li>
        <li><a href="{{ route("employmenthistory",['jobid' => request()->id]) }}">Employment History
         @if(in_array('2', $jobstepdata))
        <i class="fa fa-check text-green"></i>
         @else 
         <i class="fa fa-times text-red"></i>

        @endif</a></li>
        <li><a href="{{ route("qualificationeducation",['jobid' => request()->id]) }}">Education, Qualifications & Skills
          @if(in_array('3', $jobstepdata))
        <i class="fa fa-check text-green"></i>
         @else 
         <i class="fa fa-times text-red"></i>

        @endif</a></li>
        <li><a href="{{ route("personalstatement",['jobid' => request()->id]) }}">Personal Statement
       @if(in_array('4', $jobstepdata))
        <i class="fa fa-check text-green"></i>
         @else 
         <i class="fa fa-times text-red"></i>
        @endif</a></li>
        </a></li>
        <li><a href="{{ route("references",['jobid' => request()->id]) }}">References
         @if(in_array('5', $jobstepdata))
        <i class="fa fa-check text-green"></i>
         @else 
         <i class="fa fa-times text-red"></i>
        @endif</a></li>

        </a></li>
        <li><a href="{{ route("workingwithchildren",['jobid' => request()->id]) }}">Working with children <br> &/or
vulnerable adults
         @if(in_array('6', $jobstepdata))
        <i class="fa fa-check text-green"></i>
         @else 
         <i class="fa fa-times text-red"></i>
        @endif</a></li>
 
     </a></li>
        <li><a href="{{ route("criminalconvitions",['jobid' => request()->id]) }}">Criminal Convictions
        @if(in_array('7', $jobstepdata))
        <i class="fa fa-check text-green"></i>
         @else 
         <i class="fa fa-times text-red"></i>
        @endif</a></li>


        </a></li>
        <li><a href="{{ route("reasonaladjustment",['jobid' => request()->id]) }}">Reasonable Adjustment
         @if(in_array('8', $jobstepdata))
        <i class="fa fa-check text-green"></i>
         @else 
         <i class="fa fa-times text-red"></i>
        @endif</a></li>


        </a></li>
         <li><a href="{{ route("documentuploads",['jobid' => request()->id]) }}">Document Upload
          @if(in_array('9', $jobstepdata))
        <i class="fa fa-check text-green"></i>
         @else 
         <i class="fa fa-times text-red"></i>
        @endif</a></li>


         </a></li>
        <li><a href="{{ route("declaration",['jobid' => request()->id]) }}">Declaration
         @if(in_array('10', $jobstepdata))
        <i class="fa fa-check text-green"></i>
         @else 
         <i class="fa fa-times text-red"></i>
        @endif</a></li>


        </a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>