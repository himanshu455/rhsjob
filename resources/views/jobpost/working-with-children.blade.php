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
         <h3 class="box-title">WORKING WITH CHILDREN &/OR VULNERABLE ADULTS</h3>
         <p>Please give a contact name and telephone number for all organisations, not listed above, that you have worked for which
involved working with children and / or vulnerable adults.</p>

      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" name="form1" method="post" action=" {{ route('saveworkingwithchild') }}">
         {{ csrf_field() }}
          @if(!$workingwith)
                            <input type="hidden" name="del1" id="del1"  value="field0">
                            @else
                             <input type="hidden" name="del1" id="del1"  value="field{{ ($workingwith-1) }}">
                            @endif
         <div class="form-group">
            <div class="col-md-12" >
            @if($allworkingdata)
                  <div id="field">
                  <div id="field{{ ($workingwith-1) }}">
              
                     @foreach($allworkingdata as $val)
                      <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Name of organisation:</label>
                        <div class="col-sm-6">
                           <input type="text" name="name_of_organisation[]" id="{{ $val->field }}" onblur="saveworkingch(this)" value="@if(isset($val->name_of_organisation)) {{ $val->name_of_organisation }} @endif"  class="form-control name_of_organisation">
                           <input type="hidden" name="job_id" value="{{ $jobid }}" id="job_id">
                           <input type="hidden" value="{{ $val->field }}" name="{{ $val->field }}" id="{{ $val->field }}" onblur="saveempdata(this)">
                          
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Postcode:</label>
                              <div class="col-sm-6">
                                 <input type="text" name="postcode[]" id="{{ $val->field }}" value="@if(isset($val->postcode)){{ $val->postcode }} @endif" onblur="saveworkingch(this)" id="postcode" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Contact Name:</label>
                              <div class="col-sm-6">
                                 <input type="text" name="contact_name[]" id="{{ $val->field }}" value="@if(isset($val->contact_name)){{ $val->contact_name }} @endif" onblur="saveworkingch(this)" id="contact_name" class="form-control">
                              </div>
                           </div>
                        </div>
                     </div>
                      <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Position:</label>
                              <div class="col-sm-6">
                                 <input type="text" name="position[]" id="{{ $val->field }}" value="@if(isset($val->position)){{ $val->position }} @endif" onblur="saveworkingch(this)" id="position" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Contact telephone number:</label>
                              <div class="col-sm-6">
                                 <input type="text" name="contact_tel_no[]" id="{{ $val->field }}" value="@if(isset($val->contact_tel_no)){{ $val->contact_tel_no }} @endif" onblur="saveworkingch(this)" id="contact_tel_no" class="form-control">
                              </div>
                           </div>
                        </div>
                     </div>
                     
                    @endforeach
                    </div>
                     </div>
                    @else 
                     <div id="field">
                    <div id="field0">
                     <!-- Text input-->
                      <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Name of organisation:</label>
                        <div class="col-sm-6">
                           <input type="text" name="name_of_organisation[]" onblur="saveworkingch(this)" value=""  class="form-control name_of_organisation">
                           <input type="hidden" name="job_id" value="{{ $jobid }}" id="job_id">
                           
                          
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Postcode:</label>
                              <div class="col-sm-6">
                                 <input type="text" name="postcode[]" value="" onblur="saveworkingch(this)" id="postcode" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Contact Name:</label>
                              <div class="col-sm-6">
                                 <input type="text" name="contact_name[]" value="" onblur="saveworkingch(this)" id="contact_name" class="form-control">
                              </div>
                           </div>
                        </div>
                     </div>
                      <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Position:</label>
                              <div class="col-sm-6">
                                 <input type="text" name="position[]" value="" onblur="saveworkingch(this)" id="position" class="form-control">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="" class="col-sm-6 control-label">Contact telephone number:</label>
                              <div class="col-sm-6">
                                 <input type="text" name="contact_tel_no[]" value="" onblur="saveworkingch(this)" id="contact_tel_no" class="form-control">
                              </div>
                           </div>
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
          @if($workingwith)
            var next = {{ $workingwith }}
            @else
             var next = 0;
            @endif
          $("#add-more").click(function(e){
           e.preventDefault();
           @if($workingwith)
            var addto = "#field" + (next-1);
           var addRemove = "#field" + (next-1);
           @else
            var addto = "#field" + next;
           var addRemove = "#field" + next;
           @endif
          
           @if($workingwith)
           next = {{ $workingwith }};
           @else
           next = next + 1;
           @endif
             
           
           var el = document.getElementById('del1');
           el.value = "field"+next;
           var newIn = ' <div id="field'+ next +'" name="field'+ next +'"> <div class="form-group"> <label for="" class="col-sm-2 control-label">Name of organisation:</label><div class="col-sm-6"><input type="text" name="name_of_organisation[]" onblur="saveworkingch(this)"  class="form-control name_of_organisation"> </div> </div> <div class="row"> <div class="col-md-4"><div class="form-group"> <label for="" class="col-sm-6 control-label">Postcode:</label> <div class="col-sm-6"><input type="text" name="postcode[]" onblur="saveworkingch(this)" id="postcode" class="form-control"> </div>  </div></div> <div class="col-md-4"> <div class="form-group"><label for="" class="col-sm-6 control-label">Contact Name:</label><div class="col-sm-6"> <input type="text" name="contact_name[]" onblur="saveworkingch(this)" id="contact_name" class="form-control"> </div> </div> </div> </div><div class="row"> <div class="col-md-4"><div class="form-group"> <label for="" class="col-sm-6 control-label">Position:</label> <div class="col-sm-6"> <input type="text" name="position[]" onblur="saveworkingch(this)" id="position" class="form-control"> </div>  </div></div> <div class="col-md-4"> <div class="form-group"><label for="" class="col-sm-6 control-label">Contact telephone number:</label><div class="col-sm-6"> <input type="text" name="contact_tel_no[]" onblur="saveworkingch(this)" id="contact_tel_no" class="form-control"> </div> </div> </div> </div> </div> </div></div>';
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
</script>
 <script>
    function saveworkingch(obj) {

        if(obj.name=='name_of_organisation[]'){
          var name_of_organisation = obj.value;
          
        }else{
            var name_of_organisation = '';
        }
     
      if(obj.name=='postcode[]'){
       var postcode = obj.value;
      }else {
         var postcode = '';
      }
      if(obj.name == 'contact_name[]') {
         var contact_name = obj.value;
         
      }else {
         var contact_name = '';
      }

      if(obj.name =='position[]') {
          var position = obj.value;
      }else{
         var position = '';
      }
      if(obj.name=='contact_tel_no[]'){
         var contact_tel_no = obj.value;

      }else {
         var contact_tel_no = '';
      }
       var job_id = $('#job_id').val();
       var field = $("input[name='del1']").val();
       var updatefield = obj.id;


       
        
        $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('saveworkingwithchild') }}",
        data: {name_of_organisation:name_of_organisation,postcode:postcode,contact_name:contact_name,position:position,contact_tel_no:contact_tel_no,job_id:job_id,field:field,updatefield:updatefield},
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