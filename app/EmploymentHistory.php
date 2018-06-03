<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentHistory extends Model
{
    public function employmentHistory()

    {
    	 return $this->hasMany('App\PreviousEmployment','employment_history_id');
    }
}
