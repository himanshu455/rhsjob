 @inject('data','App\Helps')
 @inject('data1','App\Helps')
@extends('admin.master')
@section('title')

@stop
@section('page_header')
<a><i class="fa fa-tasks"></i></a> Manage Application  <a href="{{route('jobs.create')}}" class="btn btn-primary pull-right" type="button"> Create Job</a> 
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
                  <th>Job Title</th>
                  <th>Letter</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($appliedId as $val)
                @php
                $job_title =  $data->getJobAppliedTitle($val->job_id);
                $personalInformation1 =  $data1->personalInformationdetails($val->user_id,$val->job_id);
                
                @endphp
                <tr>
                  <td>{{ $job_title }}</td>
                  <td>{{ $val->letter }}</td>
                  <td>{{ $personalInformation1->fore_name }}</td>
                  <td>{{ $personalInformation1->current_address }}</td>
                  <td>{{ $personalInformation1->email }}</td>
                  <td>{{ $personalInformation1->contact_tel_num }}</td> 
                  
                   <td> <a class="btn btn-success btn-sm" href="{{ route('userpersonalinformation',['id' =>$val->user_id,'job_id'=>$val->job_id]) }}">View Detail</a></td>
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
