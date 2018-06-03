@extends('admin.master')
@section('page_title')
Manage Job
@stop
@section('content')
@section('page_header')
<a><i class="fa fa-tasks"></i></a> Create Job  <a href="{{route('jobs.index')}}" class="btn btn-primary pull-right" type="button"> List jobs</a> 
@stop

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form name="form1" role="form" action="{{ route('jobs.store') }}" method="post">
               {{csrf_field()}}
              <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Job Title</label>
                    <input type="text" name="job_title" value="{{ old('job_title') }}" class="form-control" id="job_title" placeholder="Enter Job Title">
                    @if($errors->has('job_title'))
                       <span class="help-block text-red">
                       {{ $errors->first('job_title') }}
                       </span>
                   @endif
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Job Description</label>
                    <textarea name="job_desc" value="" class="form-control editor" id="job_desc" placeholder="Enter Job Description" cols="200">{{ old('job_desc') }} </textarea> 
                    @if($errors->has('job_desc'))
                       <span class="help-block text-red">
                       {{ $errors->first('job_desc') }}
                       </span>
                   @endif
                  </div>

                    <div class="form-group">
                    <label>Job live date:</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" value="{{ old('job_go_live_date') }}" name="job_go_live_date" class="form-control pull-right" id="job_live_date" placeholder="Job live date">
                    </div>
                    @if($errors->has('job_go_live_date'))
                       <span class="help-block text-red">
                       {{ $errors->first('job_go_live_date') }}
                       </span>
                   @endif
                 </div>
                  <div class="form-group">
                    <label>Job close date:</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" value="{{ old('job_close_date') }}" name="job_close_date" class="form-control pull-right" id="job_close_date" placeholder="Job close date">
                    </div>
                    @if($errors->has('job_close_date'))
                       <span class="help-block text-red">
                       {{ $errors->first('job_close_date') }}
                       </span>
                   @endif
                 </div>
                <div class="form-group">
                  <label>
                  <div class="icheckbox_minimal-blue checked">
                    <input type="checkbox" name="is_cover" value="1" id="is_cover" class="minimal">
                    Is Cover
                    </div>
                  </label>
               </div>

               <div class="form-group">
                  <label>
                    <input type="checkbox" value="1" name="is_teaching" id="is_teaching" class="minimal">
                    Is Teaching
                  </label>
               </div>
                </div>
                <div class="col-md-6">
                  
                </div>
              </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </section>
          <!-- /.box -->

@stop
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$(function(){
 //Date picker
    $('#job_live_date').datepicker({
      autoclose: true,
      orientation: "bottom auto",
      format: 'yyyy-mm-dd',
    });

    $('#job_close_date').datepicker({
      autoclose: true,
      orientation: "bottom auto",
      format: 'yyyy-mm-dd',
    });

  });
</script>