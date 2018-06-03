 @inject('data','App\Helps')
@extends('admin.jobappmaster')
@section('title')

@stop
@section('page_header')
<a><i class="fa fa-tasks"></i></a> EMPLOYMENT HISTORY 
@stop
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            @include('admin.partial.top-header')
           <p>CURRENT OR MOST RECENT EMPLOYMENT</p>


            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                @if($emphistory)
                <tr>
                  <td><strong>Name of current/most recent employer:</strong></td>

                  <td>{{ $emphistory->current_employer_name }}</td>
                </tr>
                <tr>
                  <td><strong>Address</strong></td>
                  <td>{{ $emphistory->address }}</td>
                </tr>
                <tr>
                  <td><strong>Postcode</strong></td>
                  <td>{{ $emphistory->postcode }}</td>
                </tr>
                <tr>
                  <td><strong>Job title</strong></td>
                  <td>{{ $emphistory->job_title }}</td>
                </tr>
                <tr>
                  <td><strong>Salary</strong></td>
                  <td>{{ $emphistory->salary }}</td>
                </tr>
                <tr>
                  <td><strong>Date started</strong></td>
                  <td>{{ \Carbon\Carbon::parse($emphistory->date_started)->format('F jS Y') }}</td>
                </tr>
                <tr>
                  <td><strong>Date left</strong></td>
                 <td>{{ \Carbon\Carbon::parse($emphistory->date_left)->format('F jS Y') }}</td>
                </tr>
                <tr>
                  <td><strong>Please give details of emploee benefits</strong></td>


                  <td>{{ $emphistory->employee_benefit }}</td>
                </tr>
                <tr>
                  <td><strong>Brief description of duties and responsibilities</strong></td>
                  <td>{{ $emphistory->duty_description }}</td>
                </tr>
                 <tr>
                  <td><strong>Notice period</strong></td>
                  <td>{{ $emphistory->notice_period }}</td>
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
         <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
           <p>PREVIOUS EMPLOYMENT</p>
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
               @if($emphistory)
                @php
                 $previd =  $emphistory->id;
                 $prevdata =  $data->previousEmployment($previd);
                @endphp
                 @foreach($prevdata as $value)
                <tr>
                  <td><strong>Date started</strong></td>
                  <td>{{ \Carbon\Carbon::parse($value->previous_date_started)->format('F jS Y') }}</td>
                </tr>
                <tr>
                  <td><strong>Date left</strong></td>
                 <td>{{ \Carbon\Carbon::parse($value->previous_date_left)->format('F jS Y') }}</td>

                </tr>
                <tr>
                  <td><strong>Position held and main duties</strong></td>
                  <td>{{ $value->main_duty }}</td>
                </tr>
                <tr>
                  <td><strong>Name of employer</strong></td>
                  <td>{{ $value->name_of_employer }}</td>
                </tr>
                <tr>
                  <td><strong>Reason for leaving</strong></td>
                  <td>{{ $value->reason_for_leaving }}</td>
                </tr>
                 @endforeach
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
