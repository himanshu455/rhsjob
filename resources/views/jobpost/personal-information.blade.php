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
             <h3 class="box-title">Personal Information</h3>
          </div>
            <!-- /.box-header -->
            <!-- form start -->
          <form class="form-horizontal" action="{{ route('savepersonalinformation') }}" method="post">
           {{ csrf_field() }}
            <div class="box-body">
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">Post applied for</label>

                <div class="col-sm-10">
                  <input type="text" name="" value="{{ $jobname->job_title }}" readonly="" class="form-control">
                  <input type="hidden" name="job_id" id="job_id" value="{{ $id }}">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Title <span class="text-red">*</label>
                    <div class="col-sm-8">
                      <input type="text" name="title"  value = "@if(isset($perdata->title)){{ $perdata->title }}@endif" id="title" onblur="saveData(this)" class="form-control">
                       @if($errors->has('title'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('title') }}
                                   </span>
                                   @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Forename <span class="text-red">*</label>
                    <div class="col-sm-8">
                      <input type="text" name="fore_name" value="@if(isset($perdata->fore_name)){{ $perdata->fore_name }} @endif " id="fore_name" onblur="saveData(this)" class="form-control">
                      @if($errors->has('fore_name'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('fore_name') }}
                                   </span>
                                   @endif
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Middlename</label>
                    <div class="col-sm-8">
                    <input type="text" value="@if(isset($perdata->middle_name)){{ $perdata->middle_name }} @endif" name="middle_name" id="middle_name" onblur="saveData(this)" class="form-control">
                    </div>
                  </div> 
                   <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Surname <span class="text-red">*</label>
                    <div class="col-sm-8">
                   <input type="text" name="sur_name" value = "@if(isset($perdata->sur_name)){{ $perdata->sur_name }} @endif "  id="sur_name" onblur="saveData(this)" class="form-control">
                      @if($errors->has('sur_name'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('sur_name') }}
                                   </span>
                                   @endif
                    </div>
                  </div> 
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Any formers name(s) <span class="text-red">*</span></label>
                    <div class="col-sm-8">
                    <textarea name="any_former_name"  id="any_former_name" onblur="saveData(this)" class="form-control" rows="4"> @if(isset($perdata->any_former_name)){{ $perdata->any_former_name }} @endif </textarea>
                       @if($errors->has('any_former_name'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('any_former_name') }}
                                   </span>
                                   @endif
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Current address <span class="text-red">*</label>
                    <div class="col-sm-8">
                  <textarea name="current_address" id="current_address" onblur="saveData(this)" class="form-control" rows="4">@if(isset($perdata->current_address)){{ $perdata->current_address }} @endif</textarea>
                      @if($errors->has('current_address'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('current_address') }}
                                   </span>
                                   @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Postcode</label>
                    <div class="col-sm-4">
                  <input type="text" name="post_code" value = "@if(isset($perdata->post_code)){{ $perdata->post_code }} @endif " id="post_code" onblur="saveData(this)" class="form-control">
                    </div>
                  </div>  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Contact telephone number(s) <span class="text-red">*</label>
                    <div class="col-sm-8">
                   <textarea name="contact_tel_num" id="contact_tel_num" onblur="saveData(this)" class="form-control" rows="4">@if(isset($perdata->contact_tel_num)){{ $perdata->contact_tel_num }} @endif</textarea>
                      @if($errors->has('contact_tel_num'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('contact_tel_num') }}
                                   </span>
                                   @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Email <span class="text-red">*</label>
                    <div class="col-sm-8">
                  <input type="text" name="email" value = "@if(isset($perdata->email)){{ $perdata->email }} @endif " id="email" onblur="saveData(this)" class="form-control">
                      @if($errors->has('email'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('email') }}
                                   </span>
                                   @endif
                    </div>
                  </div>                  
                   <div class="form-group">
                    <label for="" class="col-sm-4 control-label">National Insurance Number</label>
                    <div class="col-sm-8">
          <input type="text" name="national_insurance_number" onblur="saveData(this)" id="national_insurance_number" value = "@if(isset($perdata->national_insurance_number)){{ $perdata->national_insurance_number }} @endif " class="form-control">
                    </div>
                  </div>  
                  <div class="form-group">
                    <label for="" class="col-sm-8 control-label">Do you have the right to take up employment in the UK? </label>

                    <div class="col-sm-4">
                      <select class="form-control" name="employment_uk" required="" onblur="saveData(this)" id="employment_uk">
                      <option value="">Please Select</option>
                        <option value="yes" {{ isset($perdata->employment_uk) && $perdata->employment_uk == 'yes' ? 'selected' : '' }} >Yes</option>
                        <option value="no" {{ isset($perdata->employment_uk) && $perdata->employment_uk == 'no' ? 'selected' : '' }} >No</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-8 control-label">Are you related to, or o you maintain a close relationship with, an exisiting employee, volunterr, governor or </label>
                    <div class="col-sm-4">
                      <select class="form-control" required="" onblur="saveData(this)" name="org_relationship" id="org_relationship">
                       <option value="">Please Select</option>
                        <option value="yes" {{ isset($perdata->org_relationship) && $perdata->org_relationship =='yes' ? 'selected' : ''}} >Yes</option>
                        <option value="no" {{ isset($perdata->org_relationship) && $perdata->org_relationship == 'no' ? 'selected' : '' }} >No</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">If yes, please provide details</label>
                    <div class="col-sm-8">
          <textarea name="org_relationship_detail" id="org_relationship_detail" onblur="saveData(this)"  class="form-control" rows="4">@if(isset($perdata->org_relationship_detail)){{ $perdata->org_relationship_detail }} @endif </textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-8 control-label">Teacher reference number (TRN) or Department for Education number:</label>
                    <div class="col-sm-4">
                <input type="text" name="trn_no" value = "@if(isset($perdata->trn_no)){{ $perdata->trn_no }} @endif "  id="trn_no" onblur="saveData(this)" class="form-control">
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
<script type="text/javascript">
  function saveData(obj){
     var title = $('#title').val();
     var jobid = $('#job_id').val();
     var fore_name = $('#fore_name').val();
     var middle_name = $('#middle_name').val();
     var sur_name = $('#sur_name').val();
     var any_former_name = $('#any_former_name').val();
     var current_address = $('#current_address').val();
     var post_code = $('#post_code').val();
     var contact_tel_num = $('#contact_tel_num').val();
     var email = $('#email').val();
     var national_insurance_number = $('#national_insurance_number').val();
      if(obj.id == 'employment_uk'){
          var emp_uk = obj.value;
      } else if(obj.id == 'org_relationship'){
         var orgrel = obj.value;
      }
     var org_relationship_detail = $('#org_relationship_detail').val();
     var trn_no = $('#trn_no').val();

       $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('savepersonalinformation') }}",
        data: {title:title,jobid:jobid,fore_name:fore_name,middle_name:middle_name,sur_name:sur_name,any_former_name:any_former_name,current_address:current_address,post_code:post_code,contact_tel_num:contact_tel_num,email:email,national_insurance_number:national_insurance_number,emp_uk:emp_uk,orgrel:orgrel,org_relationship_detail:org_relationship_detail,trn_no:trn_no},
        beforeSend: function(){
          console.log(title,jobid);
        },
        success: function(data) {
            // $('.main-pro-bg').html(data);
            console.log(data);
        }
    });
 }
</script>
@endsection