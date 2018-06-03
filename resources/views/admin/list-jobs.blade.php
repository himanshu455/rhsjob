@extends('admin.master')
@section('title')

@stop
@section('page_header')
<a><i class="fa fa-tasks"></i></a> Job list  <a href="{{route('jobs.create')}}" class="btn btn-primary pull-right" type="button"> Create Job</a> 
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
                  <th>Job Go Live Date</th>
                  <th>Job Close Date</th>
                  <th>Job Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($alldata as $val)
                <tr>
                  <td>{{ $val->job_title }}</td>
                  <td>{{ \Carbon\Carbon::parse($val->job_go_live_date)->format('F jS Y') }}</td>
                   <td>{{ \Carbon\Carbon::parse($val->job_close_date)->format('F jS Y') }}</td>
                  <td>{{ strip_tags(substr($val->job_desc,0,50)) }}</td> 
                  <td>{{ Form::open(['route' => ['jobs.destroy',$val->id], 'method' => 'delete', 'class' => 'delete'])  }}
                    <a class="btn btn-success btn-sm" href="{{ route('jobs.edit',['id' => $val->id]) }}">Update</a>
                                        <button class="btn btn-danger btn-sm" type="submit"  onclick="return confirm('Are you sure you want to delete this job?');">Delete</button>
                                         </td>
                                        {{ Form::close() }}
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
