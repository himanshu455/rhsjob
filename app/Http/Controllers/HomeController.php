<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        if(!Auth::guard('member')->check()){
           return view('front.create-jobs'); 
       } else {
        return redirect('/member/home');
       }
        
    }
}
