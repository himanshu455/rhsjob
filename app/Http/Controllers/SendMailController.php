<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\jobs;
use Auth;
use Mail;
use App\AppliedJob;
use App\PersonalInformation;
use App\EmploymentHistory;
use App\Education;
use App\PersonalStatement;
use App\Reference;
use App\WorkingWithChildren;
use App\CriminalConvitions;
use App\ReasonalAdjustment;
use App\Document;
use App\Declaration;
use PDF;
use PDFMerger;


class SendMailController extends Controller
{
  
 public function checkAlphabet($jobid)

 {
     $checkCharcount = DB::table('alphas')->count();
     if($checkCharcount > 0) {
         $checkChar = DB::table('alphas')->select('alpha_char')->first();

         if($checkChar!='A'){
         	   ++$checkChar->alpha_char; 
         	    DB::table('alphas')
            ->where('id', 1)
            ->update([
            	'alpha_char' =>  $checkChar->alpha_char
            	]);
         } 
               
          $dispChar = DB::table('alphas')->select('alpha_char')->first();
          $applicant = 	$dispChar->alpha_char;
         
         //Mail data
          $email_data['username'] =  'Applicant'. "  " . $applicant;
          $job = jobs::where('id',$jobid)->first();
           $userid = Auth::guard('member')->user()->id;
           $name = PersonalInformation::where('user_id',$userid)->where('job_id',$jobid)->first();

 

          $email_data['jobname'] = $job->job_title;
          $email_data['fullname'] = $name->fore_name;
          $useremailid = Auth::guard('member')->user()->email;
          $subjectuser = "Your aplication successfuly submited"; 
          $adminemailid = "himanshu02877@gmail.com";

          //Insert value in Table
          
          $data = new AppliedJob;
          $data->user_id =  $userid;
          $data->job_id =  $jobid;
          $data->letter = 'Applicant'. "  " . $applicant;
          if($data->save()){



           //Send Mail for User
          Mail::send('email.user-mail', array('email_data' => $email_data), function ($message) use ($useremailid, $subjectuser) {
                    $message->to($useremailid)->subject($subjectuser);
                    });



            //Send Mail for Admin
           Mail::send('email.user-admin-mail', array('email_data' => $email_data), function ($message) use ($adminemailid, $subjectuser) {
                    $message->to($adminemailid)->subject($subjectuser);
                    });
          
          return back()->with('mesg', 'Thank you for your application in respect of the above post.')->with('class', 'success');
        
       }
     }

 } 
    public function userGeneratePdf(Request $request)
     {
      
       $jobid = $request->jobid;
       $userid = Auth::guard('member')->user()->id;

      $personaldetailscount = PersonalInformation::where('user_id',$userid)->where('job_id',$jobid)->count();
       if($personaldetailscount) {
       $personaldetails = PersonalInformation::where('user_id',$userid)->where('job_id',$jobid)->get();
       } else {
          $personaldetails = array();
       }

        $emphistorydetailscount = EmploymentHistory::where('user_id',$userid)->where('job_id',$jobid)->count();
        if($emphistorydetailscount) {
       $emphistorydetails = EmploymentHistory::where('user_id',$userid)->where('job_id',$jobid)->get();
   }else {
           $emphistorydetails = array();
   }

       
       $Educationdetailscount = Education::where('user_id',$userid)->where('job_id',$jobid)->count();
       if($Educationdetailscount) {
       $Educationdetails = Education::where('user_id',$userid)->where('job_id',$jobid)->get();
        } else {
            $Educationdetails = array();
        }

       $personalstatementcount = PersonalStatement::where('user_id',$userid)->where('job_id',$jobid)->count();
       if($personalstatementcount) { 
       $personalstatement = PersonalStatement::where('user_id',$userid)->where('job_id',$jobid)->get();
   } else {
        $personalstatement = array();
   }

         $Referencecount = Reference::where('user_id',$userid)->where('job_id',$jobid)->count();
         if($Referencecount) {
        $Reference = Reference::where('user_id',$userid)->where('job_id',$jobid)->get();
      }

         $WorkingWithChildrencount = WorkingWithChildren::where('user_id',$userid)->where('job_id',$jobid)->count(); 
         if($WorkingWithChildrencount) {
        $WorkingWithChildren = WorkingWithChildren::where('user_id',$userid)->where('job_id',$jobid)->get();
    } else {
         $WorkingWithChildren = array();
    }

        
       $CriminalConvitionscount = CriminalConvitions::where('user_id',$userid)->where('job_id',$jobid)->count();
        if($CriminalConvitionscount) {
         $CriminalConvitions = CriminalConvitions::where('user_id',$userid)->where('job_id',$jobid)->get();
     }else {
         $CriminalConvitions = array();
     }

         $ReasonalAdjustmentcount = ReasonalAdjustment::where('user_id',$userid)->where('job_id',$jobid)->count();
          if($ReasonalAdjustmentcount) {
          $ReasonalAdjustment = ReasonalAdjustment::where('user_id',$userid)->where('job_id',$jobid)->get();
      }else {
         $ReasonalAdjustment = array();
      }
      $Declarationcount = Declaration::where('user_id',$userid)->where('job_id',$jobid)->count();
    if($Declarationcount) {
      $Declaration = Declaration::where('user_id',$userid)->where('job_id',$jobid)->first();
    } else {
      $Declaration = array();
    }
    $Declarationcount = Declaration::where('user_id',$userid)->where('job_id',$jobid)->count();
    if($Declarationcount) {
      $Declaration = Declaration::where('user_id',$userid)->where('job_id',$jobid)->get();
    } else {
      $Declaration = array();
    }

    $jobtitle = jobs::where('id',$jobid)->first();



   
   $pdf = PDF::loadView('jobpost.generatepdf',compact('personaldetails','emphistorydetails','Educationdetails','personalstatement','Reference','WorkingWithChildren','CriminalConvitions','ReasonalAdjustment','Declaration','jobtitle'));
        return $pdf->stream('details.pdf');

  }
}