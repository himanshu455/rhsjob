@extends('admin.jobappmaster')
@section('title')

@stop
@section('page_header')
<a><i class="fa fa-tasks"></i></a> CRIMINAL CONVITIONS  
@stop
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
           @include('admin.partial.top-header')
           <p>Please give details of any criminal convictions, cautions, bind overs or reprimands below. As you are applying for a position at a school, where
you are likely to have contact with children you must always declare any convictions, cautions, bind overs, reprimands or final warnings,
which would not be filtered in line with the current Rehabilitation of Offenders Act guidance.</p>
 <strong>DETAILS OF CRIMINAL CONVICTIONS, CAUTIONS, BIND OVERS,
REPRIMANDS OR FINAL WARNINGS</strong>
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                @if($criminalcon)
                <tr>
                  <td><strong>Have you been convicted by the courts of any criminal offence?</strong></td>

                  <td>{{ $criminalcon->court_criminal_offence }}</td>
                </tr>
                <tr>
                  <td><strong>Is there any relevant court action pending against you?</strong></td>
                  <td>{{ $criminalcon->court_action_against }}</td>
                </tr>
                <tr>
                  <td><strong>Have you ever received a caution, reprimand or final warning from the police?</strong></td>
                   <td>{{ $criminalcon->final_warning_police }}</td>
                </tr>
                <tr>
                  <td><strong>If you have answered ‘yes’ to any of the above, please provide details:</strong></td>
                  <td>{{ $criminalcon->criminal_provide_detail }}</td>
                </tr>
                 @else
                   <td>No record found</td>
                 @endif
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
           <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </section>

  @stop
