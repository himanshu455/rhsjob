 @inject('data','App\Helps')
<div class="row invoice-info">
       
     <section class="invoice">
      <!-- title row -->
      <div class="row">
      <a href="{{ route('applied-job-app') }}" class="btn btn-primary pull-right" type="button"> List job application</a> 
        <div class="col-xs-12">
          <h2 class="page-header">
           @php
                      $dd =  $data->getJobTitleHeader();
                      $letters =  $data->getJobLetter();
                      @endphp
            <i class="fa fa-globe"></i>  Job Title:- {{ $dd }}, {{ $letters->letter }}
            <small class="pull-right"></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-8">
         <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Set Status</label>

                  <div class="col-sm-6">
                    <select name="status" id="status" onchange="updateStatus(this)" class="form-control" id="inputEmail3" placeholder="">
                      <option value="1" {{ $letters->status =='1' ? 'selected' : ''}}>Active</option>
                      <option value="0" {{ $letters->status =='0' ? 'selected' : ''}}>Inactive</option>
                      <option value="2" {{ $letters->status =='2' ? 'selected' : ''}}>Short Listed</option>
                    <select>
                    <input type="hidden" id="userid" name="userid" value="{{ $letters->user_id }}" >
                     <input type="hidden" id="jobid" name="jobid" value="{{ $letters->job_id }}">
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" id="archive"  name="archive" value="1" {{ $letters->archive == 1 ? 'checked' : '0' }}> Mark Archive
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              
            </form>
        </div>
      </div>
    </section>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    <script type="text/javascript">
       function updateStatus(obj) {
          var statusvalue = obj.value;
          var jobid = $('#jobid').val();
          var userid = $('#userid').val();
           $.ajax({
        type: "get",
        //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('updatestatus') }}",
        data: {statusvalue:statusvalue,jobid:jobid,userid:userid},
        beforeSend: function(){
          //console.log(ref_name,ref_position);
        },
        success: function(data) {
          if(data==1) {
              alert('status updated successfuly');
          }
            // $('.main-pro-bg').html(data);
            //console.log(data);
        }
     });

          
   }

    </script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
   <script>
     
   $(document).ready(function(){

    $('#archive').on('change', function(){
    var archivestatus =  this.value = this.checked ? 1 : 0;
      var jobid = $('#jobid').val();
      var userid = $('#userid').val();
       $.ajax({
        type: "get",
        //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('archivestatus') }}",
        data: {archivestatus:archivestatus,jobid:jobid,userid:userid},
        beforeSend: function(){
          //console.log(ref_name,ref_position);
        },
        success: function(data) {
          if(data==1) {
              alert('Archived save successfuly');
          }
            // $('.main-pro-bg').html(data);
            //console.log(data);
        }
     });

     })
    
 })

   </script> 