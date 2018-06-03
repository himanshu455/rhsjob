@extends('admin.jobappmaster')
@section('title')

@stop
@section('page_header')
<a><i class="fa fa-tasks"></i></a> DOCUMENT UPLOADS  
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
                @if($docfile)
                @foreach($docfile as $val)
                <tr>
                  <td><strong>Download Documents</strong></td>

                  <td><a href="{{ url('/') }}/{{ $val->documents }}" target="_blank"> {{ url('/') }}/{{ $val->documents }}</a></td>
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
