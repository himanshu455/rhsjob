@extends('admin.master')
@section('page_title')
Change Password
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
           @if(session('status'))
            <div class="alert alert-{{ session('class') }}">{{ session('status') }}</div>
            @endif 
            <div class="box-header with-border">
              <h3 class="box-title">Change password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <form name="form1" role="form" action="{{ route('savepassword') }}" method="post">
               {{csrf_field()}}
              <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Old Password</label>
                    <input type="password" name="old_password" value="" class="form-control" id="old_password" placeholder="Enter old password">
                    @if($errors->has('old_password'))
                       <span class="help-block text-red">
                       {{ $errors->first('old_password') }}
                       </span>
                   @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">New Password</label>
                    <input type="password" name="new_password" value="" class="form-control" id="new_password" placeholder="Enter new password">
                    @if($errors->has('new_password'))
                       <span class="help-block text-red">
                       {{ $errors->first('new_password') }}
                       </span>
                   @endif
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Confirm Password</label>
                    <input type="password" name="new_password_confirmation" value="" class="form-control" id="password_confirmation" placeholder="Enter confirm password">
                    @if($errors->has('new_password_confirmation'))
                       <span class="help-block text-red">
                       {{ $errors->first('new_password_confirmation') }}
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