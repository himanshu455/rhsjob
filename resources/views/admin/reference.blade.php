@extends('admin.jobappmaster')
@section('title')

@stop
@section('page_header')
<a><i class="fa fa-tasks"></i></a> REFERENCES 
@stop
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
           @include('admin.partial.top-header')
           <p>Please supply the names and contact details of two people whom we may contact for references. Your first referee must be your current or
most recent employer. If your current/most recent employment does/did not involve work with children and you have previously worked with
children, your second referee should be from the employer with whom you most recently worked with children. No referee should be a relative
or someone known to you solely as a friend.</p>
 <strong>Please note the School is required, in line with Keeping Children Safe In Education, to take up references from all shortlisted
candidates before interview.</strong>
 <p>CURRENT/MOST RECENT EMPLOYER</p>

            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                @if($reference)
                <tr>
                  <td><strong>Name</strong></td>

                  <td>{{ $reference->ref_name }}</td>
                </tr>
                <tr>
                  <td><strong>Position</strong></td>
                  <td>{{ $reference->ref_position }}</td>
                </tr>
                <tr>
                  <td><strong>Organisation</strong></td>
                   <td>{{ $reference->ref_organisation }}</td>
                </tr>
                <tr>
                  <td><strong>Address</strong></td>
                  <td>{{ $reference->ref_address }}</td>
                </tr>
                <tr>
                  <td><strong>Contact telephone number</strong></td>

                  <td>{{ $reference->ref_phone_no }}</td>
                </tr>
                <tr>
                  <td><strong>Email</strong></td>

                  <td>{{ $reference->ref_email }}</td>
                </tr>
                <tr>
                  <td><strong>Postcode</strong></td>

                  <td>{{ $reference->ref_postcode }}</td>
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
           <p>OTHER REFEREE</p>
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
               @if($reference)
                <tr>
                  <td><strong>Name</strong></td>
                  <td>{{ $reference->other_ref_name }}</td>
                </tr>
                <tr>
                  <td><strong>Contact telephone</strong></td>
                 <td>{{ $reference->other_ref_phone_no }}</td>

                </tr>
                <tr>
                  <td><strong>Position</strong></td>
                 <td>{{ $reference->other_ref_position }}</td>

                </tr>
                <tr>
                  <td><strong>Organisation</strong></td>
                 <td>{{ $reference->other_ref_organisation }}</td>

                </tr>
                <tr>
                  <td><strong>Address</strong></td>
                 <td>{{ $reference->other_ref_address }}</td>

                </tr>
                <tr>
                  <td><strong>Postcode</strong></td>
                 <td>{{ $reference->other_ref_postcode }}</td>

                </tr>
                <tr>
                  <td><strong>Email</strong></td>
                 <td>{{ $reference->other_ref_email }}</td>

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
