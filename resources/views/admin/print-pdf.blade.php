 @inject('data','App\Helps')
@extends('admin.master')
@section('title')

@stop
@section('page_header')
<a><i class="fa fa-tasks"></i></a> Print Pdf 
@stop
@section('content')
  <!-- Content Wrapper. Contains page content -->

    <div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
    <form class="form-horizontal" name="form1" method="post" action="{{ route('generate-pdf') }}">
    {{ csrf_field() }}
    <!-- /.col -->
      <div class="col-md-8">

        <div class="box-body">
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label>
                <input type="radio" id="archive" checked=""  name="readacted" value="1" > Redacted

                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label>
                  <input type="radio" id="archive"  name="readacted" value="2" > Full
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="archive"  name="archive" value="1" > Print associate Doc
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Set Status</label>

            <div class="col-sm-6">
              <select name="status"  id="status" onchange="updateStatus(this)" class="form-control" id="inputEmail3" placeholder="">
              <option value="1">All</option>
              <option value="2">Active</option>
              <option value="3">Short Listed</option>
              </select>
            </div>
          </div>
        </div>
      </div>
  
  
 
  <div class="box-body">
    <table id="example" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th><input type="checkbox" value="" id="checkAll"></th>
          <th>Letter</th>
          <th>Name</th>
        </tr>
      </thead>
      <tbody class="tb-l">
        @if($appliedId)
          @foreach($appliedId as $val)
            @php
            $personalInformation =  $data->personalInformationdetails($val->user_id,$val->job_id);

            @endphp
            <tr>
              <td><input type="checkbox"  name="alldata[]" value="{{ $val->id }}"></td>
              <td>{{ $val->letter or '' }}</td>
              <td>{{ $personalInformation->fore_name or '' }}</td>
            </tr>
          @endforeach
        @else
          <td>No record found</td>
        @endif
      </tbody>
    </table>
    <input type="submit" class="btn btn-primary pull-right" style="margin-right: 5px;">
  </div>  
  </form>
  </div>
  </div>
</div>


      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
      <script type="text/javascript">
        
       $(document).ready(function() {

         $("#checkAll").click(function () {
     $('input[name!="archive"]:checkbox').prop('checked', this.checked);
 });
       }) 

      </script>
  

  <script type="text/javascript">
       function updateStatus(obj) {
          var statusvalue = obj.value;
           $.ajax({
        type: "get",
        //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('print-pdf-status') }}",
        data: {statusvalue:statusvalue},
        beforeSend: function(){
          //console.log(ref_name,ref_position);
        },
         success: function(response){
        $('.tb-l').html(response);
    }


           //alert(data);
          /*if(data==1) {
              alert('status updated successfuly');
          }*/
            // $('.main-pro-bg').html(data);
            //console.log(data);
       
     });

          
   }

    </script>

  @stop
