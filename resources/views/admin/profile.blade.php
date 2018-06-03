@extends('admin.master')
@section('page_title')
Manage Job
@stop
@section('content')


<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Manage Profile</h3>
               @if(session('status'))
            <div class="alert alert-{{ session('class') }}">{{ session('status') }}</div>
            @endif 
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             {!! Form::model($profiledata, ['route' => ['saveprofile',$profiledata->id],'method' => 'post', 'class' => ''])!!}
               {{csrf_field()}}
              <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" value="{{ $profiledata->name }}" class="form-control" id="name" placeholder="Enter name">
                    @if($errors->has('name'))
                       <span class="help-block text-red">
                       {{ $errors->first('name') }}
                       </span>
                   @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="text" name="email" value="{{ $profiledata->email }}" class="form-control" id="email" placeholder="Enter email address">
                    @if($errors->has('email'))
                       <span class="help-block text-red">
                       {{ $errors->first('email') }}
                       </span>
                   @endif
                  </div>
                   
                <div class="col-md-6">
                  
                </div>
              </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
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