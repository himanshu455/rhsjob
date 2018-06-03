<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonalInformation;
use Auth;
use App\jobs;
use App\JobStep;
use App\PersonalStatement;
use App\Reference;
use App\CriminalConvitions;
use App\ReasonalAdjustment;
use App\Declaration;
use App\Document;
use App\WorkingWithChildren;
use App\EmploymentHistory;
use App\PreviousEmployment;
use App\Education;
use App\SecondaryQualification;
use App\ProfessionalQualification;
use App\Member;
class JobPostController extends Controller
{
    public function index($id)
    {  
      $userid = Auth::guard('member')->user()->id; 
      $jobname = jobs::where('id',$id)->first();
      $perdata = PersonalInformation::where('job_id',$id)->where('user_id',$userid)->count();
      if($perdata > 0){
     $perdata = PersonalInformation::where('job_id',$id)->where('user_id',$userid)->first();    
      return view('jobpost.personal-information',compact('id','jobname','perdata'));
       }else{
         $perdata = array();
        return view('jobpost.personal-information',compact('id','jobname','perdata'));
       }
     }
  

    public function employmentHistory($jobid)
    {
       $userid = Auth::guard('member')->user()->id; 
       $id = array();
       $prevempdataall = array();
       $emphistorydata = employmenthistory::where('job_id',$jobid)->where('user_id',$userid)->count();
       if($emphistorydata) {
       $prevempdata = employmenthistory::where('job_id',$jobid)->where('user_id',$userid)->first();
       $id = $prevempdata->id;

        $prevempdatacount = previousEmployment::where('employment_history_id',$id)->count();
        if($prevempdatacount >0){
            $prevempdataall = previousEmployment::where('employment_history_id',$id)->get();
       } }else {
              $prevempdata = array();
              $prevempdatacount = array();
              $emphistorydata = array();
              $prevempdataall = array();

        }


      if($emphistorydata > 0){
     $empdata = employmenthistory::where('job_id',$jobid)->where('user_id',$userid)->first();    
      return view('jobpost.employmenthistory',compact('jobid','empdata','prevempdataall','prevempdatacount'));
       }else{
         $empdata = array();
         $prevempdata = array();
         $prevempdatacount = array();
         $prevempdataall = array();

        return view('jobpost.employmenthistory',compact('jobid','empdata','prevempdataall','prevempdatacount'));
       }  
         
    }
    
    public function qualificationEducation($jobid)
    {
       $secondarydata = array();
       $secondaryalldata = array();
       $profdatacount = array();
       $edudata = array();
       $eduid = '';
        $userid = Auth::guard('member')->user()->id; 
        $edudatacount = Education::where('job_id',$jobid)->where('user_id',$userid)->count();
        $secondarydata = Education::where('job_id',$jobid)->where('user_id',$userid)->first();
        if($secondarydata) {
        $eduid = $secondarydata->id;
      } else{
        $eduid = '';
      }
        $secondarydata = SecondaryQualification::where('secondary_id',$eduid)->count();
        $profdatacount = ProfessionalQualification::where('pro_qua_id',$eduid)->count();
         if($profdatacount) {
           $profdata = ProfessionalQualification::where('pro_qua_id',$eduid)->get();

         } else {
               $profdata = array();
         }
 
         if($secondarydata){
            $secondaryalldata = SecondaryQualification::where('secondary_id',$eduid)->get();

         }else {
             $secondaryalldata = array();
         }
        if($edudatacount){
           $edudata = Education::where('job_id',$jobid)->where('user_id',$userid)->first();
        }
      return view('jobpost.educaton-qualification',compact('jobid','profdata','secondaryalldata','edudata','secondarydata','profdatacount'));
    }
    public function personalStatement($jobid)
    {
      $userid = Auth::guard('member')->user()->id; 
        $perstatementdata = PersonalStatement::where('job_id',$jobid)->where('user_id',$userid)->count();
        if($perstatementdata > 0){
      $persdata = PersonalStatement::where('job_id',$jobid)->where('user_id',$userid)->first();        
         return view('jobpost.personal-statement',compact('jobid','persdata'));
         }else{
             $persdata = array();
             return view('jobpost.personal-statement',compact('jobid'));
         } 

       
    }
    public function references($jobid)
    {
        $userid = Auth::guard('member')->user()->id; 
        $refdata = Reference::where('job_id',$jobid)->where('user_id',$userid)->count();
        if($refdata > 0){
      $allrefdata = Reference::where('job_id',$jobid)->where('user_id',$userid)->first();        
          return view('jobpost.references',compact('jobid','allrefdata'));
         }else{
             $allrefdata = array();
            return view('jobpost.references',compact('jobid','allrefdata'));
         }

        
    }

    public function workingWithChildren($jobid)
    {
        $userid = Auth::guard('member')->user()->id; 
        $workingwith = WorkingWithChildren::where('job_id',$jobid)->where('user_id',$userid)->count();
        if($workingwith > 0){
      $allworkingdata = WorkingWithChildren::where('job_id',$jobid)->where('user_id',$userid)->get();        
          return view('jobpost.working-with-children',compact('jobid','allworkingdata','workingwith'));
         }else{
             $allworkingdata = array();
            return view('jobpost.working-with-children',compact('jobid','allworkingdata','workingwith'));
         }
      
    }
    public function criminalConvitions($jobid)
    {
         $userid = Auth::guard('member')->user()->id; 
         $cridata = CriminalConvitions::where('job_id',$jobid)->where('user_id',$userid)->count();
        if($cridata > 0){
      $allcridata = CriminalConvitions::where('job_id',$jobid)->where('user_id',$userid)->first();     
          return view("jobpost.criminal-convitions",compact('jobid','allcridata'));
         }else{
             $allcridata = array();
            return view("jobpost.criminal-convitions",compact('jobid','allcridata'));
         } 
      
    }
    public function reasonalAdjustment($jobid)
    {   
         $userid = Auth::guard('member')->user()->id; 
         $reasonaldata = ReasonalAdjustment::where('job_id',$jobid)->where('user_id',$userid)->count();
        if($reasonaldata > 0){
       $allreasonaldata = ReasonalAdjustment::where('job_id',$jobid)->where('user_id',$userid)->first();     
          return view("jobpost.reasonal-adjustment",compact('jobid','allreasonaldata'));
         }else{
             $allreasonaldata = array();
             return view("jobpost.reasonal-adjustment",compact('jobid','allreasonaldata'));
         } 
      
    }
    public function documentUploads($jobid)
    {
         $userid = Auth::guard('member')->user()->id; 
         $declardata = Document::where('job_id',$jobid)->where('user_id',$userid)->count();
        if($declardata > 0){
        $alldocumentdatadata = Document::where('job_id',$jobid)->where('user_id',$userid)->get();     
          return view("jobpost.document",compact('jobid','alldocumentdatadata'));
         }else{
             $alldocumentdatadata = array();
             return view("jobpost.document",compact('jobid','alldocumentdatadata'));
         }   
      
    }
    public function declaration($jobid)
    {
      
         $userid = Auth::guard('member')->user()->id; 
         $declardata = Declaration::where('job_id',$jobid)->where('user_id',$userid)->count();
        if($declardata > 0){
       $alldeclardatadata = Declaration::where('job_id',$jobid)->where('user_id',$userid)->first();     
          return view("jobpost.declaration",compact('jobid','alldeclardatadata'));
         }else{
             $alldeclardatadata = array();
             return view("jobpost.declaration",compact('jobid','alldeclardatadata'));
         }   
      
    }
    public function savePersonalInformation(Request $request)
    {
          $userid = Auth::guard('member')->user()->id;
      // ajax request
      if ($request->ajax()) {
        $jobid =  $request->jobid;
      $checkusercountdata = PersonalInformation::where('job_id',$jobid)->where('user_id',$userid)->get();

       if(!$checkusercountdata->count()) {
          $saveajaxdata = new PersonalInformation;
          $saveajaxdata->job_id = $request->jobid;
          $saveajaxdata->user_id = $userid;
          $saveajaxdata->title =   $request->title;
          $saveajaxdata->fore_name = $request->fore_name;
          $saveajaxdata->middle_name = $request->middle_name;
          $saveajaxdata->sur_name = $request->sur_name;
          $saveajaxdata->any_former_name = $request->any_former_name;
          $saveajaxdata->current_address = $request->current_address;
          $saveajaxdata->post_code = $request->post_code;
          $saveajaxdata->contact_tel_num = $request->contact_tel_num;
          $saveajaxdata->email = $request->email;
          $saveajaxdata->national_insurance_number = $request->national_insurance_number;
          $saveajaxdata->employment_uk = $request->emp_uk;
          $saveajaxdata->org_relationship = $request->orgrel;
          $saveajaxdata->org_relationship_detail = $request->org_relationship_detail;
          $saveajaxdata->trn_no = $request->trn_no;
          if($saveajaxdata->save()) {
                  $saveajobstep = new JobStep;
            $saveajobstep->job_id = $saveajaxdata->job_id;
              $saveajobstep->user_id =  $saveajaxdata->user_id;
              $saveajobstep->step = "1";
          $saveajobstep->is_completed = '0';
          $saveajobstep->save();
          }
       } else {
            $saveajaxdata =PersonalInformation::where('user_id',$userid)->where('job_id',$jobid)->first();
            $saveajaxdata->job_id = $jobid;
            $saveajaxdata->user_id = $userid;
            $saveajaxdata->title =   $request->title;
            $saveajaxdata->fore_name = $request->fore_name;
            $saveajaxdata->middle_name = $request->middle_name;
            $saveajaxdata->sur_name = $request->sur_name;
            $saveajaxdata->any_former_name = $request->any_former_name;
            $saveajaxdata->current_address = $request->current_address;
            $saveajaxdata->post_code = $request->post_code;
            $saveajaxdata->contact_tel_num = $request->contact_tel_num;
            $saveajaxdata->email = $request->email;
            $saveajaxdata->national_insurance_number = $request->national_insurance_number;
             if($request->has('emp_uk')){
                $saveajaxdata->employment_uk = $request->emp_uk;  
             }
            if($request->has('orgrel')){
                $saveajaxdata->org_relationship = $request->orgrel;
             }
            
             $saveajaxdata->org_relationship_detail = $request->org_relationship_detail;
            $saveajaxdata->trn_no = $request->trn_no;
            $saveajaxdata->save();

       }

      } else {

        //Update Case 
      
         
         $this->validate($request,[
           'title' => 'required|max:200',
           'fore_name' => 'required|max:150',
           'sur_name'  => 'required|max:150',
           'contact_tel_num' => 'required',
           'email' => 'required|email',
           'any_former_name' => 'required|max:200',
           'current_address' => 'required|max:600'
         ]);

          
           $saveajaxdata1 = PersonalInformation::where('user_id',$userid)->where('job_id',$request->job_id)->first();
            $saveajaxdata1->job_id = $request->job_id;
            $saveajaxdata1->user_id = $userid;
            $saveajaxdata1->title =   $request->title;
            $saveajaxdata1->fore_name = $request->fore_name;
            $saveajaxdata1->middle_name = $request->middle_name;
            $saveajaxdata1->sur_name = $request->sur_name;
            $saveajaxdata1->any_former_name = $request->any_former_name;
            $saveajaxdata1->current_address = $request->current_address;
            $saveajaxdata1->post_code = $request->post_code;
            $saveajaxdata1->contact_tel_num = $request->contact_tel_num;
            $saveajaxdata1->email = $request->email;
            $saveajaxdata1->national_insurance_number = $request->national_insurance_number;
             if($request->has('emp_uk')){
                $saveajaxdata1->employment_uk = $request->emp_uk;   
             }
            if($request->has('orgrel')){
                $saveajaxdata1->org_relationship = $request->orgrel;
             }
            
             $saveajaxdata1->org_relationship_detail = $request->org_relationship_detail;
            $saveajaxdata1->trn_no = $request->trn_no;

          if ($saveajaxdata1->save()) {
                $jobstep =JobStep::where('user_id',$saveajaxdata1->user_id)->where('job_id',$saveajaxdata1->job_id)->first();
          $jobstep->is_completed = 1;
          $jobstep->save();
          
            }

            return redirect()->route('employmenthistory',['jobid' => $saveajaxdata1->job_id]);
          
        }
    }

    //Save Personal statement Step4

     public function savePersonalStatement(Request $request)

     {
         if($request->ajax())
         {
            $userid = Auth::guard('member')->user()->id;
            $jobid = $request->job_id;
            $checkpersonalsta = PersonalStatement::where('job_id',$jobid)->where('user_id',$userid)->get();
            if(!$checkpersonalsta->count()) {
             $savepstatement = new PersonalStatement;
             $savepstatement->user_id = $userid;
             $savepstatement->job_id =  $jobid; 
             $savepstatement->job_description = $request->job_description;
             $savepstatement->school_contribution = $request->school_contribution;
             if($savepstatement->save()){
                 $saveajobstep = new JobStep;
                  $saveajobstep->job_id = $savepstatement->job_id;
                  $saveajobstep->user_id =  $savepstatement->user_id;
                  $saveajobstep->step = "4";
                  $saveajobstep->is_completed = '0';
                  $saveajobstep->save();
             }
            } else {
                 $updatepstatement =PersonalStatement::where('user_id',$userid)->where('job_id',$jobid)->first();
                 $updatepstatement->job_description = $request->job_description;
                 $updatepstatement->school_contribution = $request->school_contribution;
                 $updatepstatement->save();
            }

            
         } else {

             $this->validate($request,[
              // 'job_description' => 'min:350|max:400'
       
                ]);
                $userid = Auth::guard('member')->user()->id;
                $jobid = $request->job_id;
               
               $updatepstatementdata =PersonalStatement::where('user_id',$userid)->where('job_id',$jobid)->first();
                 $updatepstatementdata->user_id = $userid;
                 $updatepstatementdata->job_id = $jobid;
                 $updatepstatementdata->job_description = $request->job_description;
                 $updatepstatementdata->school_contribution = $request->school_contribution;
                if($updatepstatementdata->save()){
                    $jobstep =JobStep::where('user_id',$updatepstatementdata->user_id)->where('job_id',$updatepstatementdata->job_id)->where('step',4)->first();
                    $jobstep->is_completed = 1;
                    $jobstep->save();
                }

                return redirect()->route('references',['jobid' => $updatepstatementdata->job_id]);


         } 
     }

     //Referecences save Step 5

     public function saveReference(Request $request)
     {

         if($request->ajax()){
             $userid = Auth::guard('member')->user()->id;
             $jobid = $request->job_id;
             $checkref = Reference::where('job_id',$jobid)->where('user_id',$userid)->get();
            if(!$checkref->count()) {
              $saverefdata = new Reference;
              $saverefdata->user_id = $userid;
              $saverefdata->job_id = $jobid;
              $saverefdata->ref_name = $request->ref_name;
              $saverefdata->ref_position = $request->ref_position;
              $saverefdata->ref_organisation = $request->ref_organisation;
              $saverefdata->ref_address = $request->ref_address;
              $saverefdata->ref_postcode = $request->ref_postcode;
              $saverefdata->ref_phone_no = $request->ref_phone_no;
              $saverefdata->ref_email = $request->ref_email;
              $saverefdata->other_ref_name = $request->other_ref_name;
              $saverefdata->other_ref_phone_no = $request->other_ref_phone_no;
              $saverefdata->other_ref_position = $request->other_ref_position;
              $saverefdata->other_ref_organisation = $request->other_ref_organisation;
              $saverefdata->other_ref_address = $request->other_ref_address;
              $saverefdata->other_ref_email = $request->other_ref_email;
              $saverefdata->other_ref_postcode = $request->other_ref_postcode;

             if($saverefdata->save()){
                 $saveajobstep = new JobStep;
                  $saveajobstep->job_id = $saverefdata->job_id;
                  $saveajobstep->user_id =  $saverefdata->user_id;
                  $saveajobstep->step = "5";
                  $saveajobstep->is_completed = '0';
                  $saveajobstep->save();

             }
            } else {
              $userid = Auth::guard('member')->user()->id;
              $jobid = $request->job_id;  
              $updateref =Reference::where('user_id',$userid)->where('job_id',$jobid)->first();  
              $updateref->user_id = $userid;
              $updateref->job_id = $jobid;
              $updateref->ref_name = $request->ref_name;
              $updateref->ref_position = $request->ref_position;
              $updateref->ref_organisation = $request->ref_organisation;
              $updateref->ref_address = $request->ref_address;
              $updateref->ref_postcode = $request->ref_postcode;
              $updateref->other_ref_name = $request->other_ref_name;
              $updateref->other_ref_phone_no = $request->other_ref_phone_no;
              $updateref->ref_phone_no = $request->ref_phone_no;
              $updateref->ref_email = $request->ref_email;
              $updateref->other_ref_position = $request->other_ref_position;
              $updateref->other_ref_organisation = $request->other_ref_organisation;
              $updateref->other_ref_address = $request->other_ref_address;
              $updateref->other_ref_email = $request->other_ref_email;
              $updateref->other_ref_postcode = $request->other_ref_postcode;
              $updateref->save();

            }
         } else{

             $this->validate($request,[
                  'ref_name' => 'required',
                  'ref_position' => 'required',
                  'ref_organisation' => 'required',
                  'ref_address' => 'required',
                  'other_ref_name' => 'required',
                  'ref_phone_no' => 'required',
                  'ref_email' => 'required|email',
                  'other_ref_position' => 'required',
                  'other_ref_organisation' => 'required',
                  'other_ref_address' => 'required',
                  'other_ref_email' => 'required',
                ]);

             $userid = Auth::guard('member')->user()->id;
              $jobid = $request->job_id;  
              $updateref =Reference::where('user_id',$userid)->where('job_id',$jobid)->first();  
              $updateref->user_id = $userid;
              $updateref->job_id = $jobid;
              $updateref->ref_name = $request->ref_name;
              $updateref->ref_position = $request->ref_position;
              $updateref->ref_organisation = $request->ref_organisation;
              $updateref->ref_address = $request->ref_address;
              $updateref->ref_postcode = $request->ref_postcode;
              $updateref->other_ref_name = $request->other_ref_name;
              $updateref->other_ref_phone_no = $request->other_ref_phone_no;
              $updateref->ref_phone_no = $request->ref_phone_no;
              $updateref->ref_email = $request->ref_email;
              $updateref->other_ref_position = $request->other_ref_position;
              $updateref->other_ref_organisation = $request->other_ref_organisation;
              $updateref->other_ref_address = $request->other_ref_address;
              $updateref->other_ref_email = $request->other_ref_email;
              $updateref->other_ref_postcode = $request->other_ref_postcode;
              if($updateref->save()){
               $jobstep =JobStep::where('user_id',$updateref->user_id)->where('job_id',$updateref->job_id)->where('step',5)->first();
                    $jobstep->is_completed = 1;
                    $jobstep->save();

              }

            return redirect()->route('workingwithchildren',['jobid' => $updateref->job_id]);
         }
     }

     //Save criminalConvitions Step 6

     public function saveCriminalConvitions(Request $request)
     {
        if($request->ajax()){
             $userid = Auth::guard('member')->user()->id;
             $jobid = $request->job_id;
             $checlCon = CriminalConvitions::where('job_id',$jobid)->where('user_id',$userid)->get();
            if(!$checlCon->count()) {
               $criconsavedata = new CriminalConvitions;
               $criconsavedata->user_id = $userid;
               $criconsavedata->job_id = $jobid;
               if($request->has('court_criminal_offence')){
               $criconsavedata->court_criminal_offence = $request->court_criminal_offence;
               }if($request->has('court_action_against')){
                  $criconsavedata->court_action_against = $request->court_action_against;

               }if($request->has('final_warning_police')){
                  $criconsavedata->final_warning_police = $request->final_warning_police;

               }
               $criconsavedata->criminal_provide_detail = $request->cdetails;
              if( $criconsavedata->save()){
                  $saveajobstep = new JobStep;
                  $saveajobstep->job_id = $criconsavedata->job_id;
                  $saveajobstep->user_id =  $criconsavedata->user_id;
                  $saveajobstep->step = "7";
                  $saveajobstep->is_completed = '0';
                  $saveajobstep->save();
              }

            } else {
                $userid = Auth::guard('member')->user()->id;
                $jobid = $request->job_id;
               $updatecridata =CriminalConvitions::where('user_id',$userid)->where('job_id',$jobid)->first();
               $updatecridata->user_id = $userid;
               $updatecridata->job_id = $jobid;
               if($request->has('court_criminal_offence')){
               $updatecridata->court_criminal_offence = $request->court_criminal_offence;
               }if($request->has('court_action_against')){
                  $updatecridata->court_action_against = $request->court_action_against;
               }if($request->has('final_warning_police')){
                  $updatecridata->final_warning_police = $request->final_warning_police;
               }
               $updatecridata->criminal_provide_detail = $request->cdetails;
               $updatecridata->save();


            }

        } else { 
               $userid = Auth::guard('member')->user()->id;
                $jobid = $request->job_id;
               $updatecridata =CriminalConvitions::where('user_id',$userid)->where('job_id',$jobid)->first();
               $updatecridata->user_id = $userid;
               $updatecridata->job_id = $jobid;
               if($request->has('court_criminal_offence')){
               $updatecridata->court_criminal_offence = $request->court_criminal_offence;
               }if($request->has('court_action_against')){
                  $updatecridata->court_action_against = $request->court_action_against;
               }if($request->has('final_warning_police')){
                  $updatecridata->final_warning_police = $request->final_warning_police;
               }
               $updatecridata->criminal_provide_detail = $request->criminal_provide_detail; 
               if($updatecridata->save()) {

                $jobstep =JobStep::where('user_id',$updatecridata->user_id)->where('job_id',$updatecridata->job_id)->where('step',7)->first();
                    $jobstep->is_completed = 1;
                    $jobstep->save();

               }
                 return redirect()->route('reasonaladjustment',['jobid' => $updatecridata->job_id]);

         }
     }

     public function saveReasonalAdjustment(Request $request)
     {
       if($request->ajax()){
             $userid = Auth::guard('member')->user()->id;
             $jobid = $request->job_id;
             $checlCon = ReasonalAdjustment::where('job_id',$jobid)->where('user_id',$userid)->get();
            if(!$checlCon->count()) {
               $reasonsavedata = new ReasonalAdjustment;
               $reasonsavedata->user_id = $userid;
               $reasonsavedata->job_id = $jobid;
               if($request->has('attending_interview')){
               $reasonsavedata->attending_interview = $request->attending_interview;
               }
               $reasonsavedata->please_provide_detail = $request->please_provide_detail;
               $reasonsavedata->additional_provide_detail = $request->additional_provide_detail;

              if( $reasonsavedata->save()){
                  $saveajobstep = new JobStep;
                  $saveajobstep->job_id = $reasonsavedata->job_id;
                  $saveajobstep->user_id =  $reasonsavedata->user_id;
                  $saveajobstep->step = 8;
                  $saveajobstep->is_completed = '0';
                  $saveajobstep->save();
              }

            } else {
                $userid = Auth::guard('member')->user()->id;
                $jobid = $request->job_id;
               $updatereasonaldata =ReasonalAdjustment::where('user_id',$userid)->where('job_id',$jobid)->first();
               $updatereasonaldata->user_id = $userid;
               $updatereasonaldata->job_id = $jobid;
               if($request->has('attending_interview')){
               $updatereasonaldata->attending_interview = $request->attending_interview;
               }
               $updatereasonaldata->please_provide_detail = $request->please_provide_detail;
               $updatereasonaldata->additional_provide_detail = $request->additional_provide_detail;
               $updatereasonaldata->save();


            }

      } else {
                $userid = Auth::guard('member')->user()->id;
                $jobid = $request->job_id;
               $updatereasonaldata =ReasonalAdjustment::where('user_id',$userid)->where('job_id',$jobid)->first();
               $updatereasonaldata->user_id = $userid;
               $updatereasonaldata->job_id = $jobid;
               if($request->has('attending_interview')){
               $updatereasonaldata->attending_interview = $request->attending_interview;
               }
               $updatereasonaldata->please_provide_detail = $request->please_provide_detail;
               $updatereasonaldata->additional_provide_detail = $request->additional_provide_detail;
               if($updatereasonaldata->save()) {
                 $jobstep =JobStep::where('user_id',$updatereasonaldata->user_id)->where('job_id',$updatereasonaldata->job_id)->where('step',8)->first();
                    $jobstep->is_completed = 1;
                    $jobstep->save();
               }
           return redirect()->route('documentuploads',['jobid' => $updatereasonaldata->job_id]);

      }
  }

    public function saveDeclaration(Request $request)
            {
              if($request->ajax()){

                 $userid = Auth::guard('member')->user()->id;
                 $jobid = $request->job_id;
                 $checlCon = Declaration::where('job_id',$jobid)->where('user_id',$userid)->get();
            if(!$checlCon->count()) {
               $declaration = new Declaration;
               $declaration->user_id = $userid;
               $declaration->job_id = $jobid;
               $declaration->signature = $request->signature;
               $declaration->signature_date = $request->signature_date;
               $declaration->job_id = $jobid;
               if($request->has('best_my_knowledge')){
               $declaration->best_my_knowledge = $request->best_my_knowledge;
               }
                if($request->has('i_am_not_disqualified')){
               $declaration->i_am_not_disqualified = $request->i_am_not_disqualified;
               }
                if($request->has('providing_false_information')){
                 $declaration->providing_false_information = $request->providing_false_information;
               }
               if($request->has('reason_for_leaving_that_position')){
                 $declaration->reason_for_leaving_that_position = $request->reason_for_leaving_that_position;
               }

                if($request->has('recruitment_and_selection_process')){
                 $declaration->recruitment_and_selection_process = $request->recruitment_and_selection_process;
               }
                if($request->has('verify_the_reference')){
                 $declaration->verify_the_reference = $request->verify_the_reference;
               }
                 if($declaration->save()){
                  $saveajobstep = new JobStep;
                  $saveajobstep->job_id = $declaration->job_id;
                  $saveajobstep->user_id =  $declaration->user_id;
                  $saveajobstep->step = 10;
                  $saveajobstep->is_completed = '0';
                  $saveajobstep->save();

                }
               } else{
                 $userid = Auth::guard('member')->user()->id;
                 $jobid  = $request->job_id;
                 $updatedeclardata =Declaration::where('user_id',$userid)->where('job_id',$jobid)->first();
                   $updatedeclardata->user_id = $userid;
                   $updatedeclardata->job_id = $jobid;
                   $updatedeclardata->signature = $request->signature;
                   $updatedeclardata->signature_date = $request->signature_date;
                   $updatedeclardata->job_id = $jobid;
                   if($request->has('best_my_knowledge')){
                   $updatedeclardata->best_my_knowledge = $request->best_my_knowledge;
                   }
                    if($request->has('i_am_not_disqualified')){
                   $updatedeclardata->i_am_not_disqualified = $request->i_am_not_disqualified;
                   }
                    if($request->has('providing_false_information')){
                     $updatedeclardata->providing_false_information = $request->providing_false_information;
                   }
                  if($request->has('reason_for_leaving_that_position')){
                   $updatedeclardata->reason_for_leaving_that_position = $request->reason_for_leaving_that_position;
                }

                if($request->has('recruitment_and_selection_process')){
                  $updatedeclardata->recruitment_and_selection_process = $request->recruitment_and_selection_process;
                 }
                if($request->has('verify_the_reference')){
                  $updatedeclardata->verify_the_reference = $request->verify_the_reference;
               }
                
                $updatedeclardata->save();

               }
            }else {
                    $userid = Auth::guard('member')->user()->id;
                   $jobid  = $request->job_id;
                   $updatedeclardatacount =Declaration::where('user_id',$userid)->where('job_id',$jobid)->count();
                   if($updatedeclardatacount) {
                 $updatedeclardata =Declaration::where('user_id',$userid)->where('job_id',$jobid)->first();
                   $updatedeclardata->user_id = $userid;
                   $updatedeclardata->job_id = $jobid;
                   $updatedeclardata->signature = $request->signature;
                   $updatedeclardata->signature_date = $request->signature_date;
                   $updatedeclardata->job_id = $jobid;
                   if($request->has('best_my_knowledge')){
                   $updatedeclardata->best_my_knowledge = $request->best_my_knowledge;
                   }
                    if($request->has('i_am_not_disqualified')){
                   $updatedeclardata->i_am_not_disqualified = $request->i_am_not_disqualified;
                   }
                    if($request->has('providing_false_information')){
                     $updatedeclardata->providing_false_information = $request->providing_false_information;
                   }
                  if($request->has('reason_for_leaving_that_position')){
                   $updatedeclardata->reason_for_leaving_that_position = $request->reason_for_leaving_that_position;
                }

                if($request->has('recruitment_and_selection_process')){
                  $updatedeclardata->recruitment_and_selection_process = $request->recruitment_and_selection_process;
                 }
                if($request->has('verify_the_reference')){
                  $updatedeclardata->verify_the_reference = $request->verify_the_reference;
               }
                
                if($updatedeclardata->save()){

                    $jobstep =JobStep::where('user_id',$updatedeclardata->user_id)->where('job_id',$updatedeclardata->job_id)->where('step',10)->first();
                    $jobstep->is_completed = 1;
                    $jobstep->save();
                }
           }
                 return redirect('/member/home')->with('class','success')->with('mesg','Records saved for this job!');

            }
         } 

         public function saveDocuments(Request $request)
         {
                 $this->validate($request,[
                'documents.*' => 'sometimes|mimes:pdf,docx,xls'
               
            ]);   


                 $userid = Auth::guard('member')->user()->id;
                 $jobid = $request->job_id;
                 
               if ($request->hasFile('documents')) {
                foreach ($request->documents as $sfile) {
                    $imageName = uniqid().'.'.$sfile->getClientOriginalExtension();
                    $sfile->move(public_path('FileUploads'), $imageName);                   
                    $docfile = new Document;
                    $docfile->documents = "FileUploads/".$imageName;
                    $docfile->user_id = $userid;
                    $docfile->job_id = $jobid;
                    $docfile->save();
                }
                $jobstep =JobStep::where('user_id',$userid)->where('job_id',$jobid)->where('step',9)->first();
                   if(!$jobstep) {
                   $saveajobstep = new JobStep;
                   $saveajobstep->job_id = $jobid;
                   $saveajobstep->user_id = $userid;
                   $saveajobstep->step = 9;
                   $saveajobstep->is_completed = '1';
                   $saveajobstep->save();
                   } else {
                    $userid = Auth::guard('member')->user()->id;
                   $jobid = $request->job_id;
                   $jobstepup =JobStep::where('user_id',$userid)->where('job_id',$jobid)->where('step',9)->first(); 
                    $jobstepup->is_completed = 1;
                    $jobstepup->save();
                }
                         
            }

              
           return redirect()->route('declaration',['jobid' => $jobid]);
         } 

         public function delete($id)
         {

            $delsub = Document::findorFail($id);
            $delsub->delete();
             return back()->with('status', 'Record deleted successfully!')->with('class', 'success');
         } 

         public function saveWorkingWithChild(Request $request)
         {
               if($request->ajax()){
               $userid = Auth::guard('member')->user()->id;
               $jobid =         $request->job_id;
               $field =         $request->field;
               $updatefield =   $request->updatefield;
              $updatefieldcunt =WorkingWithChildren::where('field',$updatefield)->where('user_id',$userid)->where('job_id',$jobid)->count();
              $checkfield =WorkingWithChildren::where('field',$field)->where('user_id',$userid)->where('job_id',$jobid)->count();
               if($updatefieldcunt >0){
               $userid = Auth::guard('member')->user()->id;
               $jobid =         $request->job_id;
              $saveChild =WorkingWithChildren::where('field',$updatefield)->where('user_id',$userid)->where('job_id',$jobid)->first();
               $saveChild->user_id = $userid;
               $saveChild->job_id = $jobid;
                if($request->has('name_of_organisation') && null <> $request->name_of_organisation) {
               $saveChild->name_of_organisation = $request->name_of_organisation;
                }
                if($request->has('postcode') && null <> $request->postcode) {
                $saveChild->postcode = $request->postcode;
                }
                if($request->has('contact_name') && null <> $request->contact_name) {
               $saveChild->contact_name = $request->contact_name;
                }
                if($request->has('position') && null <> $request->position) {
               $saveChild->position = $request->position;
                }
                if($request->has('contact_tel_no') && null <> $request->contact_tel_no) {
               $saveChild->contact_tel_no = $request->contact_tel_no;
               }
               $saveChild->save();

                }

               elseif(!$checkfield) {
                $userid = Auth::guard('member')->user()->id;
               $jobid =         $request->job_id;
               $saveChild = new WorkingWithChildren;
               $saveChild->user_id = $userid;
               $saveChild->job_id = $jobid;
               $saveChild->field = $request->field;
               if($request->has('name_of_organisation')) {
               $saveChild->name_of_organisation = $request->name_of_organisation;
                }
                if($request->has('postcode')) {
               $saveChild->postcode = $request->postcode;
                }
                if($request->has('contact_name')) {
               $saveChild->contact_name = $request->contact_name;
                }
                if($request->has('position')) {
               $saveChild->position = $request->position;
                }
                if($request->has('contact_tel_no')) {
               $saveChild->contact_tel_no = $request->contact_tel_no;
               }
               $saveChild->save();
              }else {
               $userid = Auth::guard('member')->user()->id;
               $jobid =         $request->job_id;
               $field =         $request->field;
              $saveChild =WorkingWithChildren::where('field',$field)->where('user_id',$userid)->where('job_id',$jobid)->first();
              $saveChild->user_id = $userid;
               $saveChild->job_id = $jobid;
                if($request->has('name_of_organisation') && null <> $request->name_of_organisation) {
               $saveChild->name_of_organisation = $request->name_of_organisation;
                }
                if($request->has('postcode') && null <> $request->postcode) {
                $saveChild->postcode = $request->postcode;
                }
                if($request->has('contact_name') && null <> $request->contact_name) {
               $saveChild->contact_name = $request->contact_name;
                }
                if($request->has('position') && null <> $request->position) {
               $saveChild->position = $request->position;
                }
                if($request->has('contact_tel_no') && null <> $request->contact_tel_no) {
               $saveChild->contact_tel_no = $request->contact_tel_no;
               }
               $saveChild->save();


               }     
           } else{
             $this->validate($request,[
                //'documents.*' => 'sometimes|mimes:pdf,docx,xls'
            ]); 
               
                   $userid = Auth::guard('member')->user()->id;
                   $jobid = $request->job_id;
                   $jobstepup =JobStep::where('user_id',$userid)->where('job_id',$jobid)->where('step',6)->count();
                    if(!$jobstepup){
                    $saveajobstep = new JobStep;
                    $saveajobstep->job_id =  $jobid;
                    $saveajobstep->user_id =  $userid;
                    $saveajobstep->step = 6;
                    $saveajobstep->is_completed = '1';
                    $saveajobstep->save();
                    }else {
                     $userid = Auth::guard('member')->user()->id;
                   $jobid = $request->job_id;
                   $saveajobstep =JobStep::where('user_id',$userid)->where('job_id',$jobid)->where('step',6)->first();
                    $saveajobstep->job_id =  $jobid;
                    $saveajobstep->user_id =  $userid;
                    $saveajobstep->step = 6;
                    $saveajobstep->is_completed = '1';
                    $saveajobstep->save();

                    }

                   return redirect()->route('criminalconvitions',['jobid' => $jobid]);

           }
       }
       //Employment History
       public function EmpHistory(Request $request)
       {
            if($request->ajax())
            {
                   $userid = Auth::guard('member')->user()->id;
                   $jobid = $request->job_id;
                   $checlCon = employmenthistory::where('job_id',$jobid)->where('user_id',$userid)->get();
                    if(!$checlCon->count()) {
                            $saveempdata = new employmenthistory;
                            $saveempdata->user_id = $userid;
                            $saveempdata->job_id =  $jobid;
                            $saveempdata->current_employer_name  = $request->current_employer_name;
                            $saveempdata->address = $request->address;
                            $saveempdata->postcode = $request->postcode;
                            $saveempdata->job_title = $request->job_title;
                            $saveempdata->salary = $request->salary;
                            $saveempdata->date_started = $request->date_started;
                            $saveempdata->date_left = $request->date_left;
                            $saveempdata->employee_benefit = $request->employee_benefit;
                            $saveempdata->duty_description = $request->duty_description;
                            $saveempdata->notice_period = $request->notice_period;
                            $saveempdata->employment_gap_details = $request->employment_gap_details;
                            $saveempdata->save();
                           } else {
                           $userid = Auth::guard('member')->user()->id;
                           $jobid = $request->job_id;
                           $saveempdata = employmenthistory::where('job_id',$jobid)->where('user_id',$userid)->first();
                        $saveempdata->user_id = $userid;
                        $saveempdata->job_id =  $jobid;
                        if($request->has('current_employer_name') && null <> $request->current_employer_name) {
                        $saveempdata->current_employer_name  = $request->current_employer_name;
                           }
                        if($request->has('address') && null <> $request->address) {   
                        $saveempdata->address = $request->address;
                          }
                        if($request->has('postcode') && null <> $request->postcode){  
                        $saveempdata->postcode = $request->postcode;
                          }
                        if($request->has('job_title') && null <> $request->job_title){   
                        $saveempdata->job_title = $request->job_title;
                         }
                         if($request->has('salary') && null <> $request->salary){    
                        $saveempdata->salary = $request->salary;
                         }
                         if($request->has('date_started') && null <> $request->date_started){ 
                        $saveempdata->date_started = $request->date_started;
                         }
                        if($request->has('date_left') && null <> $request->date_left){ 
                        $saveempdata->date_left = $request->date_left;
                         }
                         if($request->has('employee_benefit') && null <> $request->employee_benefit){  
                          $saveempdata->employee_benefit = $request->employee_benefit; 
                         }
                         if($request->has('duty_description') && null <> $request->duty_description){   
                        $saveempdata->duty_description = $request->duty_description;
                         }
                        if($request->has('notice_period') && null <> $request->notice_period){  
                        $saveempdata->notice_period = $request->notice_period;
                        }
                        if($request->has('employment_gap_details') && null <> $request->employment_gap_details){ 
                          $saveempdata->employment_gap_details = $request->employment_gap_details;
                           }
                              $saveempdata->save();
                               $field = $request->field;
                               $updatefield = $request->updatefield;
                               $empid = $saveempdata->id;
                               $saveprevempdatacount = previousEmployment::where('field',$updatefield)->where('employment_history_id',$empid)->count();
                                $saveprevempdatacount1 = previousEmployment::where('field',$field)->where('employment_history_id',$empid)->count();

                               if($saveprevempdatacount >0){
                              $saveprevempdata = previousEmployment::where('field',$updatefield)->where('employment_history_id',$empid)->first();
                              
                                if($request->has('previous_date_started') && null <> $request->previous_date_started) {
                                $saveprevempdata->previous_date_started = $request->previous_date_started;
                              }
                               if($request->has('previous_date_left') && null <> $request->previous_date_left) {
                                $saveprevempdata->previous_date_left = $request->previous_date_left;
                              }
                               if($request->has('name_of_employer') && null <> $request->name_of_employer) {
                                $saveprevempdata->name_of_employer = $request->name_of_employer;
                                 }
                                 if($request->has('previous_address') && null <> $request->previous_address) {
                                $saveprevempdata->previous_address = $request->previous_address;
                              }
                              if($request->has('reason_for_leaving') && null <> $request->reason_for_leaving) {
                              $saveprevempdata->reason_for_leaving = $request->reason_for_leaving;
                              }
                               if($request->has('main_duty') && null <> $request->main_duty) {
                                $saveprevempdata->main_duty = $request->main_duty;
                                 }

                                 $saveprevempdata->save();
                              }
                                
                                elseif(!$saveprevempdatacount1){
                                   $saveprevempdata1 = new previousEmployment;
                                $saveprevempdata1->field = $field;
                                $saveprevempdata1->previous_date_started = $request->previous_date_started;   
                               $saveprevempdata1->employment_history_id = $saveempdata->id;
                                $saveprevempdata1->previous_date_left = $request->previous_date_left;
                                $saveprevempdata1->name_of_employer = $request->name_of_employer;
                                $saveprevempdata1->previous_address = $request->previous_address;
                                $saveprevempdata1->reason_for_leaving = $request->reason_for_leaving;
                                $saveprevempdata1->main_duty = $request->main_duty;
                                 $saveprevempdata1->save();
                                
                                }  else {
                                $field = $request->field;
                                $empid = $saveempdata->id;
                               $saveprevempdata2 = previousEmployment::where('field',$field)->where('employment_history_id',$empid)->first();
                                if($request->has('previous_date_started') && null <> $request->previous_date_started) {
                                $saveprevempdata2->previous_date_started = $request->previous_date_started;
                              }
                               if($request->has('previous_date_left') && null <> $request->previous_date_left) {
                                $saveprevempdata2->previous_date_left = $request->previous_date_left;
                              }
                               if($request->has('name_of_employer') && null <> $request->name_of_employer) {
                                $saveprevempdata2->name_of_employer = $request->name_of_employer;
                                 }
                                 if($request->has('previous_address') && null <> $request->previous_address) {
                                $saveprevempdata2->previous_address = $request->previous_address;
                              }
                              if($request->has('reason_for_leaving') && null <> $request->reason_for_leaving) {
                              $saveprevempdata2->reason_for_leaving = $request->reason_for_leaving;
                              }
                               if($request->has('main_duty') && null <> $request->main_duty) {
                                $saveprevempdata2->main_duty = $request->main_duty;
                                 }
                               $saveprevempdata2->save();
                              }
                            
                         
                         }
                
                 } else {
                        $this->validate($request,[
                        'address' => 'required',
                        'postcode' => 'required',
                        'job_title' => 'required',
                        'salary' => 'required',
                        'date_started' => 'required'
                   ]); 
               
                   $userid = Auth::guard('member')->user()->id;
                   $jobid = $request->job_id;
                   $jobstepup =JobStep::where('user_id',$userid)->where('job_id',$jobid)->where('step',2)->count();
                    if(!$jobstepup){
                    $saveajobstep = new JobStep;
                    
                    $saveajobstep->job_id =  $jobid;
                    $saveajobstep->user_id =  $userid;
                    $saveajobstep->step = 2;
                    $saveajobstep->is_completed = '1';
                    $saveajobstep->save();
                    }else {
                     $userid = Auth::guard('member')->user()->id;
                   $jobid = $request->job_id;
                   $saveajobstep =JobStep::where('user_id',$userid)->where('job_id',$jobid)->where('step',2)->first();
                    $saveajobstep->job_id =  $jobid;
                    $saveajobstep->user_id =  $userid;
                    $saveajobstep->step = 2;
                    $saveajobstep->is_completed = '1';
                    $saveajobstep->save();

                    }

                   return redirect()->route('qualificationeducation',['jobid' => $jobid]);


                 }

           } 


       //Save Educaton details

       public function saveEducationDetails(Request $request)
       {

            if($request->ajax()){
             $userid = Auth::guard('member')->user()->id;
             $jobid = $request->job_id;

             $checlCon = Education::where('job_id',$jobid)->where('user_id',$userid)->count();
                    if(!$checlCon) {
                      $edudetailsdata = new Education;
                      $edudetailsdata->user_id = $userid;
                      $edudetailsdata->job_id = $jobid;
                     if($request->has('qualified_teacher_status')){
                        $edudetailsdata->qualified_teacher_status = $request->qualified_teacher_status;
                         }
                        $edudetailsdata->save();
                        $saveprimdata = new SecondaryQualification;
                             $saveprimdata->secondary_id = $edudetailsdata->id;
                             $saveprimdata->field = $request->field;
                             $saveprimdata->name_of_college = $request->name_of_college;
                             $saveprimdata->pri_date_from = $request->pri_date_from;
                             $saveprimdata->pri_date_to = $request->pri_date_to;
                             $saveprimdata->pri_exam_pass_quali = $request->pri_exam_pass_quali;
                             $saveprimdata->save();
                       
                    }else {
                           $userid = Auth::guard('member')->user()->id;
                           $jobid = $request->job_id;
                           $edudetailsdata = Education::where('job_id',$jobid)->where('user_id',$userid)->first();
                           if($request->has('qualified_teacher_status')){
                             $edudetailsdata->qualified_teacher_status = $request->qualified_teacher_status;
                          }
                          $edudetailsdata->save();


                         //Update Secondary school details check and updte and insert
                          $field = $request->field;
                          $updatefield = $request->updatefield;
                          $eduids = $edudetailsdata->id;
                          $saveeduupdatecount = SecondaryQualification::where('field',$updatefield)->where('secondary_id',$eduids)->count();
                          $saveedudatacount = SecondaryQualification::where('field',$field)->where('secondary_id',$eduids)->count();
                               if($saveeduupdatecount >0) {
                               $saveedudata = SecondaryQualification::where('field',$updatefield)->where('secondary_id',$eduids)->first(); 
                             $saveedudata->secondary_id =$edudetailsdata->id;
                              if($request->has('name_of_college') && null <> $request->name_of_college) {
                              $saveedudata->name_of_college = $request->name_of_college;
                              }
                              if($request->has('pri_date_from') && null <> $request->pri_date_from) {
                              $saveedudata->pri_date_from = $request->pri_date_from;
                              }

                              if($request->has('pri_date_to') && null <> $request->pri_date_to) {
                              $saveedudata->pri_date_to = $request->pri_date_to;
                              }
                                if($request->has('pri_exam_pass_quali') && null <> $request->pri_exam_pass_quali) {
                              $saveedudata->pri_exam_pass_quali = $request->pri_exam_pass_quali;
                              }
                              $saveedudata->save();
                              //Insert Query
                          } elseif(!$saveedudatacount){ 
                           
                             $saveprimdata = new SecondaryQualification;
                             $saveprimdata->secondary_id = $edudetailsdata->id;
                             $saveprimdata->field = $request->field;
                             $saveprimdata->name_of_college = $request->name_of_college;
                             $saveprimdata->pri_date_from = $request->pri_date_from;
                             $saveprimdata->pri_date_to = $request->pri_date_to;
                             $saveprimdata->pri_exam_pass_quali = $request->pri_exam_pass_quali;
                             $saveprimdata->save();
                             }else {
                              $field = $request->field;
                              $eduids = $edudetailsdata->id;
                              $saveedudata = SecondaryQualification::where('field',$field)->where('secondary_id',$eduids)->first(); 
                             $saveedudata->secondary_id =$edudetailsdata->id;
                             
                              if($request->has('name_of_college') && null <> $request->name_of_college) {
                              $saveedudata->name_of_college = $request->name_of_college;
                              }
                              if($request->has('pri_date_from') && null <> $request->pri_date_from) {
                              $saveedudata->pri_date_from = $request->pri_date_from;
                              }

                              if($request->has('pri_date_to') && null <> $request->pri_date_to) {
                              $saveedudata->pri_date_to = $request->pri_date_to;
                              }
                                if($request->has('pri_exam_pass_quali') && null <> $request->pri_exam_pass_quali) {
                              $saveedudata->pri_exam_pass_quali = $request->pri_exam_pass_quali;
                              }
                              $saveedudata->save();

                          }
                          $fieldnext = $request->fieldnext;
                          $updatefieldnext = $request->updatefieldnext;
                          $profid = $edudetailsdata->id;
                          $updatedata = ProfessionalQualification::where('fieldnext',$updatefieldnext)->where('pro_qua_id',$profid)->count();
                          $saveedudatacount = ProfessionalQualification::where('fieldnext',$fieldnext)->where('pro_qua_id',$profid)->count();
                          //Update count

                           if($updatedata >0){
                              $saveedudata = ProfessionalQualification::where('fieldnext',$fieldnext)->where('pro_qua_id',$profid)->first(); 
                             $saveedudata->pro_qua_id = $edudetailsdata->id;
                              if($request->has('prof_date_from') && null <> $request->prof_date_from) {
                              $saveedudata->prof_date_from = $request->prof_date_from;
                              }
                              if($request->has('prof_date_to') && null <> $request->prof_date_to) {
                              $saveedudata->prof_date_to = $request->prof_date_to;
                              }

                              if($request->has('prof_quali_obtained') && null <> $request->prof_quali_obtained) {
                              $saveedudata->prof_quali_obtained = $request->prof_quali_obtained;
                              }
                              $saveedudata->save();

                             }
                               else if(!$saveedudatacount) {
                               $saveprimdata = new ProfessionalQualification;
                             $saveprimdata->pro_qua_id = $edudetailsdata->id;
                             $saveprimdata->fieldnext = $request->fieldnext;
                             if($request->has('prof_date_from') && null <> $request->prof_date_from) {
                              $saveprimdata->prof_date_from = $request->prof_date_from;
                              }
                              if($request->has('prof_date_to') && null <> $request->prof_date_to) {
                              $saveprimdata->prof_date_to = $request->prof_date_to;
                              }
                                if($request->has('prof_quali_obtained') && null <> $request->prof_quali_obtained) {
                              $saveprimdata->prof_quali_obtained = $request->prof_quali_obtained;
                              }
                              $saveprimdata->save();
                               
                              //Insert Query
                          } else {
                             $fieldnext = $request->fieldnext;
                              $profid = $edudetailsdata->id;
                             $saveedudata = ProfessionalQualification::where('fieldnext',$fieldnext)->where('pro_qua_id',$profid)->first(); 
                             $saveedudata->pro_qua_id = $edudetailsdata->id;
                              if($request->has('prof_date_from') && null <> $request->prof_date_from) {
                              $saveedudata->prof_date_from = $request->prof_date_from;
                              }
                              if($request->has('prof_date_to') && null <> $request->prof_date_to) {
                              $saveedudata->prof_date_to = $request->prof_date_to;
                              }

                              if($request->has('prof_quali_obtained') && null <> $request->prof_quali_obtained) {
                              $saveedudata->prof_quali_obtained = $request->prof_quali_obtained;
                              }
                              $saveedudata->save();
                          }
                     }

            }else {

                $userid = Auth::guard('member')->user()->id;
                   $jobid = $request->job_id;
                   $jobstepup =JobStep::where('user_id',$userid)->where('job_id',$jobid)->where('step',3)->count();
                    if(!$jobstepup){
                    $saveajobstep = new JobStep;
                    
                    $saveajobstep->job_id =  $jobid;
                    $saveajobstep->user_id =  $userid;
                    $saveajobstep->step = 3;
                    $saveajobstep->is_completed = '1';
                    $saveajobstep->save();
                    }else {
                     $userid = Auth::guard('member')->user()->id;
                   $jobid = $request->job_id;
                   $saveajobstep =JobStep::where('user_id',$userid)->where('job_id',$jobid)->where('step',3)->first();
                    $saveajobstep->job_id =  $jobid;
                    $saveajobstep->user_id =  $userid;
                    $saveajobstep->step = 3;
                    $saveajobstep->is_completed = '1';
                    $saveajobstep->save();

                    }

                   return redirect()->route('personalstatement',['jobid' => $jobid]);
            }
       } 

       public function checkemail(Request $request){

            if($request->ajax()) {

                $email = $request->email;

                $checkcount = Member::where('email',$email)->count();
                   
                  if($checkcount > 0) {
                     return 1;
                  } else {
                     return 0;
                  }



            }   

       }

       public function displayRegisterUser()

        {
            $unq_job_byid = JobStep::where('user_id')->distinct()->count();
            echo $unq_job_byid;die;
         
        }
       

}