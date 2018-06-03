<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use File;
use App\Course;
use App\Subject;
use App\Topic;
use App\InstituteUsers;
use App\CourseFile;
use App\CourseRelatedUserType;
use App\CourseRelatedSubject;
use App\CourseRelatedTopic;
use App\CourseRelatedCourse;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->can('view-course')) {
            
            $courses = Course::all();

            return view('admin.course_list',compact('courses'));

        } else {

            return redirect('/admin/dashboard')->with('status', 'Access Denied!')->with('class', 'danger');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('create-course')) {
            
            $subjects = Subject::all();
            $topics = Topic::all();
            $courses = Course::all();
            $user_types = InstituteUsers::all();            

            return view('admin.create_course',compact(['subjects', 'topics', 'user_types', 'courses']));

        } else {

            return redirect('/admin/dashboard')->with('status', 'Access Denied!')->with('class', 'danger');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->can('create-course')) {            
            
            $this->validate($request,[

                'course_title' => 'required|min:5|unique:courses',
                'service_type' => 'required',                
                'short_description' => 'required|min:20',
                'description' => 'required|min:20',
                'benefits' => 'required|min:20',
                'course_file.*' => 'sometimes|mimes:pdf,docx,xls',
                'course_banner' => 'sometimes|image',
                'course_author' => 'required|min:3',
                'course_author_image' => 'required|image',
                
            ]);        

            $course = new Course;
            $course->course_title = $request->course_title;
            $course->course_slug = str_slug($request->course_title,'-');
            $course->service_type = $request->service_type;

            if ($course->service_type == '1') {
                $course->course_price = $request->course_price;    
            }

            $course->short_description = $request->short_description;
            $course->description = $request->description;
            $course->benefits = $request->benefits;

            if ($request->hasFile('course_banner')) {
                
                $imageName = time().'.'.$request->course_banner->getClientOriginalExtension();
                $request->course_banner->move(public_path('BannerUploads'), $imageName);
                
                $course_banner_path = "BannerUploads/".$imageName;
            } else {
                $course_banner_path = '';
            }

            $course->course_banner = $course_banner_path;
            $course->course_author = $request->course_author;

            if ($request->hasFile('course_author_image')) {
                
                $imageName = time().'.'.$request->course_author_image->getClientOriginalExtension();
                $request->course_author_image->move(public_path('AuthorUploads'), $imageName);
                
                $ca_image_path = "AuthorUploads/".$imageName;
            } else {

                $ca_image_path = '';
            }

            $course->course_author_image = $ca_image_path;
            $course->save();

            // Insert multiattached file        

            if ($request->hasFile('course_file')) {

                foreach ($request->course_file as $crfile) {
                    
                    $imageName = time().'.'.$crfile->getClientOriginalExtension();
                    $crfile->move(public_path('FileUploads'), $imageName);                   
                    
                    $craf = [
                        'file_name' => "FileUploads/".$imageName
                    ];
                    $course->coursefiles()->create($craf);
                    
                }            

            }

            // insert related user types

            if ($request->has('course_user_types')){
                foreach ($request->course_user_types as $crut) {
                    $cruta = [
                        'user_type_id' => $crut
                    ];
                    $course->courserelatedusertypes()->create($cruta);
                }
            }

            // insert related subjects

            if ($request->has('course_related_subject')){
                foreach ($request->course_related_subject as $crrs) {
                    $crrsa = [
                        'subject_id' => $crrs
                    ];
                    $course->courserelatedsubjects()->create($crrsa);
                }
            }

            // insert related topics

            if ($request->has('course_related_topic')){
                foreach ($request->course_related_topic as $crrt) {
                    $crrta = [
                        'topic_id' => $crrt
                    ];
                    $course->courserelatedtopics()->create($crrta);
                }
            }

            // insert related courese

            if ($request->has('course_related_course')){
                foreach ($request->course_related_course as $crrc) {
                    $crrca = [
                        'cours_id' => $crrc
                    ];
                    $course->courserelatedcourses()->create($crrca);
                }
            }

            return redirect()->route('courses.index')->with('status', 'Record Inserted Successfully!')->with('class', 'success');

        } else {

            return redirect('/admin/dashboard')->with('status', 'Access Denied!')->with('class', 'danger');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('edit-course')) {
            
            $course = Course::findorFail($id);

            $user_types = InstituteUsers::all();
            $crut = CourseRelatedUserType::where('course_id',$id)->pluck('user_type_id')->toArray();

            $subjects = Subject::all();
            $crsub = CourseRelatedSubject::where('course_id',$id)->pluck('subject_id')->toArray();

            $topics = Topic::all();
            $crtop = CourseRelatedTopic::where('course_id',$id)->pluck('topic_id')->toArray();

            $courses = Course::where('id','<>',$id)->get();
            $crcor = CourseRelatedCourse::where('course_id',$id)->pluck('cours_id')->toArray();
            
            return view('admin.edit_course',compact(['course','subjects','topics', 'courses', 'user_types', 'crut', 'crsub', 'crtop', 'crcor']));        

        } else{

            return redirect('/admin/dashboard')->with('status', 'Access Denied!')->with('class', 'danger');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->can('edit-course')) {            

            $this->validate($request,[

                'course_title' => "required|min:5|unique:courses,course_title,$id",
                'service_type' => 'required',                
                'short_description' => 'required|min:20',
                'description' => 'required|min:20',
                'benefits' => 'required|min:20',
                'course_file.*' => 'sometimes|mimes:pdf,docx,xls',
                'course_banner' => 'sometimes|image',
                'course_author' => 'required|min:3',
                'course_author_image' => 'sometimes|image',
                
            ]);

            $ucourse = Course::findorFail($id);            
            $ucourse->course_title = $request->course_title;
            $ucourse->course_slug = str_slug($request->course_title,'-');
            $ucourse->service_type = $request->service_type;

            if ($request->service_type == '1') {
                
                $ucourse->course_price = $request->course_price;

            } else {

                $ucourse->course_price = null;

            }

            $ucourse->short_description = $request->short_description;
            $ucourse->description = $request->description;
            $ucourse->benefits = $request->benefits;

            if ($request->hasFile('course_banner')) {
                
                $imageName = time().'.'.$request->course_banner->getClientOriginalExtension();
                $request->course_banner->move(public_path('BannerUploads'), $imageName);
                
                $crbfile_path = "BannerUploads/".$imageName;
            } else {

                $crbfile_path = $ucourse->course_banner;
            }

            $ucourse->course_banner = $crbfile_path;
            $ucourse->course_author = $request->course_author;

            if ($request->hasFile('course_author_image')) {
                
                $imageName = time().'.'.$request->course_author_image->getClientOriginalExtension();
                $request->course_author_image->move(public_path('AuthorUploads'), $imageName);
                
                $craimage_path = "AuthorUploads/".$imageName;
            } else {

                $craimage_path = $ucourse->course_author_image;
            }

            $ucourse->course_author_image = $craimage_path;
            $ucourse->save();

            if ($request->hasFile('course_file')) {

                foreach ($request->course_file as $crfile) {
                    
                    $imageName = time().'.'.$crfile->getClientOriginalExtension();
                    $crfile->move(public_path('FileUploads/'), $imageName);
                    
                    $crfilepath = "FileUploads/".$imageName;
                    $ca = [
                        'file_name' => $crfilepath
                    ];
                    $ucourse->coursefiles()->create($ca);
                    
                }            

            }

            // insert related user types

            if ( null <> $request->input('course_user_types')){

                $ucourse->courserelatedusertypes()->delete();

                foreach ($request->course_user_types as $cut) {
                    $cuta = [
                        'user_type_id' => $cut
                    ];
                    $ucourse->courserelatedusertypes()->create($cuta);
                }
            } else {

                $ucourse->courserelatedusertypes()->delete();
            }

            // insert related subjects

            if ( null <> $request->input('course_related_subject')){

                $ucourse->courserelatedsubjects()->delete();

                foreach ($request->course_related_subject as $crs) {
                    $cruta = [
                        'subject_id' => $crs
                    ];
                    $ucourse->courserelatedsubjects()->create($cruta);
                }
            } else {

                $ucourse->courserelatedsubjects()->delete();
            }

            // insert related topics

            if ( null <> $request->input('course_related_topic')){

                $ucourse->courserelatedtopics()->delete();

                foreach ($request->course_related_topic as $crrt) {
                    $uta = [
                        'topic_id' => $crrt
                    ];
                    $ucourse->courserelatedtopics()->create($uta);
                }
            } else {

                $ucourse->courserelatedtopics()->delete();
            }

            // insert related topics

            if ( null <> $request->input('course_related_course')){

                $ucourse->courserelatedcourses()->delete();

                foreach ($request->course_related_course as $crrc) {
                    $crrca = [
                        'cours_id' => $crrc
                    ];
                    $ucourse->courserelatedcourses()->create($crrca);
                }
            } else {

                $ucourse->courserelatedcourses()->delete();
            }

            return redirect()->route('courses.index')->with('status', 'Record Updated Successfully')->with('class', 'success');



        } else {

            return redirect('/admin/dashboard')->with('status', 'Access Denied!')->with('class', 'danger');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delcourse = Course::findorFail($id);
        $delcourse->delete();

        return redirect()->route('courses.index')->with('status', 'Record deleted successfully!')->with('class', 'success');
    }

    public function deleteAttachedFile($course_id,$file_id)
    {
        $delfres = CourseFile::findorFail($file_id);
        $file_path = public_path()."/".$delfres->file_name;
        File::delete($file_path);
        $delfres->delete();

        return redirect()->route('courses.edit',['id' => $course_id])->with('status', 'File deleted successfully!')->with('class', 'success');
    }
}
