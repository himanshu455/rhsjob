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
         <h3 class="box-title">DOCUMENT UPLOADS</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
       @if(session('status'))
            <div class="alert alert-{{ session('class') }}">{{ session('status') }}</div>
            @endif
      <form class="form-horizontal" name="form" action="{{ route('savedocuments') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
         <input type="hidden" name="job_id" id="job_id" value="{{ $jobid }}">
         <div class="form-group">
            <div class="col-md-12" >
               <div id="field">
                  <div id="field0">
                     <!-- Text input-->
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="" class="col-sm-2 control-label">Document Upload</label>
                              <div class="col-sm-8">
                                 <input class="form-control" type="file" name="documents[]"  id="documents" class="form-control">
                                  @if($errors->has('documents.*'))
                                    <span class="help-block text-red">
                                    {{ $errors->first('documents.*') }}
                                    </span>
                                    @endif 

                                     @foreach($alldocumentdatadata as $val)
                                             @if($val->documents)
                                            <a href="{{ url('/') }}/{{ $val->documents }} " target="_blanck">  {!! Html::image('pdf.png',null,['width' => '50', 'height' => '50']) !!}  <a href="{{ route('delete',['id'=>$val->id ]) }}" data-method="delete" button type="button" class="btn btn-danger btn-xs delete-user" name="delete"><i class="fa fa-times"></i> Delete</button></a>
                                             @endif
                                            </br> </br>  
                                    @endforeach

                              </div>
                           </div>
                        </div>
                     </div>                    
               </div>
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
       //@naresh action dynamic childs
       var next = 0;
       $("#add-more").click(function(e){
           e.preventDefault();
           var addto = "#field" + next;
           var addRemove = "#field" + (next);
           next = next + 1;
           var newIn = ' <div id="field'+ next +'" name="field'+ next +'"><!-- Text input--> <div class="row"><div class="col-md-12"><div class="form-group"><label for="" class="col-sm-2 control-label">Date started</label><div class="col-sm-8"> <input type="file" name="documents[]" onblur="saveempdata()" id="documents" class="form-control"> </div></div></div>  </div></div>';
                   
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
    function savedocumentdata() {
     $('input[name^="documents"]').each(function() {
         var documents =$(this).val();
         alert(documents);

     });

       

    }

 </script>
@endsection