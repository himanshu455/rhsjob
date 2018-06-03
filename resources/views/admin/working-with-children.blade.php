@extends('admin.jobappmaster')
@section('title')
@stop
@section('page_header')
<a><i class="fa fa-tasks"></i></a>WORKING WITH CHILDREN &/OR VULNERABLE ADULTS 
@stop
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
           @include('admin.partial.top-header')
           <p>Please give a contact name and telephone number for all organisations, not listed above, that you have worked for which
involved working with children and / or vulnerable adults.</p>
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                @if($workingwith)
                @foreach($workingwith as $val )
                <tr>
                  <td><strong>Name of organisation:</strong></td>

                  <td>{{ $val->name_of_organisation }}</td>
                </tr>
                <tr>
                  <td><strong>Postcode:</strong></td>
                  <td>{{ $val->postcode }}</td>
                </tr>
                <tr>
                  <td><strong>Contact Name:</strong></td>
                   <td>{{ $val->contact_name }}</td>
                </tr>
                <tr>
                  <td><strong>Position:</strong></td>
                  <td>{{ $val->position }}</td>
                </tr>
                <tr>
                  <td><strong>Contact telephone number:</strong></td>
                  <td>{{ $val->contact_tel_no }}</td>
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
