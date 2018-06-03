 @inject('data','App\Helps')
  @inject('profdata','App\Helps')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <style type="text/css" media="all">
.page-break {
    page-break-after: always;
}
</style>
</head>
<body>
<div class="row">
     <div class="box-body">
                
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Vanancey Name :</strong></td>
                  <td>{{ $jobtitle->job_title or '' }}</td>
                </tr>
                @foreach($personaldetails as $val)
                <tr>
                  <td><strong>Name :</strong></td>
                  <td>{{ $val->fore_name or ''}}</td>
                </tr>

                <tr>
                  <td><strong>Job Profile :</strong></td>
                  <td>{{ $val->title or '' }}</td>
                </tr>
                @endforeach
               </table>   
               <div class="page-break"></div>

            <h3 class="box-title">Personal Information </h3>
              @foreach($personaldetails as $val)
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Title</strong></td>
                  <td>{{ $val->title or '' }}</td>
                </tr><br>
                <tr>
                  <td><strong>Fore Name</strong></td>
                  <td>{{ $val->fore_name or '' }}</td>
                  
                </tr><br>
                <tr>
                  <td><strong>Middle Name</strong></td>
                  <td>{{ $val->middle_name or '' }}</td>
                 
                </tr><br>
                <tr>
                  <td><strong>Surname</strong></td>
                  <td>{{ $val->sur_name or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Contact Telephone Number</strong></td>
                  <td>{{ $val->contact_tel_num or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Email</strong></td>
                  <td>{{ $val->email or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Any Former Name</strong></td>
                  <td>{{ $val->any_former_name or '' }}</td>
                </tr>
                <tr>
                  <td><strong>National Insurance Number</strong></td> 
                  <td>{{ $val->national_insurance_number or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Current Address</strong></td> 
                  <td>{{ $val->current_address or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Post Code</strong></td>
                  <td>{{ $val->post_code or '' }}</td> 
                </tr>
                 <tr>
                  <td><strong>Do you have the right to take up employment in the UK?</strong></td>
                  <td>{{ $val->employment_uk or '' }}</td>
                </tr>
                 <tr>
                  <td><strong>Are you related to, or o you maintain a close relationship
with, an exisiting employee, volunterr, governor or</strong></td>
                  <td>{{ $val->org_relationship or '' }}</td>

                </tr>
                 <tr>
                  <td><strong>If yes, please provide details:</strong></td> 
                  <td>{{ $val->org_relationship_detail or '' }}</td>
                </tr>
                 <tr>
                  <td><strong>Teacher reference number (TRN) or Department for Education number:</strong></td>

                  <td>{{ $val->trn_no or '' }}</td> 
                </tr>
                <tr>
                  <td><strong>Create Date:</strong></td>

                  <td>{{ \Carbon\Carbon::parse($val->created_at)->format('F jS Y') or '' }}</td>
                </tr>
              </table>
              @endforeach
            </div>

          <!-- /.box-body -->
</div>

<div class="page-break"></div>
 <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
           <h3 class="box-title">CURRENT OR MOST RECENT EMPLOYMENT </h3>
           
            <div class="box-body">
             @if($emphistorydetails)
              @foreach($emphistorydetails as $emphistory)
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Name of current/most recent employer:</strong></td>
                  <td>{{ $emphistory->current_employer_name or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Address</strong></td>
                  <td>{{ $emphistory->address or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Postcode</strong></td>
                  <td>{{ $emphistory->postcode or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Job title</strong></td>
                  <td>{{ $emphistory->job_title or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Salary</strong></td>
                  <td>{{ $emphistory->salary or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Date started</strong></td>
                  <td>{{ \Carbon\Carbon::parse($emphistory->date_started)->format('F jS Y') or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Date left</strong></td>
                 <td>{{ \Carbon\Carbon::parse($emphistory->date_left)->format('F jS Y') or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Please give details of emploee benefits</strong></td>
                  <td>{{ $emphistory->employee_benefit or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Brief description of duties and responsibilities</strong></td>
                  <td>{{ $emphistory->duty_description or '' }}</td>
                </tr>
                 <tr>
                  <td><strong>Notice period</strong></td>
                  <td>{{ $emphistory->notice_period or '' }}</td>
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
            <h3 class="box-title">PREVIOUS EMPLOYMENT</h3>
            <div class="box-body">
            @if($emphistory)
                @php
                 $previd =  $emphistory->id;

                 $prevdata =  $data->previousEmployment($previd);

                @endphp
                 @foreach($prevdata as $value)
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Date started</strong></td>
                  <td>{{ \Carbon\Carbon::parse($value->previous_date_started)->format('F jS Y') or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Date left</strong></td>
                 <td>{{ \Carbon\Carbon::parse($value->previous_date_left)->format('F jS Y') or ''}}</td>

                </tr>
                <tr>
                  <td><strong>Position held and main duties</strong></td>
                  <td>{{ $value->main_duty or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Name of employer</strong></td>
                  <td>{{ $value->name_of_employer or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Reason for leaving</strong></td>
                  <td>{{ $value->reason_for_leaving or ''}}</td>
                </tr>
              </table>
                @endforeach
                 @else
                 <td>No record found</td>
                 @endif
                @endforeach
                 @else
                   <td>No record found</td>
                @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
<div class="page-break"></div>
<div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
           <h3 class="box-title"> EDUCATION, QUALIFICATION & SKILLS</h3>
            <div class="box-body">
              @if($Educationdetails)
                @foreach($Educationdetails as $education)
                @php
                 $secedu =  $education->id;
                 $secdata =  $data->secondaryEdu($secedu);
                @endphp
              <table id="" class="table table-bordered table-striped">
                @foreach($secdata as $val )
                <tr>
                  <td><strong>Name of School or College:</strong></td>

                  <td>{{ $val->name_of_college or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Date from:</strong></td>
                  <td>{{ \Carbon\Carbon::parse($val->pri_date_from)->format('F jS Y') or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Date to:</strong></td>
                   <td>{{ \Carbon\Carbon::parse($val->pri_date_to)->format('F jS Y') or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Examinations passed/Qualifications obtained</strong></td>
                  <td>{{ $val->pri_exam_pass_quali or ''}}</td>
                </tr>
                  @endforeach
                 
                   @if($education)
                  <tr>
                  <td><strong>Do you have qualified teacher status?</strong></td>
                  <td>{{ $education->qualified_teacher_status or '' }}</td>
                  
                </tr>
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
           <p>CONINUTING PROFESSIONAL DEVELOPMENT UNDERTAKEN FOR TEACHING POSTS WITHIN THE LAST 5 YEARS</p>
            <div class="box-body">
             @if($education)
                @php
                 $prof =  $education->id;
                 $proffdata =  $profdata->professionalData($prof);
                @endphp
                 @foreach($proffdata as $value)
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Date from:</strong></td>
                  <td>{{ \Carbon\Carbon::parse($value->prof_date_from)->format('F jS Y') or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Date to:</strong></td>
                 <td>{{ \Carbon\Carbon::parse($value->prof_date_to)->format('F jS Y') or ''}}</td>

                </tr>
                <tr>
                  <td><strong>Examinations passed/Qualifications obtained:</strong></td>
                  <td>{{ $value->prof_quali_obtained or ''}}</td>
                </tr>
              </table>
               @endforeach
                 @else
                 <td>No record found</td>
                 @endif
                @endforeach
              @else
              @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    <div class="page-break"></div>
<div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
          <h3 class="box-title">PERSONAL STATEMENT </h3>
            <div class="box-body">
             @if($personalstatement)
              @foreach($personalstatement as $personalstate)
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>In this section please provide evidence and give specific examples of how you meet the essential and desirable criteria set out in the Job
Description. Clearly explain how your experience, knowledge and skills make you a suitable candidate for this role. Remember to include details
of paid/unpaid work as well as other activities relevant to the position</strong></td>

                  <td>{{ $personalstate->job_description or ''}}</td>
                </tr>
                <tr>
                  <td><strong>How would you contribute to the wider life of the School?</strong></td>
                  <td>{{ $personalstate->school_contribution or ''}}</td>
                </tr>
              </table>
              @endforeach
              @else
                   <td>No record found</td>
                 @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
           <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="page-break"></div>

<div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
          <h3 class="box-title">REFERENCES </h3>
        <p>CURRENT/MOST RECENT EMPLOYER</p>

            <div class="box-body">
              @if($Reference)
                @foreach($Reference as $reference)
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Name</strong></td>

                  <td>{{ $reference->ref_name or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Position</strong></td>
                  <td>{{ $reference->ref_position or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Organisation</strong></td>
                   <td>{{ $reference->ref_organisation or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Address</strong></td>
                  <td>{{ $reference->ref_address or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Contact telephone number</strong></td>

                  <td>{{ $reference->ref_phone_no or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Email</strong></td>

                  <td>{{ $reference->ref_email or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Postcode</strong></td>

                  <td>{{ $reference->ref_postcode or ''}}</td>
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
          <h3 class="box-title">OTHER REFEREE </h3>
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
               @if($reference)
                <tr>
                  <td><strong>Name</strong></td>
                  <td>{{ $reference->other_ref_name or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Contact telephone</strong></td>
                 <td>{{ $reference->other_ref_phone_no or ''}}</td>

                </tr>
                <tr>
                  <td><strong>Position</strong></td>
                 <td>{{ $reference->other_ref_position or ''}}</td>

                </tr>
                <tr>
                  <td><strong>Organisation</strong></td>
                 <td>{{ $reference->other_ref_organisation or ''}}</td>

                </tr>
                <tr>
                  <td><strong>Address</strong></td>
                 <td>{{ $reference->other_ref_address or ''}}</td>

                </tr>
                <tr>
                  <td><strong>Postcode</strong></td>
                 <td>{{ $reference->other_ref_postcode or ''}}</td>

                </tr>
                <tr>
                  <td><strong>Email</strong></td>
                 <td>{{ $reference->other_ref_email or ''}}</td>

                </tr>
                 @else
                 <td>No record found</td>
                 @endif
              </table>
              @endforeach
                 @else
                   <td>No record found</td>
                 @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="page-break"></div>
 <h3 class="box-title">WORKING WITH CHILDREN &/OR VULNERABLE ADULTS </h3>
 <div class="row"> 
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body">
             @if($WorkingWithChildren)
                @foreach($WorkingWithChildren as $val )
             <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Name of organisation:</strong></td>

                  <td>{{ $val->name_of_organisation or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Postcode:</strong></td>
                  <td>{{ $val->postcode or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Contact Name:</strong></td>
                   <td>{{ $val->contact_name or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Position:</strong></td>
                  <td>{{ $val->position or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Contact telephone number:</strong></td>
                  <td>{{ $val->contact_tel_no or ''}}</td>
                </tr>
              </table>
               @endforeach
                 @else
                   <td>No record found</td>
                 @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
           <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
 <div class="page-break"></div>
 <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
 <strong>DETAILS OF CRIMINAL CONVICTIONS, CAUTIONS, BIND OVERS,
REPRIMANDS OR FINAL WARNINGS</strong>
            <div class="box-body">
            @if($CriminalConvitions)
                @foreach($CriminalConvitions as $criminalcon)
              <table id="" class="table table-bordered table-striped">
                
                <tr>
                  <td><strong>Have you been convicted by the courts of any criminal offence?</strong></td>

                  <td>{{ $criminalcon->court_criminal_offence or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Is there any relevant court action pending against you?</strong></td>
                  <td>{{ $criminalcon->court_action_against or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Have you ever received a caution, reprimand or final warning from the police?</strong></td>
                   <td>{{ $criminalcon->final_warning_police or ''}}</td>
                </tr>
                <tr>
                  <td><strong>If you have answered ‘yes’ to any of the above, please provide details:</strong></td>
                  <td>{{ $criminalcon->criminal_provide_detail or '' }}</td>
                </tr>
              </table>
               @endforeach
                 @else
                   <td>No record found</td>

                 @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
           <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="page-break"></div> 

 <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
           <h3 class="box-title">REASONABLE ADJUSTMENT </h3>
            <div class="box-body">
            @if($ReasonalAdjustment)
                @foreach($ReasonalAdjustment as $reasonal)
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Do you require any reasonable adjustments to be made to facilitate you attending interview?</strong></td>

                  <td>{{ $reasonal->attending_interview or ''}}</td>
                </tr>
                <tr>
                  <td><strong>If ‘yes’, please provide details</strong></td>
                  <td>{{ $reasonal->please_provide_detail or ''}}</td>
                </tr>
                <tr>
                 <td><strong>Additionally, please provide details and outline practical steps, if any, that you would like the School to take to ensure that the post
is accessible to you:</strong></td>
                   <td>{{ $reasonal->additional_provide_detail or ''}}</td>
                </tr>
              </table>
              @endforeach
                 @else
                   <td>No record found</td>
                 @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
           <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="page-break"></div>
       <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
         <h3 class="box-title">DECLARATION </h3>
          
            @if($Declaration)
                @foreach($Declaration as $declaration )
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                
                <tr>
                  <td><strong>I confirm that the information I have given on this application form is true and correct to the best of my knowledge.</strong></td>

                  <td>{{ $declaration->best_my_knowledge or ''}}</td>
                </tr>
                <tr>
                  <td><strong>confirm that I am not on the DBS Children’s Barred List or DBS Adults’ Barred List and I am not disqualified from working
with children or subject to sanctions imposed by a regulatory body.</strong></td>
                  <td>{{ $declaration->i_am_not_disqualified or ''}}</td>
                </tr>
                <tr>
                 <td><strong>understand that providing false information is an offence which could result in my application being rejected or (if the
false information comes to light after my appointment) summary dismissal and may amount to a criminal offence.</strong></td>
                   <td>{{ $declaration->providing_false_information or ''}}</td>
                </tr>
                <tr>
                 <td><strong>I consent to the School processing the information given on this form, including any ‘sensitive’ information, as may be
necessary during the recruitment and selection process.</strong></td>
                   <td>{{ $declaration->recruitment_and_selection_process or ''}}</td>
                </tr>
                <tr>
                 <td><strong>I consent to the School making direct contact with all previous employers where I have worked with children or
vulnerable adults to verify my reason for leaving that position.</strong></td>
                   <td>{{ $declaration->reason_for_leaving_that_position or ''}}</td>
                </tr>
                <tr>
                 <td><strong>I consent to the School making direct contact with the people specified as my referees to verify the reference.</strong></td>
                   <td>{{ $declaration->verify_the_reference or ''}}</td>
                </tr>
                 <tr>
                 <td><strong>Signature:</strong></td>
                   <td>{{ $declaration->signature or ''}}</td>
                </tr>
                 <tr>
                 <td><strong>Date:</strong></td>
                   <td>{{ $declaration->signature_date or '' }}</td>
                </tr>
               
              </table>
               @endforeach
                 @else
                   <td>No record found</td>
                 @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
           <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

</body>
</html>