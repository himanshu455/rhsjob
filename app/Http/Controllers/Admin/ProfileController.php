<?php

namespace App\Http\Controllers\Admin;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;

class ProfileController extends Controller
{
    public function editProfile(){
       $profiledata = Auth::user();
       return view('admin.profile',compact('profiledata'));
    }
     public function editPassword(){
       return view('admin.password');
    }

    public function saveProfile(Request $request, $id){
        $this->validate($request,[
             'name' => 'required',
             'email' => "required|email|unique:users,email,$id"
        	]);
        $savedata = User::find($id);
        $savedata->name = $request->name;
        $savedata->email = $request->email;
        $savedata->save();
        return redirect()->back()->with('status','Profile updated successfuly')->with("class","success");

    }

   public function savePassword(Request $request){

        $this->validate($request,[
            'old_password' => 'required',
            'new_password' => 'required|min:4|confirmed',

        ]);

        if (!Hash::check($request->old_password,Auth::user()->password)) {
            return redirect()->back()->with('status', 'Old Password Mismatch');
        }

       $old_pass = $request->old_password;
       $new_pass = $request->new_password;
       $conf_pass = $request->new_password_confirmation;

       $conf_pass = Hash::make($new_pass);

       $user = User::where('email',Auth::user()->email)->first();
       $user->password = $conf_pass;

       if ($user->save()) {
         return redirect()->back()->with('status', 'Password changed Successfully!')->with("class","success");  
       }

    }
}
