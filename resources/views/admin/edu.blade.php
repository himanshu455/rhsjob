 @inject('data','App\Helps')
 @inject('profdata','App\Helps')
@extends('admin.jobappmaster')
@section('title')

@stop

@section('page_header')
<a><i class="fa fa-tasks"></i></a> EDUCATION, QUALIFICATION & SKILLS  
@stop

@section('content')
  
  <!-- Content Wrapper. Contains page content -->
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
           @include('admin.partial.top-header')
           <p>Please include Secondary, Further and Higher Qualifications, including professional teaching qualifications (most recent first)
- include GCSEs / O Levels and A Levels.</p>
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                @if($education)
                @php
                 $secedu =  $education->id;
                 $secdata =  $data->secondaryEdu($secedu);
                @endphp
                @foreach($secdata as $val )
                <tr>
                  <td><strong>Name of School or College:</strong></td>

                  <td>{{ $val->name_of_college }}</td>
                </tr>
                <tr>
                  <td><strong>Date from:</strong></td>
                  <td>{{ \Carbon\Carbon::parse($val->pri_date_from)->format('F jS Y') }}</td>
                </tr>
                <tr>
                  <td><strong>Date to:</strong></td>
                   <td>{{ \Carbon\Carbon::parse($val->pri_date_to)->format('F jS Y') }}</td>
                </tr>
                <tr>
                  <td><strong>Examinations passed/Qualifications obtained</strong></td>
                  <td>{{ $val->pri_exam_pass_quali }}</td>
                </tr>
                  @endforeach
                 @else
                   <td>No record found</td>
                 @endif
                   @if($education)
                  <tr>
                  <td><strong>Do you have qualified teacher status?</strong></td>
                  <td>{{ $education->qualified_teacher_status }}</td>
                  @else
                  
                  @endif
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
         <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
           <p>CONINUTING PROFESSIONAL DEVELOPMENT UNDERTAKEN FOR TEACHING POSTS WITHIN THE LAST 5 YEARS</p>
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
               @if($education)
                @php
                 $prof =  $education->id;
                 $proffdata =  $profdata->professionalData($prof);
                @endphp
                 @foreach($proffdata as $value)
                <tr>
                  <td><strong>Date from:</strong></td>
                  <td>{{ \Carbon\Carbon::parse($value->prof_date_from)->format('F jS Y') }}</td>
                </tr>
                <tr>
                  <td><strong>Date to:</strong></td>
                 <td>{{ \Carbon\Carbon::parse($value->prof_date_to)->format('F jS Y') }}</td>

                </tr>
                <tr>
                  <td><strong>Examinations passed/Qualifications obtained:</strong></td>
                  <td>{{ $value->prof_quali_obtained }}</td>
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
