 @inject('data','App\Helps')
@extends('admin.jobappmaster')
@section('title')
@stop
@section('page_header')
<a><i class="fa fa-tasks"></i></a> PERSONAL STATEMENT 
@stop
@section('content') <!-- Content Wrapper. Contains page content -->
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
           @include('admin.partial.top-header')
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                @if($personalstate)
                <tr>
                  <td><strong>In this section please provide evidence and give specific examples of how you meet the essential and desirable criteria set out in the Job
Description. Clearly explain how your experience, knowledge and skills make you a suitable candidate for this role. Remember to include details
of paid/unpaid work as well as other activities relevant to the position</strong></td>

                  <td>{{ $personalstate->job_description}}</td>
                </tr>
                <tr>
                  <td><strong>How would you contribute to the wider life of the School?</strong></td>
                  <td>{{ $personalstate->school_contribution}}</td>
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
