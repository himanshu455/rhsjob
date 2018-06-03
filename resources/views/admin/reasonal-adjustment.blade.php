@extends('admin.jobappmaster')
@section('title')

@stop
@section('page_header')
<a><i class="fa fa-tasks"></i></a> REASONABLE ADJUSTMENT   
@stop
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
           @include('admin.partial.top-header')
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                @if($reasonal)
                <tr>
                  <td><strong>Do you require any reasonable adjustments to be made to facilitate you attending interview?</strong></td>

                  <td>{{ $reasonal->attending_interview }}</td>
                </tr>
                <tr>
                  <td><strong>If ‘yes’, please provide details</strong></td>
                  <td>{{ $reasonal->please_provide_detail }}</td>
                </tr>
                <tr>
                 <td><strong>Additionally, please provide details and outline practical steps, if any, that you would like the School to take to ensure that the post
is accessible to you:</strong></td>
                   <td>{{ $reasonal->additional_provide_detail }}</td>
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
