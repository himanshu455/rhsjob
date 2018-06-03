
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
         <h3 class="box-title">EMPLOYMENT HISTORY</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" name="form1" method="post" action="{{ route('emphistory') }}">
              {{ csrf_field() }}
         <div class="box-body">
            <div class="form-group">
               <label for="" class="col-sm-4 control-label">Name of current/most recent employer</label>
               <div class="col-sm-8">
              <input type="text" name="current_employer_name" onblur="saveempdata(this)" value="@if(isset($empdata->current_employer_name)){{ $empdata->current_employer_name }} @endif" id="current_employer_name" class="form-control">
                  <input type="hidden" name="job_id" value="{{ $jobid }}" id="job_id">
               </div>
            </div>
            <div class="form-group">
               <label for="" class="col-sm-2 control-label">Address <span class="text-red">*</span></label>
               <div class="col-sm-10">
                  <textarea name="address" onblur="saveempdata(this)" id="address" class="form-control" rows="4">@if(isset($empdata->address)){{ $empdata->address }} @endif</textarea>
                   @if($errors->has('address'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('address') }}
                                   </span>
                                   @endif
               </div>
            </div>
            <div class="form-group">
               <label for="" class="col-sm-2 control-label">Postcode <span class="text-red">*</span></label>
               <div class="col-sm-4">
                  <input type="text" name="postcode" onblur="saveempdata(this)" id="postcode" value="@if(isset($empdata->postcode)){{ $empdata->postcode }} @endif" class="form-control">
                   @if($errors->has('postcode'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('postcode') }}
                                   </span>
                                   @endif
               </div>
            </div>
            <div class="form-group">
               <label for="" class="col-sm-2 control-label">Job title <span class="text-red">*</span></label>
               <div class="col-sm-10">
                  <input type="text" name="job_title" value="@if(isset($empdata->job_title)) {{ $empdata->job_title }} @endif" onblur="saveempdata(this)" id="job_title" class="form-control">
                  @if($errors->has('job_title'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('job_title') }}
                                   </span>
                                   @endif
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="" class="col-sm-6 control-label">Salary <span class="text-red">*</span></label>
                     <div class="col-sm-6">
                        <input type="text" name="salary" onblur="saveempdata(this)" id="salary" value="@if(isset($empdata->salary)){{ $empdata->salary }} @endif" class="form-control">
                         @if($errors->has('salary'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('salary') }}
                                   </span>
                                   @endif
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="" class="col-sm-6 control-label">Date started <span class="text-red">*</span></label>
                     <div class="col-sm-6">
                        <input type="text" name="date_started" onblur="saveempdata(this)" id="date_started" value="@if(isset($empdata->date_started)){{ $empdata->date_started }} @endif" class="form-control">
                         @if($errors->has('date_started'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('date_started') }}
                                   </span>
                                   @endif
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <label for="" class="col-sm-6 control-label">Date left:
                     (if appropriate)</label>
                     <div class="col-sm-6">
                        <input type="text" name="date_left" onblur="saveempdata(this)" id="date_left" value="@if(isset($empdata->date_left)){{ $empdata->date_left }} @endif" class="form-control">
                         @if($errors->has('date_left'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('date_left') }}
                                   </span>
                                   @endif
                     </div>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <label for="" class="col-sm-2 control-label">Please give details of emploee benefits:  </label>
               <div class="col-sm-10">
                  <textarea name="employee_benefit" onblur="saveempdata(this)" id="employee_benefit" class="form-control" rows="4">@if(isset($empdata->employee_benefit)){{ $empdata->employee_benefit }} @endif</textarea>
               </div>
            </div>
            <div class="form-group">
               <label for="" class="col-sm-2 control-label">Brief description of duties and responsibilities: </label>
               <div class="col-sm-10">
                 <textarea name="duty_description" onblur="saveempdata(this)" id="duty_description" class="form-control" rows="4">@if(isset($empdata->duty_description)){{ $empdata->duty_description }} @endif</textarea>
               </div>
            </div>
            <div class="form-group">
               <label for="" class="col-sm-2 control-label">Notice period <span class="text-red">*</span></label>
               <div class="col-sm-2">
                  <input type="text" name="notice_period" onblur="saveempdata(this)" id="notice_period" value="@if(isset($empdata->notice_period)){{ $empdata->notice_period }} @endif" class="form-control">
               </div>
            </div>
         </div>
         <div class="box-header with-border">
            <h3 class="box-title">PREVIOUS EMPLOYMENT</h3>
            <p> Begin with your most recent employment: </p>
         </div>
          <?php
           
          ?>
         <div class="form-group">
            <div class="col-md-12" >
              @if($prevempdataall)
                <div id="field">
              <div id="field{{ ($prevempdatacount-1) }}">
              @foreach($prevempdataall as $val)
                     <!-- Text input-->
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Date started</label>
                              <div class="col-sm-6">
                                 <input type="text" name="previous_date_started[]" onblur="saveempdata(this)" value="{{ $val->previous_date_started }}" id="{{ $val->field }}" class="form-control datepicker">
                                <input type="hidden" value="{{ $val->field }}" name="{{ $val->field }}" id="{{ $val->field }}" onblur="saveempdata(this)">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Date left</label>
                              <div class="col-sm-6">
                <input type="text" name="previous_date_left[]" value="{{ $val->previous_date_left }}" onblur="saveempdata(this)" id="{{ $val->field }}" class="form-control datepickerleft">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Name of employer </label>
                        <div class="col-sm-6">
                           <input type="text" name="name_of_employer[]" value="{{ $val->name_of_employer }}" onblur="saveempdata(this)" id="{{ $val->field }}" class="form-control">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Address </label>
                        <div class="col-sm-6">
                           <textarea name="previous_address[]" onblur="saveempdata(this)" id="{{ $val->field }}" class="form-control" rows="4">{{ $val->previous_address }}</textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Reason for leaving</label>
                        <div class="col-sm-6">
                           <textarea name="reason_for_leaving[]" onblur="saveempdata(this)" id="{{ $val->field }}" class="form-control" rows="4">{{ $val->reason_for_leaving }}</textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Position held and main duties</label>
                        <div class="col-sm-6">
                           <textarea name="main_duty[]" onblur="saveempdata(this)" id="{{ $val->field }}" class="form-control" rows="8">{{ $val->main_duty }}</textarea>
                            <input type="hidden" name="del1" id="del1"  value="field0">
                           
                        </div>
                        
                     </div>
               @endforeach
              
               <!-- File Button --> 
                  </div>
               </div>
               @else
                 <div id="field">
                  <div id="field0">
                     <!-- Text input-->
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Date started</label>
                              <div class="col-sm-6">
                                 <input type="text" name="previous_date_started[]" onblur="saveempdata(this)" id="previous_date_started" class="form-control datepicker">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Date left</label>
                              <div class="col-sm-6">
                                 <input type="text" name="previous_date_left[]" onblur="saveempdata(this)" id="previous_date_left" class="form-control datepickerleft">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Name of employer </label>
                        <div class="col-sm-6">
                           <input type="text" name="name_of_employer[]" onblur="saveempdata(this)" id="name_of_employer" class="form-control">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Address </label>
                        <div class="col-sm-6">
                           <textarea name="previous_address[]" onblur="saveempdata(this)" id="previous_address" class="form-control" rows="4"></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Reason for leaving</label>
                        <div class="col-sm-6">
                           <textarea name="reason_for_leaving[]" onblur="saveempdata(this)" id="reason_for_leaving" class="form-control" rows="4"></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Position held and main duties</label>
                        <div class="col-sm-6">
                           <textarea name="main_duty[]" onblur="saveempdata(this)" id="main_duty" class="form-control" rows="8"></textarea>
                            <input type="hidden" name="del1" id="del1"  value="field0">
                        </div>
                     </div>
                     <!-- File Button --> 
                  </div>
               </div>
               @endif

               <!-- Button -->
                <div class="form-group">
                  <div class="col-md-4">
                       <label for="" class="col-sm-6 control-label"> </label>
                       <div class="col-sm-6">
                        <button id="add-more" name="add-more" class="btn btn-primary">ADD NEW EMPLOYMENT </button>
                     </div>
                  </div>
               </div>
               <br><br>
               <div class="form-group">
                  <label for="" class="col-sm-2 control-label">If there are any gaps in your employment history, such as a career break, please provide full details of the dates and what you
                  were doing</label>
                  <div class="col-sm-10">
                     <textarea name="employment_gap_details" onblur="saveempdata(this)" id="employment_gap_details" class="form-control" rows="4">@if(isset($empdata->employment_gap_details))  {{ $empdata->employment_gap_details }} @endif</textarea>
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
   $(document).ready(function () {
      @if($prevempdatacount)
            var next = {{ $prevempdatacount }}
            @else
             var next = 0;
            @endif
          $("#add-more").click(function(e){
           e.preventDefault();
           @if($prevempdatacount)
            var addto = "#field" + (next-1);
           var addRemove = "#field" + (next-1);
           @else
            var addto = "#field" + next;
           var addRemove = "#field" + next;
           @endif
          
           @if($prevempdatacount)
           next = {{ $prevempdatacount }};
           @else
           next = next + 1;
           @endif
            var el = document.getElementById('del1');
           el.value = "field"+next;
           var newIn = ' <div id="field'+ next +'" name="field'+ next +'"><!-- Text input--> <div class="row"><div class="col-md-4"><div class="form-group"><label for="" class="col-sm-6 control-label">Date started</label><div class="col-sm-6"> <input type="text" name="previous_date_started[]" onblur="saveempdata(this)" id="previous_date_started" class="form-control datepicker"> </div></div></div><div class="col-md-4"><div class="form-group"><label for="" class="col-sm-6 control-label">Date left</label><div class="col-sm-6"> <input type="text" name="previous_date_left[]" id="previous_date_left" onblur="saveempdata(this)" class="form-control datepickerleft"> </div>  </div></div></div><div class="form-group"> <label for="" class="col-sm-2 control-label">Name of employer </label><div class="col-sm-6"> <input type="text" name="name_of_employer[]" onblur="saveempdata(this)" id="name_of_employer" class="form-control">  </div> </div><div class="form-group"> <label for="" class="col-sm-2 control-label">Address </label><div class="col-sm-6">  <textarea name="previous_address[]" id="previous_address" onblur="saveempdata(this)" class="form-control" rows="4"></textarea> </div></div><div class="form-group"> <label for="" class="col-sm-2 control-label">Reason for leaving</label>  <div class="col-sm-6"><textarea name="reason_for_leaving[]" onblur="saveempdata(this)" id="reason_for_leaving" class="form-control" rows="4"></textarea>  </div> </div> <div class="form-group"><label for="" class="col-sm-2 control-label">Position held and main duties</label><div class="col-sm-6"> <textarea name="main_duty[]" onblur="saveempdata(this)" id="main_duty" class="form-control" rows="8"></textarea>  </div></div> </div></div>';
                   
           var newInput = $(newIn);
           var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div><div id="field">';
           var removeButton = $(removeBtn);
           $(addto).after(newInput);
           $(addRemove).after(removeButton);
           $("#field" + next).attr('data-source',$(addto).attr('data-source'));
           $("#count").val(next);  
           
               $('.remove-me').click(function(e){
                   e.preventDefault();
                   var fieldNum = this.id.charAt(this.id.length-1);

                   var fieldID = "#field" + fieldNum;
                 
                   $(this).remove();
                   $(fieldID).remove();
                   location.reload();
               });
       });
   
   });
</script>
 <script>
    function saveempdata(obj) {
     var current_employer_name =   $('#current_employer_name').val();
     var address =   $('#address').val();
     var postcode =   $('#postcode').val();
     var job_title =   $('#job_title').val();
     var salary =    $('#salary').val();
     var date_started =   $('#date_started').val();
     var date_left =   $('#date_left').val();
     var employee_benefit =   $('#employee_benefit').val();
     var duty_description =   $('#duty_description').val();
     var notice_period =   $('#notice_period').val();
      var job_id =   $('#job_id').val();
     if(obj.name=='previous_date_started[]'){
          var previous_date_started = obj.value;

        }else{
            var previous_date_started = '';
        }
      if(obj.name=='previous_date_left[]'){
          var previous_date_left = obj.value;
          
        }else{
            var previous_date_left = '';
        }

        if(obj.name=='name_of_employer[]'){
          var name_of_employer = obj.value;
          
        }else{
            var name_of_employer = '';
        }
         if(obj.name=='previous_address[]'){
          var previous_address = obj.value;
        }else{
            var previous_address = '';
        } 

        if(obj.name=='reason_for_leaving[]'){
          var reason_for_leaving = obj.value;
        }else{
            var reason_for_leaving = '';
        }
        if(obj.name=='main_duty[]'){
          var main_duty = obj.value;
        }else{
            var main_duty = '';
        } 
        var employment_gap_details =   $('#employment_gap_details').val();
         var field = $("input[name='del1']").val();
         var updatefield = obj.id;
         $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('emphistory') }}",
        data: {current_employer_name:current_employer_name,address:address,postcode:postcode,job_title:job_title,salary:salary,date_started:date_started,date_left:date_left,employee_benefit:employee_benefit,duty_description:duty_description,notice_period:notice_period,job_id:job_id,previous_date_started:previous_date_started,previous_date_left:previous_date_left,name_of_employer:name_of_employer,previous_address:previous_address,reason_for_leaving:reason_for_leaving,main_duty:main_duty,employment_gap_details:employment_gap_details,updatefield:updatefield,field:field},
        beforeSend: function(){
          
        },
        success: function(data) {
            // $('.main-pro-bg').html(data);
            //console.log(data);
        }
    });

       
    }

  $(function() {
$( "#date_started" ).datepicker();
$( "#date_left" ).datepicker();
});

$('body').on('focus',".datepicker", function(){
    $(this).datepicker();
});
$('body').on('focus',".datepickerleft", function(){
    $(this).datepicker();
});

 </script>



@endsection