<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('index');
});

Route::get('home','HomeController@index')->name('index');
Route::post('checkemail','JobPostController@checkemail')->name('checkemail');

Route::group(['prefix' => 'member'], function () {
Route::get('/',function(){
  
  if (auth()->guard('member')->check()) {
    return redirect('/member/home');
  }else{
    return redirect()->route('index');  
  }
  
});
Route::get('/login', 'MemberAuth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'MemberAuth\LoginController@login');
Route::post('/logout', 'MemberAuth\LoginController@logout')->name('logout');
Route::get('/register', 'MemberAuth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'MemberAuth\RegisterController@register');
Route::post('/password/email', 'MemberAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
Route::post('/password/reset', 'MemberAuth\ResetPasswordController@reset')->name('password.email');
Route::get('/password/reset', 'MemberAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::get('/password/reset/{token}', 'MemberAuth\ResetPasswordController@showResetForm');
Route::get('/jobpost/{id}','JobPostController@index')->name('jobpost');
Route::get('/jobpost/{id}/employmenthistory','JobPostController@employmentHistory')->name('employmenthistory');
Route::get('/jobpost/{id}/qualificationeducation','JobPostController@qualificationEducation')->name('qualificationeducation');
Route::get('/jobpost/{id}/personalstatement','JobPostController@personalStatement')->name('personalstatement');

Route::get('/jobpost/{id}/references','JobPostController@references')->name('references');
Route::post('/savereference','JobPostController@saveReference')->name('savereference'); 
Route::get('/jobpost/{id}/workingwithchildren','JobPostController@workingWithChildren')->name('workingwithchildren');
Route::get('/jobpost/{id}/criminalconvitions','JobPostController@criminalConvitions')->name('criminalconvitions');

Route::post('/savecriminalconvitions','JobPostController@saveCriminalConvitions')->name('savecriminalconvitions'); 



Route::get('/jobpost/{id}/reasonaladjustment','JobPostController@reasonalAdjustment')->name('reasonaladjustment');
Route::post('/savereasonaladjustment','JobPostController@saveReasonalAdjustment')->name('savereasonaladjustment');

Route::get('/jobpost/{id}/declaration','JobPostController@declaration')->name('declaration');
Route::post('savepersonalinformation','JobPostController@savePersonalInformation')->name('savepersonalinformation');
Route::post('savepersonalstatement','JobPostController@savePersonalStatement')->name('savepersonalstatement'); 
Route::post('savedeclaration','JobPostController@saveDeclaration')->name('savedeclaration');
Route::get('/jobpost/{id}/documentuploads','JobPostController@documentUploads')->name('documentuploads');

Route::post('savedocuments','JobPostController@saveDocuments')->name('savedocuments');
Route::get('/delete/{id}','JobPostController@delete')->name('delete');
Route::post('saveworkingwithchild','JobPostController@saveWorkingWithChild')->name('saveworkingwithchild');

Route::post('emphistory','JobPostController@EmpHistory')->name('emphistory');
Route::post('saveeducationdetails','JobPostController@saveEducationDetails')->name('saveeducationdetails');
Route::get('sendmail/{id}','SendMailController@checkAlphabet')->name('sendmail');
Route::get('usergenetate-pdf/{jobid}','SendMailController@userGeneratePdf')->name('usergenetate-pdf');



}); 
Route::get('admin', function () {
    return redirect()->route('adminlogin');
});

Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\LoginController@showLoginForm')->name('adminlogin');
  Route::post('login', 'Auth\LoginController@login')->name('adminsslogin');
 // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
  Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  /*Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');*/
  Route::post('password/reset', 'Auth\ResetPasswordController@reset');
});

Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::resource('jobs','Admin\JobsController');
    Route::get('profile','Admin\ProfileController@editProfile')->name('profile');
    Route::get('password','Admin\ProfileController@editPassword')->name('password');
    Route::post('saveprofile/{id}','Admin\ProfileController@saveProfile')->name('saveprofile');
    Route::post('savepassword','Admin\ProfileController@savePassword')->name('savepassword');
    Route::post('logout', 'Auth\LoginController@logout')->name('adminloginlogout');
    Route::get('jobapplication','Admin\JobsController@jobapplication')->name('jobapplication');
    Route::get('userpersonalinformation/{id}/{jobid}','Admin\JobsController@userPersonalInformation')->name('userpersonalinformation');
    Route::get('adminemploymenthistory/{id}/{jobid}','Admin\JobsController@adminemploymentHistory')->name('adminemploymenthistory');
     Route::get('admineduqualification/{id}/{jobid}','Admin\JobsController@adminEduQali')->name('admineduqualification');
Route::get('adminpersonalstatement/{id}/{jobid}','Admin\JobsController@adminPersonalStatement')->name('adminpersonalstatement');
Route::get('adminreferences/{id}/{jobid}','Admin\JobsController@adminReferences')->name('adminreferences');
Route::get('adminworkingwithchild/{id}/{jobid}','Admin\JobsController@adminWorkingWithChild')->name('adminworkingwithchild');
Route::get('admincriminalcon/{id}/{jobid}','Admin\JobsController@adminCriminalCon')->name('admincriminalcon');
Route::get('adminreasonaladjustment/{id}/{jobid}','Admin\JobsController@adminRegionalAdjustment')->name('adminreasonaladjustment');

Route::get('adminuploaddoc/{id}/{jobid}','Admin\JobsController@adminUploadDoc')->name('adminuploaddoc');
Route::get('admindeclartion/{id}/{jobid}','Admin\JobsController@adminDeclartion')->name('admindeclartion');

Route::get('applied-job-app','Admin\JobsController@AppliedJobApplication')->name('applied-job-app');
Route::get('updatestatus','Admin\JobsController@updateStatus')->name('updatestatus');
Route::get('archivestatus','Admin\JobsController@archiveStatus')->name('archivestatus');


// Archive
Route::get('archive-job-app','Admin\JobsController@ArchivedJobApplication')->name('archive-job-app');


//Print pdf url
Route::get('print-pdf','Admin\JobsController@printAppliedJobs')->name('print-pdf');
Route::get('print-pdf-status','Admin\JobsController@printPdfStatus')->name('print-pdf-status');

//Pdf generate

Route::post('generate-pdf','Admin\JobsController@generatePdf')->name('generate-pdf');


    

    
});




