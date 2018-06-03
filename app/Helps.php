<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\JobStep;
use Auth;
use App\jobs;
use App\PreviousEmployment;
use App\SecondaryQualification;
use App\ProfessionalQualification;
use App\AppliedJob;
use App\PersonalInformation;
use App\WorkingWithChildren;
class Helps extends Model
{
   public function getStep() {
   $userid = Auth::guard('member')->user()->id;
   $jobid = request('id');
   $arr = [];
   $datacount = JobStep::where('user_id',$userid)->where('job_id',$jobid)->where('is_completed',1)->count();
  
  if($datacount > 0){
    $data = JobStep::where('user_id',$userid)->where('job_id',$jobid)->where('is_completed',1)->get();
     foreach ($data as $key) {
      $arr[] = $key->step;
    }
     return $arr;
    } else {
      return $arr;
    }


  }

    public function completeJob()

    {      $unq_job_byid = array();
           $userid = Auth::guard('member')->user()->id;
          // $allcomjobcount = JobStep::where('user_id',$userid)->where('is_completed',1)->count();
          // raj
          $unq_job_byid = JobStep::where('user_id',$userid)->distinct()->get();
          return $unq_job_byid;

         
    }
    
        public function getJobTitle($job_applied)

    {
         $jobtitle = jobs::where('id',$job_applied)
                 ->select('job_title','id')
                 ->first();
          return $jobtitle;

    }

    public function previousEmployment($previd)
    {            
             $PreviousEmpcount = PreviousEmployment::where('employment_history_id',$previd)->count();
             if($PreviousEmpcount){
             $PreviousEmp = PreviousEmployment::where('employment_history_id',$previd)->get();
              }else{
                $PreviousEmp = array();
              }
             return $PreviousEmp;

    }

    public function secondaryEdu($secedu)

    {
           $seccount = SecondaryQualification::where('secondary_id',$secedu)->count();
             if($seccount){
             $secQal = SecondaryQualification::where('secondary_id',$secedu)->get();
              }else{
                $secQal = array();
              }
             return $secQal;

    }
    public function professionalData($prof)
    {
        $pdatacount = ProfessionalQualification::where('pro_qua_id',$prof)->count();
             if($pdatacount){
             $profQli = ProfessionalQualification::where('pro_qua_id',$prof)->get();
              }else{
                $profQli = array();
              }
              return $profQli;

    }

    //Working with details
    public function workingwith($userid,$jobid)
    {
        $pdatacount = WorkingWithChildren::where('user_id',$userid)->where('job_id',$jobid)->count();
             if($pdatacount){
             $profQli = WorkingWithChildren::where('user_id',$userid)->where('job_id',$jobid)->get();
              }else{
                $profQli = array();
              }
              return $profQli;

    }

    

    //JobApplied

    public function getJobAppliedTitle($jobid)
    {
         $title = jobs::where('id',$jobid)->first();
          return $title->job_title;   
    }

    public function personalInformationdetails($userid,$jobid)
    {
       $details = PersonalInformation::where('user_id',$userid)->where('job_id',$jobid)->first();
       return $details;
    }


    public function getJobTitleHeader()
    {
        $userid = request()->id;
        $jobid = request()->jobid;
        $title = jobs::where('id',$jobid)->first();
          return $title->job_title; 
       
    }

     public function getJobLetter()
    {
        $userid = request()->id;
        $jobid = request()->jobid;
        $title = AppliedJob::where('user_id',$userid)->where('job_id',$jobid)->first();
          return $title; 
       
    }

    

}







