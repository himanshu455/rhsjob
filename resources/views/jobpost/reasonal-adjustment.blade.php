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
             <h3 class="box-title">REASONABLE ADJUSTMENT</h3>
          </div>
          <form class="form-horizontal" name="form1" method="post" action="{{ route('savereasonaladjustment')}}">
            <div class="box-body">
                 {{ csrf_field() }}
                   <div class="form-group">
                    <label for="" class="col-sm-6 control-label">Do you require any reasonable adjustments to be made to facilitate you attending interview?<span class="text-red">*</span></label>
                    <div class="col-sm-2">
                      <select class="form-control" required="" name="attending_interview" id="attending_interview" onblur="saveResonal(this)">
                       <option value="">Please Select</option>
                        <option value="yes" {{ isset($allreasonaldata->attending_interview) && $allreasonaldata->attending_interview =='yes' ? 'selected' : ''}}>Yes</option>
                        <option value="no" {{ isset($allreasonaldata->attending_interview) && $allreasonaldata->attending_interview =='no' ? 'selected' : ''}}>No</option> 
                      </select>
                    </div>
                  </div>
                 <p><b>If ‘yes’, please provide details</b></p>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <textarea name="please_provide_detail" onblur="saveResonal(this)" id="please_provide_detail" class="form-control" rows="6">@if(isset($allreasonaldata->please_provide_detail)){{ $allreasonaldata->please_provide_detail }} @endif</textarea>
                    </div>
                  </div>
                  <p><b>Additionally, please provide details and outline practical steps, if any, that you would like the School to take to ensure that the post
is accessible to you</b></p>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <textarea name="additional_provide_detail" onblur="saveResonal(this)" id="additional_provide_detail" class="form-control" rows="6"> @if(isset($allreasonaldata->additional_provide_detail)){{ $allreasonaldata->additional_provide_detail }} @endif</textarea>
                    </div>
                </div>
                <input type="hidden" name="job_id" id="job_id" value="{{ $jobid }}">
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
    function saveResonal(obj){

      if(obj.id == 'attending_interview'){
          var attending_interview = obj.value;
      }else{
          var attending_interview = '';
      }  
       var please_provide_detail = $('#please_provide_detail').val();
       var additional_provide_detail = $('#additional_provide_detail').val();
       var job_id = $('#job_id').val(); 
        $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('savereasonaladjustment') }}",
        data: {attending_interview:attending_interview,please_provide_detail:please_provide_detail,additional_provide_detail:additional_provide_detail,job_id:job_id},
        beforeSend: function(){
          //console.log(ref_name,ref_position);
        },
        success: function(data) {
            // $('.main-pro-bg').html(data);
            //console.log(data);
        }
    });

    }

 </script>
@endsection