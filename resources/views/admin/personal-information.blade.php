@extends('admin.jobappmaster')
@section('title')

@stop

@section('content')

  <!-- Content Wrapper. Contains page content -->
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            
             @if(session('status'))
            <div class="alert alert-{{ session('class') }}">{{ session('status') }}</div>
            @endif            
            <!-- info row -->
        @include('admin.partial.top-header')
      <!-- /.row -->
           
            <div class="box-body">
            <h3 class="box-title">Personal Information </h3>
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Title</strong></td>
                  <td>{{ $personalinfo->title }}</td>
                </tr>
                <tr>
                  <td><strong>Fore Name</strong></td>
                  <td>{{ $personalinfo->fore_name }}</td>
                </tr>
                <tr>
                  <td><strong>Middle Name</strong></td>
                  <td>{{ $personalinfo->middle_name }}</td>
                </tr>
                <tr>
                  <td><strong>Surname</strong></td>
                  <td>{{ $personalinfo->sur_name }}</td>
                </tr>
                <tr>
                  <td><strong>Contact Telephone Number</strong></td>
                  <td>{{ $personalinfo->contact_tel_num }}</td>
                </tr>
                <tr>
                  <td><strong>Email</strong></td>
                  <td>{{ $personalinfo->email }}</td>
                </tr>
                <tr>
                  <td><strong>Any Former Name</strong></td>
                  <td>{{ $personalinfo->any_former_name }}</td>
                </tr>
                <tr>
                  <td><strong>National Insurance Number</strong></td>
                  <td>{{ $personalinfo->national_insurance_number }}</td>
                </tr>
                <tr>
                  <td><strong>Current Address</strong></td>
                  <td>{{ $personalinfo->current_address }}</td>
                </tr>
                <tr>
                  <td><strong>Post Code</strong></td>
                  <td>{{ $personalinfo->post_code }}</td>
                </tr>
                 <tr>
                  <td><strong>Do you have the right to take up employment in the UK?</strong></td>
                  <td>{{ $personalinfo->employment_uk }}</td>
                </tr>
                 <tr>
                  <td><strong>Are you related to, or o you maintain a close relationship
with, an exisiting employee, volunterr, governor or</strong></td>
                  <td>{{ $personalinfo->org_relationship }}</td>

                </tr>
                 <tr>
                  <td><strong>If yes, please provide details:</strong></td>
                  <td>{{ $personalinfo->org_relationship_detail }}</td>
                </tr>
                 <tr>
                  <td><strong>Teacher reference number (TRN) or Department for Education number:</strong></td>

                  <td>{{ $personalinfo->trn_no }}</td>
                </tr>
                <tr>
                  <td><strong>Create Date:</strong></td>

                  <td>{{ \Carbon\Carbon::parse($personalinfo->created_at)->format('F jS Y') }}</td>
                </tr>
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
