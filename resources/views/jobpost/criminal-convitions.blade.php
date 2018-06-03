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
             <h3 class="box-title">CRIMINAL CONVITIONS</h3>
            <p>Please give details of any criminal convictions, cautions, bind overs or reprimands below. As you are applying for a position at a school, where
you are likely to have contact with children <b>you must always declare any convictions, cautions, bind overs, reprimands or final warnings,
which would not be filtered in line with the current Rehabilitation of Offenders Act guidance.</b></p>
<h4>DETAILS OF CRIMINAL CONVICTIONS, CAUTIONS, BIND OVERS,
REPRIMANDS OR FINAL WARNINGS</h4>
          </div>
            <!-- /.box-header -->
            <!-- form start -->
         <form class="form-horizontal" form name="form" method="post" action="{{ route('savecriminalconvitions') }}">
               {{ csrf_field() }}
            <div class="box-body">
                   <div class="form-group">
                    <label for="" class="col-sm-5 control-label">Have you been convicted by the courts of any criminal offence? </label>
                    <div class="col-sm-2">
                      <select class="form-control" required="" name="court_criminal_offence" id="court_criminal_offence" onblur="saveCriminal(this)">
                       <option value="">Please Select</option>
                        <option value="yes"  {{ isset($allcridata->court_criminal_offence) && $allcridata->court_criminal_offence =='yes' ? 'selected' : ''}} >Yes</option>
                        <option value="no" {{ isset($allcridata->court_criminal_offence) && $allcridata->court_criminal_offence =='no' ? 'selected' : ''}}>No</option>
                      </select>
                    </div>
                  </div> 
                  <div class="form-group">
                    <label for="" class="col-sm-5 control-label">Is there any relevant court action pending against you? </label>
                    <div class="col-sm-2">
                      <select class="form-control" required="" name="court_action_against" id="court_action_against" onblur="saveCriminal(this)">
                       <option value="">Please Select</option>
                        <option value="yes" {{ isset($allcridata->court_action_against) && $allcridata->court_action_against =='yes' ? 'selected' : ''}} >Yes</option>
                        <option value="no" {{ isset($allcridata->court_action_against) && $allcridata->court_action_against =='no' ? 'selected' : ''}} >No</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-5 control-label">Have you ever received a caution, reprimand or final warning from the police? </label>
                    <div class="col-sm-2">
                      <select class="form-control" required="" name="final_warning_police" id="final_warning_police" onblur="saveCriminal(this)">
                       <option value="">Please Select</option>
                        <option value="yes" {{ isset($allcridata->final_warning_police) && $allcridata->final_warning_police =='yes' ? 'selected' : ''}}>Yes</option>
                        <option value="no" {{ isset($allcridata->final_warning_police) && $allcridata->final_warning_police =='no' ? 'selected' : ''}}>No</option>
                      </select>
                    </div>
                  </div>
                   <p><b>If you have answered ‘yes’ to any of the above, please provide details</b></p>
                  <div class="form-group">
                    <div class="col-sm-10">
                      <textarea name="criminal_provide_detail"  onblur="saveCriminal(this)" id="criminal_provide_detail" class="form-control" rows="8">@if(isset($allcridata->criminal_provide_detail)){{ $allcridata->criminal_provide_detail }} @endif </textarea>
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
    function saveCriminal(obj){

      if(obj.id == 'court_criminal_offence'){
          var court_criminal_offence = obj.value;
      }  if(obj.id == 'court_action_against'){
         var court_action_against = obj.value;
      } if(obj.id == 'final_warning_police'){
         var final_warning_police = obj.value;
      }
       var job_id = $('#job_id').val();
       var cdetails = $('#criminal_provide_detail').val();
       $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('savecriminalconvitions') }}",
        data: {court_criminal_offence:court_criminal_offence,court_action_against:court_action_against,final_warning_police:final_warning_police,job_id:job_id,cdetails:cdetails},
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