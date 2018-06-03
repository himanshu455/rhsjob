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
             <h3 class="box-title">DECLARATION</h3>
          </div>
            <!-- /.box-header -->
            <!-- form start -->
          <form class="form-horizontal" method="post" action="{{ route('savedeclaration') }}">
            {{ csrf_field() }}
            <div class="box-body">
                   <div class="form-group">
                    <label for="" class="col-sm-6 control-label">I confirm that the information I have given on this application form is true and correct to the best of my knowledge. <span class="text-red">*</span></label>
                    <div class="col-sm-2"> 
                    <select class="form-control" required="" name="best_my_knowledge" id="best_my_knowledge" onblur="saveDeclaraton(this)">
                    <option value="">Please Select</option>
                        <option value="yes" {{ isset($alldeclardatadata->best_my_knowledge) && $alldeclardatadata->best_my_knowledge =='yes' ? 'selected' : ''}}>Yes</option>
                        <option value="no" {{ isset($alldeclardatadata->best_my_knowledge) && $alldeclardatadata->best_my_knowledge =='no' ? 'selected' : ''}}>No</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-6 control-label">I confirm that I am not on the DBS Children’s Barred List or DBS Adults’ Barred List and I am not disqualified from working
            }
with children or subject to sanctions imposed by a regulatory body. <span class="text-red">*</span></label>
                    <div class="col-sm-2">
                      <select class="form-control" required="" onblur="saveDeclaraton(this)" name="i_am_not_disqualified" id="i_am_not_disqualified">
                      <option value="">Please Select</option>
                        <option value="yes" {{ isset($alldeclardatadata->i_am_not_disqualified) && $alldeclardatadata->i_am_not_disqualified =='yes' ? 'selected' : ''}}>Yes</option>
                        <option value="no" {{ isset($alldeclardatadata->i_am_not_disqualified) && $alldeclardatadata->i_am_not_disqualified =='no' ? 'selected' : ''}}>No</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-6 control-label">I understand that providing false information is an offence which could result in my application being rejected or (if the
false information comes to light after my appointment) summary dismissal and may amount to a criminal offence. <span class="text-red">*</span></label>
                    <div class="col-sm-2">
                      <select class="form-control" required="" name="providing_false_information" id="providing_false_information" onblur="saveDeclaraton(this)">
                        <option value="">Please Select</option>
                        <option value="yes" {{ isset($alldeclardatadata->providing_false_information) && $alldeclardatadata->providing_false_information =='yes' ? 'selected' : ''}}>Yes</option>
                        <option value="no"  {{ isset($alldeclardatadata->providing_false_information) && $alldeclardatadata->providing_false_information =='no' ? 'selected' : ''}}>No</option>
                      </select>
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="" class="col-sm-6 control-label">I consent to the School processing the information given on this form, including any ‘sensitive’ information, as may be
necessary during the recruitment and selection process.<span class="text-red">*</span> </label>
                    <div class="col-sm-2">
                      <select class="form-control" required="" name="recruitment_and_selection_process" id="recruitment_and_selection_process" onblur="saveDeclaraton(this)">
                        <option value="">Please Select</option>
                        <option value="yes" {{ isset($alldeclardatadata->recruitment_and_selection_process) && $alldeclardatadata->recruitment_and_selection_process =='yes' ? 'selected' : ''}}>Yes</option>
                        <option value="no" {{ isset($alldeclardatadata->recruitment_and_selection_process) && $alldeclardatadata->recruitment_and_selection_process =='no' ? 'selected' : ''}}>No</option>
                      </select>
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="" class="col-sm-6 control-label">I consent to the School making direct contact with all previous employers where I have worked with children or
vulnerable adults to verify my reason for leaving that position <span class="text-red">*</span></label>
                    <div class="col-sm-2">
                      <select class="form-control" required="" name="reason_for_leaving_that_position" id="reason_for_leaving_that_position" onblur="saveDeclaraton(this)">
                         <option value="">Please Select</option>
                        <option value="yes" {{ isset($alldeclardatadata->reason_for_leaving_that_position) && $alldeclardatadata->reason_for_leaving_that_position =='yes' ? 'selected' : ''}}>Yes</option>
                        <option value="no" {{ isset($alldeclardatadata->reason_for_leaving_that_position) && $alldeclardatadata->reason_for_leaving_that_position =='no' ? 'selected' : ''}}>No</option>
                      </select>
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="" class="col-sm-6 control-label">I consent to the School making direct contact with the people specified as my referees to verify the reference.<span class="text-red">*</span></label>
                    <div class="col-sm-2">
                      <select class="form-control" required="" name="verify_the_reference" id="verify_the_reference" onblur="saveDeclaraton(this)">
                        <option value="">Please Select</option>
                        <option value="yes" {{ isset($alldeclardatadata->verify_the_reference) && $alldeclardatadata->verify_the_reference =='yes' ? 'selected' : ''}}>Yes</option>
                        <option value="no"  {{ isset($alldeclardatadata->verify_the_reference) && $alldeclardatadata->verify_the_reference =='no' ? 'selected' : ''}}>No</option>
                      </select>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Signature </label>
                        <div class="col-sm-6">
                          <input type="text" name="signature" value="@if(isset($alldeclardatadata->signature))  {{ $alldeclardatadata->signature }} @endif" onblur="saveDeclaraton(this)" id="signature" class="form-control">
                        </div>
                      </div>
                    </div>
                     <div class="col-md-4">
                      <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Date </label>
                        <div class="col-sm-6">
                          <input type="text" name="signature_date" value="@if(isset($alldeclardatadata->signature_date))  {{ $alldeclardatadata->signature_date }} @endif" onblur="saveDeclaraton(this)" id="signature_date" class="form-control">
                          <input type="hidden" name="job_id" id="job_id" value="{{ $jobid }}">
                        </div>
                      </div>
                    </div>
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
    function saveDeclaraton(obj){

      if(obj.id == 'best_my_knowledge'){
          var best_my_knowledge = obj.value;
      } 
      if(obj.id == 'i_am_not_disqualified'){
          var i_am_not_disqualified = obj.value;
      } 
      if(obj.id == 'providing_false_information'){
          var providing_false_information = obj.value;
      } 
      if(obj.id == 'recruitment_and_selection_process'){
          var recruitment_and_selection_process = obj.value;
      } 
       if(obj.id == 'reason_for_leaving_that_position'){
          var reason_for_leaving_that_position = obj.value;
      } 
      if(obj.id == 'verify_the_reference'){
          var verify_the_reference = obj.value;
      } 
       var signature = $('#signature').val();
       var signature_date = $('#signature_date').val();
       var job_id = $('#job_id').val();
        $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('savedeclaration') }}",
        data: {best_my_knowledge:best_my_knowledge,i_am_not_disqualified:i_am_not_disqualified,providing_false_information:providing_false_information, reason_for_leaving_that_position:reason_for_leaving_that_position, recruitment_and_selection_process:recruitment_and_selection_process, verify_the_reference:verify_the_reference, job_id:job_id,signature:signature,signature_date:signature_date},
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