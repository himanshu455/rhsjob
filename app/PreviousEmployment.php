<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreviousEmployment extends Model
{
     protected $fillable = ['previous_date_started','previous_date_left','name_of_employer','previous_address','reason_for_leaving','main_duty','employment_gap_details'];

      public function previousEmp() 
    {
    	return $this->belongsTo('App\EmploymentHistory');
    }
}
