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
             <h3 class="box-title">REFERENCES</h3>
             <p>Please supply the names and contact details of two people whom we may contact for references. Your first referee must be your current or
most recent employer. If your current/most recent employment does/did not involve work with children and you have previously worked with
children, your second referee should be from the employer with whom you most recently worked with children. No referee should be a relative
or someone known to you solely as a friend.</p>
<p><b>Please note the School is required, in line with Keeping Children Safe In Education, to take up references from all shortlisted
candidates before interview.</b></p>
<h3 class="box-title">CURRENT/MOST RECENT EMPLOYER</h3>
          </div>
            <!-- /.box-header -->
            <!-- form start -->
          <form class="form-horizontal" name="form1" method="post" action= "{{ route('savereference')}}">
            {{ csrf_field()}}
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Name <span class="text-red">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" name="ref_name" id="ref_name"  onblur="saveReference()" value="@if(isset( $allrefdata->ref_name)){{ $allrefdata->ref_name }} @endif" class="form-control">
                        <input type="hidden" name="job_id" id="job_id" value="{{ $jobid }}"> 
                         @if($errors->has('ref_name'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('ref_name') }}
                                   </span>
                                   @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Position <span class="text-red">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" name="ref_position" value="@if(isset( $allrefdata->ref_position)) {{ $allrefdata->ref_position }} @endif" onblur="saveReference()" id="ref_position" class="form-control">
                       @if($errors->has('ref_position'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('ref_position') }}
                                   </span>
                                   @endif
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Organisation <span class="text-red">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" name="ref_organisation" onblur="saveReference()" id="ref_organisation" value="@if(isset( $allrefdata->ref_organisation)){{ $allrefdata->ref_organisation }} @endif" class="form-control">
                       @if($errors->has('ref_organisation'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('ref_organisation') }}
                                   </span>
                                   @endif
                    </div>
                  </div> 
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Address <span class="text-red">*</span></label>
                    <div class="col-sm-8">
                      <textarea name="ref_address" onblur="saveReference()" id="ref_address" class="form-control" rows="4">@if(isset( $allrefdata->ref_address)){{ $allrefdata->ref_address }} @endif</textarea>
                       @if($errors->has('ref_address'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('ref_address') }}
                                   </span>
                                   @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Postcode</label>
                    <div class="col-sm-4">
                      <input type="text" name="ref_postcode" value="@if(isset( $allrefdata->ref_postcode)){{ $allrefdata->ref_postcode }} @endif" onblur="saveReference()" id="ref_postcode" class="form-control">
                    </div>
                  </div>
                 
                 
                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Contact telephone number(s) <span class="text-red">*</span></label>
                    <div class="col-sm-8">
                      <textarea name="ref_phone_no" onblur="saveReference()" id="ref_phone_no" class="form-control" rows="4">@if(isset( $allrefdata->ref_phone_no)){{ $allrefdata->ref_phone_no }} @endif</textarea>
                       @if($errors->has('ref_phone_no'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('ref_phone_no') }}
                                   </span>
                                   @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Email <span class="text-red">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" name="ref_email" onblur="saveReference()" id="ref_email" value="@if(isset( $allrefdata->ref_email)){{ $allrefdata->ref_email }} @endif" class="form-control">
                      @if($errors->has('ref_email'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('ref_email') }}
                                   </span>
                                   @endif
                    </div>
                  </div>                  
                </div>
              </div> 
                           {{--new div  --}}
                           <h2 class="box-title">OTHER REFEREE</h2>
                           <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Name <span class="text-red">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" name="other_ref_name" id="other_ref_name"  onblur="saveReference()" value="@if(isset( $allrefdata->other_ref_name)){{ $allrefdata->other_ref_name }} @endif" class="form-control">
                        <input type="hidden" name="job_id" id="job_id" value="{{ $jobid }}"> 
                         @if($errors->has('other_ref_name'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('other_ref_name') }}
                                   </span>
                                   @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Position <span class="text-red">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" name="other_ref_position" value="@if(isset( $allrefdata->other_ref_position)) {{ $allrefdata->other_ref_position }} @endif" onblur="saveReference()" id="other_ref_position" class="form-control">
                       @if($errors->has('other_ref_position'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('other_ref_position') }}
                                   </span>
                                   @endif
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Organisation <span class="text-red">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" name="other_ref_organisation" onblur="saveReference()" id="other_ref_organisation" value="@if(isset( $allrefdata->other_ref_organisation)){{ $allrefdata->other_ref_organisation }} @endif" class="form-control">
                       @if($errors->has('other_ref_organisation'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('other_ref_organisation') }}
                                   </span>
                                   @endif
                    </div>
                  </div> 
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Address <span class="text-red">*</span></label>
                    <div class="col-sm-8">
                      <textarea name="other_ref_address" onblur="saveReference()" id="other_ref_address" class="form-control" rows="4">@if(isset( $allrefdata->ref_address)){{ $allrefdata->other_ref_address }} @endif</textarea>
                       @if($errors->has('other_ref_address'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('other_ref_address') }}
                                   </span>
                                   @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Postcode</label>
                    <div class="col-sm-4">
                      <input type="text" name="other_ref_postcode" value="@if(isset( $allrefdata->other_ref_postcode)){{ $allrefdata->other_ref_postcode }} @endif" onblur="saveReference()" id="other_ref_postcode" class="form-control">
                    </div>
                  </div>
                 
                 
                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Contact telephone number(s) <span class="text-red">*</span></label>
                    <div class="col-sm-8">
                      <textarea name="other_ref_phone_no" onblur="saveReference()" id="other_ref_phone_no" class="form-control" rows="4">@if(isset( $allrefdata->other_ref_phone_no)){{ $allrefdata->other_ref_phone_no }} @endif</textarea>
                       @if($errors->has('other_ref_phone_no'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('other_ref_phone_no') }}
                                   </span>
                                   @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="" class="col-sm-4 control-label">Email <span class="text-red">*</span></label>
                    <div class="col-sm-8">
                      <input type="text" name="other_ref_email" onblur="saveReference()" id="other_ref_email" value="@if(isset( $allrefdata->other_ref_email)){{ $allrefdata->other_ref_email }} @endif" class="form-control">
                      @if($errors->has('other_ref_email'))
                                   <span class="help-block text-red">
                                   {{ $errors->first('other_ref_email') }}
                                   </span>
                                   @endif
                    </div>
                  </div>                  
                </div>
              </div>
                           {{-- end --}}
             
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
    function saveReference(){
       var ref_name = $('#ref_name').val();
       var ref_position = $('#ref_position').val();
       var ref_organisation = $('#ref_organisation').val();
       var ref_address = $('#ref_address').val();
       var ref_postcode = $('#ref_postcode').val();
       var ref_phone_no = $('#ref_phone_no').val();
       var ref_email = $('#ref_email').val();
       var job_id = $('#job_id').val();
       
       var other_ref_name = $('#other_ref_name').val();
       var other_ref_phone_no = $('#other_ref_phone_no').val();
       var other_ref_position = $('#other_ref_position').val();
       var other_ref_organisation = $('#other_ref_organisation').val();
       var other_ref_address = $('#other_ref_address').val();
       var other_ref_email = $('#other_ref_email').val();
       var other_ref_postcode = $('#other_ref_postcode').val();

       $.ajax({
        type: "POST",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('savereference') }}",
        data: {ref_name:ref_name,ref_position:ref_position, ref_organisation:ref_organisation, ref_address:ref_address, ref_postcode:ref_postcode, other_ref_name:other_ref_name, other_ref_phone_no:other_ref_phone_no, ref_phone_no:ref_phone_no,ref_email:ref_email, job_id:job_id,other_ref_position:other_ref_position,other_ref_organisation:other_ref_organisation,other_ref_address:other_ref_address,other_ref_email:other_ref_email,other_ref_postcode:other_ref_postcode },
        beforeSend: function(){
          console.log(ref_name,ref_position);
        },
        success: function(data) {
            // $('.main-pro-bg').html(data);
            console.log(data);
        }
    });

    }
 </script>
@endsection