<?php

namespace App;

use App\Notifications\MemberResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\JobStep;
use App\jobs;

class Member extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MemberResetPassword($token));
    }

    public function getUserEmail($user_id)
    {
        $email = Member::where('id',$user_id)->first();
        return $email->email;
    }

    public function getJobApplied($user_id)
    {  //SELECT job_id FROM job_steps WHERE user_id = '2' GROUP BY job_id
        
        
        $users = JobStep::where('user_id',$user_id)
                 ->select('job_id')
                ->groupBy('job_id')
                ->get();
          return $users;

    }

   
}
