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

 <?php   for ($i=0; $i <$cnt ; $i++) { ?>
  <?php for ($j=0; $j <count($mydata);$j++) {?>
  <?php if ($j == '0') {?>
   @if(isset($mydata[$j][$i]['letter'])!='')
         <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Candidate Name/Letter :</strong></td>
                  <td>{{ $mydata[$j][$i]['letter'] or '' }}</td>
                </tr>
             </table>   
      @else
    <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Candidate Name/Letter</strong></td>
                  <td>{{ $mydata[$j][$i]['fore_name'] or '' }}</td>
                </tr>
    </table>   
   @endif  
  <?php } else if ($j == '1') {?>
          <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Vanancey Name :</strong></td>
                  <td>{{ $mydata[$j][$i]['job_title'] or '' }}</td>
                </tr>
             </table>
        <?php } else if ($j == '2') {?>
          <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Current Post Name :</strong></td>
                  <td>{{ $mydata[$j][$i]['title'] or '' }}</td>
                </tr>
             </table>
             <?php }else if ($j == '3') {?>
          <div class="box-body">
               <h3 class="box-title"> QUALIFICATIONS OBTAINED </h3>
                @php
                 $secedu =  $mydata[$j][$i]['id'];
                 $secdata =  $data->secondaryEdu($secedu);
                @endphp
                  @foreach($secdata as $val )
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td></td>
                  <td>{{ $val->pri_exam_pass_quali }}</td>
                </tr>
              </table>
               @endforeach
            </div>
            <div class="page-break"></div>
      
        <?php } else if ($j == '4') {?>
<div class="row">
     <div class="box-body">
            <h3 class="box-title">Personal Information </h3>
             
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Title</strong></td>
                  <td>{{ $mydata[$j][$i]['title'] or '' }}</td>
                </tr><br>
                <tr>
                  <td><strong>Fore Name</strong></td>
                  <td>{{ $mydata[$j][$i]['fore_name'] or '' }}</td>
                  
                </tr><br>
                <tr>
                  <td><strong>Middle Name</strong></td>
                  <td>{{ $mydata[$j][$i]['middle_name'] or ''}}</td>
                 
                </tr><br>
                <tr>
                  <td><strong>Surname</strong></td>
                  <td>{{ $mydata[$j][$i]['sur_name'] or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Contact Telephone Number</strong></td>
                  <td>{{ $mydata[$j][$i]['contact_tel_num'] or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Email</strong></td>
                  <td>{{ $mydata[$j][$i]['email'] or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Any Former Name</strong></td>
                  <td>{{ $mydata[$j][$i]['any_former_name'] or ''}}</td>
                </tr>
                <tr>
                  <td><strong>National Insurance Number</strong></td> 
                  <td>{{ $mydata[$j][$i]['national_insurance_number'] or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Current Address</strong></td> 
                  <td>{{ $mydata[$j][$i]['current_address'] or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Post Code</strong></td>
                  <td>{{ $mydata[$j][$i]['post_code'] or ''}}</td> 
                </tr>
                 <tr>
                  <td><strong>Do you have the right to take up employment in the UK?</strong></td>
                  <td>{{ $mydata[$j][$i]['employment_uk'] or ''}}</td>
                </tr>
                 <tr>
                  <td><strong>Are you related to, or o you maintain a close relationship
with, an exisiting employee, volunterr, governor or</strong></td>
                  <td>{{ $mydata[$j][$i]['org_relationship'] or ''}}</td>

                </tr>
                 <tr>
                  <td><strong>If yes, please provide details:</strong></td> 
                  <td{{ $mydata[$j][$i]['org_relationship_detail'] or ''}}</td>
                </tr>
                 <tr>
                  <td><strong>Teacher reference number (TRN) or Department for Education number:</strong></td>

                  <td>{{ $mydata[$j][$i]['trn_no'] or '' }}</td> 
                </tr>
                <tr>
                  <td><strong>Create Date:</strong></td>

                  <td>{{ $mydata[$j][$i]['created_at'] or '' }}</td> 
                </tr>
              </table>
             
            </div>
          <!-- /.box-body -->
</div>
<?php 
} else if($j == '5') {?>
<div class="page-break"></div>
 <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
           <h3 class="box-title">EMPLOYMENT HISTORY</h3>
           
            <div class="box-body">
           
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Name of current/most recent employer:</strong></td>
                  <td>{{ $mydata[$j][$i]['current_employer_name'] or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Address</strong></td>
                  <td>{{ $mydata[$j][$i]['address'] or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Postcode</strong></td>
                  <td>{{ $mydata[$j][$i]['postcode'] or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Job title</strong></td>
                  <td>{{ $mydata[$j][$i]['job_title'] or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Salary</strong></td>
                  <td>{{ $mydata[$j][$i]['salary'] or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Date started</strong></td>
                  <td>{{ $mydata[$j][$i]['date_started'] or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Date left</strong></td>
                 <td>{{ $mydata[$j][$i]['date_left'] or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Please give details of emploee benefits</strong></td>
                  <td>{{ $mydata[$j][$i]['employee_benefit'] or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Brief description of duties and responsibilities</strong></td>
                  <td>{{ $mydata[$j][$i]['duty_description'] or '' }}</td>
                </tr>
                 <tr>
                  <td><strong>Notice period</strong></td>
                  <td>{{ $mydata[$j][$i]['notice_period'] or ''}}</td>
                </tr>

                 <tr>
                  <td><strong>If there are any gaps in your employment history, such as a career break, please provide full details of the dates and what you
                  were doing</strong></td>
                  <td>{{ $mydata[$j][$i]['employment_gap_details'] or ''}}</td>
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
            <p>PREVIOUS EMPLOYMENT</p>
            <div class="box-body">
                @php
                 $previd =  $mydata[$j][$i]['id'];

                 $prevdata =  $data->previousEmployment($previd);

                @endphp
                 @foreach($prevdata as $value)
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Date started</strong></td>
                  <td>{{ \Carbon\Carbon::parse($value->previous_date_started)->format('F jS Y') }}</td>
                </tr>
                <tr>
                  <td><strong>Date left</strong></td>
                 <td>{{ \Carbon\Carbon::parse($value->previous_date_left)->format('F jS Y') }}</td>

                </tr>
                 <tr>
                  <td><strong>Name of employer</strong></td>
                  <td>{{ $value->name_of_employer or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Address</strong></td>
                  <td>{{ $value->previous_address or ''}}</td>
                </tr>
                 <tr>
                  <td><strong>Reason for leaving</strong></td>
                  <td>{{ $value->reason_for_leaving or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Position held and main duties</strong></td>
                  <td>{{ $value->main_duty or ''}}</td>
                </tr>
              </table>
            <span>----------------------------------------------------------------------------------------------------</span>
                @endforeach
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      <?php } else if($j == '6') {?>
      <div class="page-break"></div>
<div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
           <h3 class="box-title">EDUCATION, QUALIFICATION & SKILLS </h3>

           <p>Please include Secondary, Further and Higher Qualifications, including professional teaching qualifications (most recent first)
- include GCSEs / O Levels and A Levels.</p>
            <div class="box-body">
                @php
                 $secedu =  $mydata[$j][$i]['id'];
                 $secdata =  $data->secondaryEdu($secedu);
                @endphp
                  @foreach($secdata as $val )
              <table id="" class="table table-bordered table-striped">
               
                <tr>
                  <td><strong>Name of School or College:</strong></td>

                  <td>{{ $val->name_of_college or ''}}</td>
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
              </table>
              
               @endforeach
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
                @php
                 $prof =  $mydata[$j][$i]['id'];
                 $proffdata =  $profdata->professionalData($prof);
                @endphp
                 @foreach($proffdata as $value)
                <table id="" class="table table-bordered table-striped">
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
                  <td>{{ $value->prof_quali_obtained or '' }}</td>
                </tr>
               </table>
              
                @endforeach
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>    
         <?php } else if($j == '7') {?>
        <div class="page-break"></div>
<div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
          <h3 class="box-title">PERSONAL STATEMENT </h3>
            <div class="box-body">
             
             
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>In this section please provide evidence and give specific examples of how you meet the essential and desirable criteria set out in the Job
Description. Clearly explain how your experience, knowledge and skills make you a suitable candidate for this role. Remember to include details
of paid/unpaid work as well as other activities relevant to the position</strong></td>
                 
                  <td> {{ $mydata[$j][$i]['job_description'] or '' }}</td>
                </tr>
                <tr>
                  <td><strong>How would you contribute to the wider life of the School?</strong></td>
                  <td> {{ $mydata[$j][$i]['school_contribution'] or '' }}</td>
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
         <?php } else if($j == '8') {?>
         <div class="page-break"></div>
         <div class="row">
        <div class="col-md-12">
         <h3 class="box-title">REFERENCES </h3>
          <div class="box box-primary">
           <p>Please supply the names and contact details of two people whom we may contact for references. Your first referee must be your current or
most recent employer. If your current/most recent employment does/did not involve work with children and you have previously worked with
children, your second referee should be from the employer with whom you most recently worked with children. No referee should be a relative
or someone known to you solely as a friend.</p>
 <strong>Please note the School is required, in line with Keeping Children Safe In Education, to take up references from all shortlisted
candidates before interview.</strong>
 <p>CURRENT/MOST RECENT EMPLOYER</p>

            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Name</strong></td>
                  
                  <td>{{ $mydata[$j][$i]['ref_name'] or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Position</strong></td>

                  <td> {{ $mydata[$j][$i]['ref_position'] or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Organisation</strong></td>
                  
                   <td> {{ $mydata[$j][$i]['ref_organisation'] or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Address</strong></td>

                  <td> {{ $mydata[$j][$i]['ref_address'] or ''}}</td>
                </tr>
                <tr>

                  <td><strong>Contact telephone number</strong></td>

                  <td>{{ $mydata[$j][$i]['ref_phone_no'] or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Email</strong></td>


                  <td>{{ $mydata[$j][$i]['ref_email'] or '' }}</td>
                </tr>
                <tr>

                  <td><strong>Postcode</strong></td>

                  <td> {{ $mydata[$j][$i]['ref_postcode'] or ''}}</td>
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
           <h4>OTHER REFEREE</h4>
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Name</strong></td>

                  <td> {{ $mydata[$j][$i]['other_ref_name'] or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Contact telephone</strong></td>

                 <td> {{ $mydata[$j][$i]['other_ref_phone_no'] or '' }}</td>

                </tr>
                <tr>
                  <td><strong>Position</strong></td>

                 <td>{{ $mydata[$j][$i]['other_ref_position'] or '' }}</td>

                </tr>
                <tr>
                  <td><strong>Organisation</strong></td>

                 <td> {{ $mydata[$j][$i]['other_ref_organisation'] or '' }}</td>

                </tr>
                <tr>
                  <td><strong>Address</strong></td>

                 <td> {{ $mydata[$j][$i]['other_ref_address'] or ''}}</td>

                </tr>
                <tr>
                  <td><strong>Postcode</strong></td>

                  <td> {{ $mydata[$j][$i]['other_ref_postcode'] or '' }}</td>

                </tr>
                <tr>
                  <td><strong>Email</strong></td>

                 <td>{{ $mydata[$j][$i]['other_ref_email'] or ''}}</td>

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
         <?php } else if($j == '9') {?>
         <div class="page-break"></div>
          <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
         
           <h3 class="box-title"> WORKING WITH CHILDREN &/OR VULNERABLE ADULTS </h3>
           
           <p>Please give a contact name and telephone number for all organisations, not listed above, that you have worked for which
involved working with children and / or vulnerable adults.</p>
            <div class="box-body">
               @php
                 $userid =  $mydata[$j][$i]['user_id'];
                 $jobid =  $mydata[$j][$i]['job_id'];
                 $workingwith =  $profdata->workingwith($userid,$jobid);
                @endphp
               @foreach($workingwith as $val )
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
                   <td>{{ $val->contact_name or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Position:</strong></td>
                  <td>{{ $val->position or '' }}</td>
                </tr>
                <tr>
                  <td><strong>Contact telephone number:</strong></td>
                  <td>{{ $val->contact_tel_no or ''}}</td>
                </tr>
              </table>
              <span>-------------------------------------------------------------------------------------------------</span>
             
              @endforeach
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
           <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>  
         <?php } else if($j == '10') {?>
         <div class="page-break"></div>
        <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
           <h3 class="box-title">CRIMINAL CONVITIONS </h3>
           <p>Please give details of any criminal convictions, cautions, bind overs or reprimands below. As you are applying for a position at a school, where
you are likely to have contact with children you must always declare any convictions, cautions, bind overs, reprimands or final warnings,
which would not be filtered in line with the current Rehabilitation of Offenders Act guidance.</p>
 <strong>DETAILS OF CRIMINAL CONVICTIONS, CAUTIONS, BIND OVERS,
REPRIMANDS OR FINAL WARNINGS</strong>
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Have you been convicted by the courts of any criminal offence?</strong></td>
                 
                  <td>{{ $mydata[$j][$i]['court_criminal_offence'] or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Is there any relevant court action pending against you?</strong></td>

                  <td> {{ $mydata[$j][$i]['court_action_against'] or ''}}</td>
                </tr>
                <tr>
                  <td><strong>Have you ever received a caution, reprimand or final warning from the police?</strong></td>

                   <td>{{ $mydata[$j][$i]['final_warning_police'] or ''}}</td>
                </tr>
                <tr>
                  <td><strong>If you have answered ‘yes’ to any of the above, please provide details:</strong></td>
                  <td> {{ $mydata[$j][$i]['criminal_provide_detail'] or ''}}</td>
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
       <?php } else if($j == '11') {?>
       <div class="page-break"></div>
       <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
           <h3 class="box-title">REASONABLE ADJUSTMENT </h3>
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>Do you require any reasonable adjustments to be made to facilitate you attending interview?</strong></td>
                  
                  <td> {{ $mydata[$j][$i]['attending_interview'] or '' }}</td>
                </tr>
                <tr>
                  <td><strong>If ‘yes’, please provide details</strong></td>

                  <td> {{ $mydata[$j][$i]['please_provide_detail'] or ''}}</td>
                </tr>
                <tr>
                 <td><strong>Additionally, please provide details and outline practical steps, if any, that you would like the School to take to ensure that the post
is accessible to you:</strong></td>
                   <td>{{ $mydata[$j][$i]['additional_provide_detail'] or ''}}</td>
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

        <?php } else if($j == '12') {?> 
         <div class="page-break"></div>
         <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
          <h3 class="box-title">DECLARATION </h3>
            
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td><strong>I confirm that the information I have given on this application form is true and correct to the best of my knowledge.</strong></td>
                   
                  <td>&nbsp;&nbsp;{{ $mydata[$j][$i]['best_my_knowledge'] or ''}}</td>
                </tr>
                <tr>
                  <td><strong>confirm that I am not on the DBS Children’s Barred List or DBS Adults’ Barred List and I am not disqualified from working
with children or subject to sanctions imposed by a regulatory body.</strong></td>

                  <td> {{ $mydata[$j][$i]['i_am_not_disqualified'] or ''}}</td>
                </tr>
                <tr>
                 <td><strong>understand that providing false information is an offence which could result in my application being rejected or (if the
false information comes to light after my appointment) summary dismissal and may amount to a criminal offence.</strong></td>

                   <td>{{ $mydata[$j][$i]['providing_false_information'] or ''}}</td>
                </tr>
                <tr>
                 <td><strong>I consent to the School processing the information given on this form, including any ‘sensitive’ information, as may be
necessary during the recruitment and selection process.</strong></td>

                   <td> {{ $mydata[$j][$i]['recruitment_and_selection_process'] or ''}}</td>
                </tr>
                <tr>
                 <td><strong>I consent to the School making direct contact with all previous employers where I have worked with children or
vulnerable adults to verify my reason for leaving that position.</strong></td>

                   <td>{{ $mydata[$j][$i]['reason_for_leaving_that_position'] or ''}}</td>
                </tr>
                <tr>
                 <td><strong>I consent to the School making direct contact with the people specified as my referees to verify the reference.</strong></td>

                   <td> {{ $mydata[$j][$i]['verify_the_reference'] or ''}}</td>
                </tr>
                 <tr>
                 <td><strong>Signature:</strong></td>

                   <td> {{ $mydata[$j][$i]['signature'] or ''}}</td>
                </tr>
                 <tr>
                 <td><strong>Date:</strong></td>

                   <td> {{ $mydata[$j][$i]['signature_date'] or ''}}</td>
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
        <div class="page-break"></div>
        <div class="page-break"></div>
       <?php } } ?> 
       <?php } ?>  
</body>
</html>