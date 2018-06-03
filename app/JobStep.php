<?php

namespace App;
use App\jobs;

use Illuminate\Database\Eloquent\Model;

class JobStep extends Model
{
    public function getJobTitle($jobid)
    {
    	$title = jobs::where('id',$jobid)->first();
    	return $title;
    }
      public function getCompPer($job_id)
     {
        $user_id = auth()->guard('member')->user()->id;
        $count= self::where('job_id',$job_id)->where('user_id',$user_id)->where('is_completed','1')->count();
         return $count;
            
     }
}
