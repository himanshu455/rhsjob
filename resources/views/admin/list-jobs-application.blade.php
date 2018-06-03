 @inject('data','App\Helps')
@extends('admin.master')
@section('title')

@stop
@section('page_header')
<a><i class="fa fa-tasks"></i></a> Job Application  <a href="{{route('jobs.create')}}" class="btn btn-primary pull-right" type="button"> Create Job</a> 
@stop
@section('content')

  <!-- Content Wrapper. Contains page content -->
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            
             @if(session('status'))
            <div class="alert alert-{{ session('class') }}">{{ session('status') }}</div>
            @endif            
           
           
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Applied Jobs (Userwise)</th>
                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($getAllData as $user)
                @php
                $job_applied = $user->getJobApplied($user->id);
                
                @endphp
                <tr>
                  <td><strong>{{ $user->email }}</strong>

                    @foreach($job_applied as $app)
                    
                      @php
                      $dd =  $data->getJobTitle($app->job_id)
                      @endphp

                     <tr>
                     <td>{{ $dd->job_title }}</td>
                     <td> <a class="btn btn-success btn-sm" href="{{ route('userpersonalinformation',['id' =>$user->id,'job_id'=>$dd->id]) }}">View Details</a></td>
                     </tr>
                      
                       

                     
                    @endforeach
                  </td>
                  
                  
                  <td>
                   
                                     
                  </td>
                                        
                </tr>
            
                @endforeach
                 
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </section>

  @stop
