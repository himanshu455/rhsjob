 @inject('data','App\Helps')
 
@php  
$jobstepdata = $data->completeJob();
@endphp

@extends('front.master')

@section('page_header')
  <div class="box box-primary">
      @if(session('mesg'))
      <div class="alert alert-{{ session('class') }}">{{ session('mesg') }}</div>
      @endif 
    </div>
   @if(!$jobstepdata->count())
    Dashboard 
     
    @else
    EXISITING APPLICATIONS
    @endif
 
@endsection

@section('page_title')
 Dashboard
@endsection

@section('page_description')
At the Royal Hospital School we are committed to promoting safeguarding and the welfare of our pupils. All applicants must be
willing to undergo child protection screening, including the Disclosure and Barring Service (DBS).
Please ensure you fill in all the sections of the application form.
@endsection


@section('content')
 @if($jobstepdata->count())
 <div class="row">
 <div class="col-md-8">
 <div class="attachment">
                  <h4>OPEN APPLICATIONS</h4>
                  @foreach($jobstepdata->unique('job_id') as $jobid)
                  @php
                  $jobTitle = $jobid->getJobTitle($jobid->job_id);
                  $count_perc = $jobid->getCompPer($jobid->job_id);
                  @endphp
                  <h4 class="filename">
                   <a href="{{ route("jobpost",['jobid'=>$jobid->job_id]) }}">{{ strtoupper($jobTitle->job_title) }} </a>
                  </h4>
                  <p class="filename">
                    CLOSING DATE: {{ \Carbon\Carbon::parse($jobTitle->created_at)->format('F jS Y') }}
                  </p>
                  <div class="pull-right">
                    @php 
                    $countcal = $count_perc*10;
                    @endphp
                   {{  $countcal }}% COMPLETE
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: {{ $countcal  }}%"></div>
                    </div>
                  </div>

                  <div class="pull-left">
                   <a href="{{ route("jobpost",['jobid'=>$jobid->job_id]) }}"> <button type="button" class="btn btn-primary btn-sm btn-flat">Edit Application</button> </a>&nbsp;
                  </div>
                   @if($countcal==100)
                  <div class="pull-left">
                    <a href="{{ route('usergenetate-pdf',['jobid'=>$jobid->job_id]) }}"><button type="button" class="btn btn-primary btn-sm btn-flat">Print Application</button>&nbsp; </a>
                  </div>
                   @endif
                   @if($countcal==100)
                   <div class="pull-left">
                   <a href="{{ route("sendmail",['jobid'=>$jobid->job_id]) }}"> <button type="button" class="btn btn-primary btn-sm btn-flat">Send Application</button></a>
                  </div>
                  @endif
                  <div style="clear:both;"></div>
                @endforeach
                </div>
                </div></div>
                @endif
@endsection
