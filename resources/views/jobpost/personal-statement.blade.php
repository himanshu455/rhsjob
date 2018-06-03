@extends('jobpost.master')

@section('page_header')

@endsection

@section('page_title')
 Dashboard
@endsection

@section('content')
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
             <h3 class="box-title">PERSONAL STATEMENT</h3>
            
          </div>
            <!-- /.box-header -->
            <!-- form start -->
          <form class="form-horizontal" name="form" action="{{ route('savepersonalstatement') }}" method="post">
           {{ csrf_field() }}
            <div class="box-body">
                <p>In this section please provide evidence and give specific examples of how you meet the essential and desirable criteria set out in the Job
Description. Clearly explain how your experience, knowledge and skills make you a suitable candidate for this role. Remember to include details
of paid/unpaid work as well as other activities relevant to the position (no more than 350 – 400 words).</p>
                   <div class="form-group">
                    <div class="col-sm-10">
                      <textarea name="job_description" id="job_description" onblur="savePersonalstatement()" class="form-control" rows="12"> @if(isset( $persdata->job_description)){{ $persdata->job_description }} @endif </textarea>
                       @if($errors->has('job_description'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('job_description') }}
                                   </span>
                                   @endif
                    </div>
                  </div>
                   <p>FOR TEACHING POSTS</p>
                   <p>How would you contribute to the wider life of the School?.</p>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <textarea name="school_contribution" onblur="savePersonalstatement()" id="school_contribution" class="form-control" rows="4"> @if(isset( $persdata->school_contribution)){{ $persdata->school_contribution }} @endif </textarea>
                      <input type="hidden" name="job_id" id="job_id" value="{{ $jobid }}">
                    </div>
                  </div>
            <div class="box-footer">               
              <button type="submit" class="btn btn-success pull-right">Save & continue</button>
            </div>              
          </form>
      </div>
    </div>          
  </div>
</section>
@endsection
@section('footer-js')
 <script>
    function savePersonalstatement(){
       var job_description = $('#job_description').val();
       var school_contribution = $('#school_contribution').val();
       var job_id = $('#job_id').val();
        $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('savepersonalstatement') }}",
        data: {job_description:job_description,school_contribution:school_contribution,job_id:job_id },
        beforeSend: function(){
          console.log(job_description,school_contribution);
        },
        success: function(data) {
            // $('.main-pro-bg').html(data);
            console.log(data);
        }
    });



    }

 </script>
@endsection