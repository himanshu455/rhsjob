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
         <h3 class="box-title">EDUCATION, QUALIFICATION & SKILLS</h3>
         <p>Please include Secondary, Further and Higher Qualifications, including professional teaching qualifications (most recent first)
- include GCSEs / O Levels and A Levels.</p>

      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" name="form1" method="post" action="{{ route("saveeducationdetails") }}">
       {{ csrf_field() }}
         <div class="form-group">
            <div class="col-md-12" >
                @if($secondaryalldata)
               <div id="field">
                  <div id="field{{ ($secondarydata-1) }}">
                     <!-- Text input-->
                     @foreach($secondaryalldata as $val)
                      <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Name of School or College:</label>
                        <div class="col-sm-6">
                           <input type="text" name="name_of_college[]" value="{{ $val->name_of_college }}" onblur="saveEducationDetail(this)" id="{{ $val->field }}" class="form-control">
                         <input type="hidden" name="job_id" id="job_id" value="{{ $jobid }}">  
                         <input type="hidden" value="{{ $val->field }}" name="{{ $val->field }}" id="{{ $val->field }}" onblur="saveEducationDetail(this)">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Date from:</label>
                              <div class="col-sm-6">
                                 <input type="text" name="pri_date_from[]" value="{{ $val->pri_date_from }}" onblur="saveEducationDetail(this)" id="{{ $val->field }}" class="form-control pridatefrom">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Date to:</label>
                              <div class="col-sm-6">
                                 <input type="text" name="pri_date_to[]" value="{{ $val->pri_date_to }}" onblur="saveEducationDetail(this)" id="{{ $val->field }}" class="form-control pridateto">
                              </div>
                           </div>
                        </div>
                     </div>
                      <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Examinations passed/Qualifications obtained:</label>
                        <div class="col-sm-6">
                           <textarea name="pri_exam_pass_quali[]" onblur="saveEducationDetail(this)" id="{{ $val->field }}" class="form-control" rows="6">{{ $val->pri_exam_pass_quali }}</textarea>
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
                      <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Name of School or College:</label>
                        <div class="col-sm-6">
                           <input type="text" name="name_of_college[]" onblur="saveEducationDetail(this)" id="name_of_college" class="form-control">
                         <input type="hidden" name="job_id" id="job_id" value="{{ $jobid }}">  
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Date from:</label>
                              <div class="col-sm-6">
                                 <input type="text" name="pri_date_from[]" onblur="saveEducationDetail(this)" id="pri_date_from" class="form-control pridatefrom">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Date to:</label>
                              <div class="col-sm-6">
                                 <input type="text" name="pri_date_to[]" onblur="saveEducationDetail(this)" id="pri_date_to" class="form-control pridateto">
                              </div>
                           </div>
                        </div>
                     </div>
                      <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Examinations passed/Qualifications obtained:</label>
                        <div class="col-sm-6">
                           <textarea name="pri_exam_pass_quali[]" onblur="saveEducationDetail(this)" id="pri_exam_pass_quali" class="form-control" rows="6"></textarea>
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
                        <button id="add-more" name="add-more" class="btn btn-primary">ADD NEW </button>
                     </div>
                  </div>
               </div>
               <br><br>
                <div class="box-header with-border">
         <p>FOR TEACHING POSTS</p>

      </div>
               <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Do you have qualified teacher status?</label>
                    <div class="col-sm-2">
                      <select class="form-control" required="" name="qualified_teacher_status" id="qualified_teacher_status" onblur="saveEducationDetail(this)">
                       <option value="">Please Select</option>>
                        <option value="yes" {{ isset($edudata->qualified_teacher_status) && $edudata->qualified_teacher_status =='yes' ? 'selected' : ''}}>Yes</option>
                        <option value="no" {{ isset($edudata->qualified_teacher_status) && $edudata->qualified_teacher_status =='no' ? 'selected' : ''}}>No</option> 
                      </select>
                    </div>
                  </div>
                   <div class="box-header with-border">
         <h3 class="box-title">CONINUTING PROFESSIONAL DEVELOPMENT UNDERTAKEN</h3>
         <p>WITHIN THE LAST 5 YEARS</p>

      </div>      




                   @if($profdata)
                   
                     <!-- Text input-->
                     <div id="field1">
                     <div id="field{{ ($profdatacount-1) }}">
                     @foreach($profdata as $value)

                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Date from:</label>
                              <div class="col-sm-6">
                                 <input type="text" name="prof_date_from[]" value="{{ $value->prof_date_from }}" onblur="saveEducationDetail(this)" id="{{ $value->fieldnext }}" class="form-control profdatefrom">
                                 <input type="hidden" value="{{ $value->fieldnext }}" name="{{ $value->fieldnext }}" id="{{ $value->fieldnext }}" onblur="saveEducationDetail(this)">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Date to:</label>
                              <div class="col-sm-6">
                                 <input type="text" name="prof_date_to[]" value="{{ $value->prof_date_to }}" onblur="saveEducationDetail(this)" id="{{ $value->fieldnext }}" class="form-control profdateto">
                              </div>
                           </div>
                        </div>
                     </div>
                      <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Examinations passed/Qualifications obtained:</label>
                        <div class="col-sm-6">
                           <textarea name="prof_quali_obtained[]" onblur="saveEducationDetail(this)" id="{{ $value->fieldnext }}" class="form-control" rows="6">{{ $value->prof_quali_obtained }}</textarea>
                            <input type="hidden" name="fieldnext" id="fieldnext"  value="fieldnext0">
                        </div>
                     </div>
                     
                     @endforeach
                     </div>
               </div>

                     <!-- File Button --> 
                  
                @else
                 <div id="field">
                    <div id="fieldnext0">
                     <!-- Text input-->
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Date from:</label>
                              <div class="col-sm-6">
                                 <input type="text" name="prof_date_from[]"  onblur="saveEducationDetail(this)" id="prof_date_from" class="form-control profdatefrom">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Date to:</label>
                              <div class="col-sm-6">
                                 <input type="text" name="prof_date_to[]" onblur="saveEducationDetail(this)" id="prof_date_to" class="form-control profdateto">
                              </div>
                           </div>
                        </div>
                     </div>
                      <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Examinations passed/Qualifications obtained:</label>
                        <div class="col-sm-6">
                           <textarea name="prof_quali_obtained[]" onblur="saveEducationDetail(this)" id="prof_quali_obtained" class="form-control" rows="6"></textarea>
                            <input type="hidden" name="fieldnext" id="fieldnext"  value="fieldnext0">
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
                        <button id="add-more-next" name="add-more" class="btn btn-primary">ADD NEW </button>
                     </div>
                  </div>
               </div>
               <br><br>
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
        @if($secondarydata)
            var next = {{ $secondarydata }}
            @else
             var next = 0;
            @endif
          $("#add-more").click(function(e){
           e.preventDefault();
           @if($secondarydata)
            var addto = "#field" + (next-1);
           var addRemove = "#field" + (next-1);
           @else
            var addto = "#field" + next;
           var addRemove = "#field" + next;
           @endif
          
           @if($secondarydata)
           next = {{ $secondarydata }};
           @else
           next = next + 1;
           @endif
            var el = document.getElementById('del1');
           el.value = "field"+next;
           var newIn = ' <div id="field'+ next +'" name="field'+ next +'"> <div class="form-group"><label for="" class="col-sm-2 control-label">Name of School or College:</label><div class="col-sm-6"><input type="text" name="name_of_college[]" onblur="saveEducationDetail(this)" id="name_of_college " class="form-control"> </div> </div><div class="row"> <div class="col-md-4"><div class="form-group"> <label for="" class="col-sm-6 control-label">Date from:</label><div class="col-sm-6"> <input type="text" name="pri_date_from[]" onblur="saveEducationDetail(this)" id="pri_date_from" class="form-control pridatefrom">  </div> </div> </div> <div class="col-md-4"><div class="form-group"> <label for="" class="col-sm-6 control-label">Date to:</label> <div class="col-sm-6"><input type="text" name="pri_date_to[]" onblur="saveEducationDetail(this)" id="pri_date_to" class="form-control pridateto"> </div></div></div> </div><div class="form-group"> <label for="" class="col-sm-2 control-label">Examinations passed/Qualifications obtained:</label><div class="col-sm-6"><textarea name="pri_exam_pass_quali[]"onblur="saveEducationDetail(this)" id="pri_exam_pass_quali" class="form-control" rows="6"></textarea> </div> </div></div> </div></div>';
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
               });
       });
   
   });

   //Next Repater
    $(document).ready(function () {
        @if($profdatacount)
            var next = {{ $profdatacount }}
            @else
             var next = 0;
            @endif
          $("#add-more-next").click(function(e){
           e.preventDefault();
           @if($profdatacount)
            var addto = "#field" + (next-1);
           var addRemove = "#field" + (next-1);
           @else
            var addto = "#field" + next;
           var addRemove = "#field" + next;
           @endif
          
           @if($profdatacount)
           next = {{ $profdatacount }};
           @else
           next = next + 1;
           @endif
            var el = document.getElementById('fieldnext');
           el.value = "field"+next;
           var newIn = ' <div id="fieldnext'+ next +'" name="field1'+ next +'"><div class="row"> <div class="col-md-4"><div class="form-group"> <label for="" class="col-sm-6 control-label">Date from:</label><div class="col-sm-6"> <input type="text" name="prof_date_from[]" onblur="saveEducationDetail(this)" id="prof_date_from" class="form-control profdatefrom">  </div> </div> </div> <div class="col-md-4"><div class="form-group"> <label for="" class="col-sm-6 control-label">Date to:</label> <div class="col-sm-6"><input type="text" name="prof_date_to[]" onblur="saveEducationDetail(this)" id="prof_date_to" class="form-control profdateto"> </div></div></div> </div><div class="form-group"> <label for="" class="col-sm-2 control-label">Examinations passed/Qualifications obtained:</label><div class="col-sm-6"><textarea name="prof_quali_obtained[]"onblur="saveEducationDetail(this)" id="prof_quali_obtained" class="form-control" rows="6"></textarea> </div> </div></div> </div></div>';
           var newInput = $(newIn);
           var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div><div id="field">';
           var removeButton = $(removeBtn);
           $(addto).after(newInput);
           $(addRemove).after(removeButton);
           $("#fieldnext" + next).attr('data-source',$(addto).attr('data-source'));
           $("#count").val(next);  
           
               $('.remove-me').click(function(e){
                   e.preventDefault();
                   var fieldNum = this.id.charAt(this.id.length-1);
                   var fieldID = "#fieldnext" + fieldNum;
                   $(this).remove();
                   $(fieldID).remove();
               });
       });
   
   });
</script>
 <script>
    function saveEducationDetail(obj) {
      if(obj.id == 'qualified_teacher_status'){
          var qualified_teacher_status = obj.value;

      }else{
          var qualified_teacher_status ='';
          
      } 
    if(obj.name=='name_of_college[]'){
          var name_of_college = obj.value;
        }else{
            var name_of_college = '';
        }
      if(obj.name=='pri_date_from[]'){
          var pri_date_from = obj.value;
        }else{
            var pri_date_from = '';
        }
        if(obj.name=='pri_date_to[]'){
          var pri_date_to = obj.value;
        }else{
            var pri_date_to = '';
        }
        if(obj.name=='pri_exam_pass_quali[]'){
          var pri_exam_pass_quali = obj.value;
        }else{
            var pri_exam_pass_quali = '';
        }
        if(obj.name=='prof_date_from[]'){
          var prof_date_from = obj.value;
        }else{
            var prof_date_from = '';
        }
        if(obj.name=='prof_date_to[]'){
          var prof_date_to = obj.value;
        }else{
            var prof_date_to = '';
        }
         if(obj.name=='prof_quali_obtained[]'){
          var prof_quali_obtained = obj.value;
        }else{
            var prof_quali_obtained = '';
        }
         var field = $("input[name='del1']").val();
         var fieldnext = $("input[name='fieldnext']").val();
         var job_id = $('#job_id').val();
         var updatefield = obj.id;
         var updatefieldnext = obj.id;
         $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('saveeducationdetails') }}",
        data: {qualified_teacher_status:qualified_teacher_status,name_of_college:name_of_college,pri_date_from:pri_date_from,pri_date_to:pri_date_to,pri_exam_pass_quali:pri_exam_pass_quali,prof_date_from:prof_date_from,prof_date_to:prof_date_to,prof_quali_obtained:prof_quali_obtained,field:field,fieldnext:fieldnext,job_id:job_id,updatefield:updatefield,updatefieldnext:updatefieldnext},
        beforeSend: function(){
          //console.log(ref_name,ref_position);
        },
        success: function(data) {
            // $('.main-pro-bg').html(data);
            //console.log(data);
        }
    });
     
    }
$('body').on('focus',".pridatefrom", function(){
    $(this).datepicker();
});
$('body').on('focus',".pridateto", function(){
    $(this).datepicker();
});

$('body').on('focus',".profdatefrom", function(){
    $(this).datepicker();
});
$('body').on('focus',".profdateto", function(){
    $(this).datepicker();
});
 </script>
@endsection