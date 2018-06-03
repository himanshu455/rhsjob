<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\jobs;
use App\JobStep;
use DB;
use App\Member;
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
use App\AppliedJob;
use PDF;
use PDFMerger;


class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alldata = jobs::all(); 
        return view('admin.list-jobs',compact('alldata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-jobs');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
             'job_title' => 'required|min:5',
             'job_desc'  => 'required',
             'job_go_live_date' => 'required',
             'job_close_date'  => 'required'
            ]);
        $jobs = new jobs;
        $jobs->job_title = $request->job_title;
        $jobs->job_desc = $request->job_desc;
        $jobs->job_go_live_date = $request->job_go_live_date;
        $jobs->job_close_date = $request->job_close_date;       
        $jobs->is_cover = $request->is_cover ? $request->is_cover : 0;
        $jobs->is_teaching = $request->is_teaching ? $request->is_teaching : 0;
        $jobs->ip_address = $request->ip();
        if($jobs->save()){
        return redirect()->route('jobs.index')->with('status', 'Job create successfully')->with('class', 'success');
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
        $editdata = jobs::findorfail($id); 
        return view('admin.edit-jobs',compact('editdata'));
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
         $this->validate($request,[
             'job_title' => 'required|min:5',
             'job_desc'  => 'required',
             'job_go_live_date' => 'required',
             'job_close_date'  => 'required'
            ]);
          $updatedata = jobs::findorfail($id);
          $updatedata->job_title = $request->job_title;
          $updatedata->job_desc = $request->job_desc;
          $updatedata->job_go_live_date = $request->job_go_live_date;
          $updatedata->job_close_date = $request->job_close_date;
          $updatedata->job_title = $request->job_title;
          $updatedata->is_cover = $request->is_cover ? $request->is_cover : 0;
          $updatedata->is_teaching = $request->is_teaching ? $request->is_teaching : 0;
          $updatedata->save();
            return redirect()->route('jobs.index')->with('status','Job updated successfully')->with('class','success');
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $deldata = jobs::findorfail($id);
       if($deldata->delete()){
       return redirect()->route('jobs.index')->with('status','Job delete successfully')->with('class','success');
      }
    }

    public function jobapplication()
     {
          $users = DB::table('job_steps')
                     ->select(DB::raw('user_id,count(is_completed) as completed'))
                     ->where('is_completed',1)
                     ->groupBy('user_id')
                     ->get();
                     foreach ($users as $key) {
                        if ($key->completed >= '10') {
                        $userid[] =  $key->user_id;
                            

                        } 
                       
                     } 
                 
                 $getAllData = Member::whereIn('id',$userid)->get();
               return view('admin.list-jobs-application',compact('getAllData'));
        
     } 


     public function userPersonalInformation($id,$job_id) 
     {   
         $personalinfo = PersonalInformation::where('user_id',$id)->where('job_id',$job_id)->first();
         return view('admin.personal-information',compact('personalinfo'));
          
     }

      public function adminemploymentHistory($id,$job_id) 
     {   
         $emphistory = EmploymentHistory::where('user_id',$id)->where('job_id',$job_id)->first();
         return view('admin.emphistory',compact('emphistory'));
          
     }
      public function adminEduQali($id,$job_id) 
     {   
         $education = Education::where('user_id',$id)->where('job_id',$job_id)->first();
         return view('admin.edu',compact('education'));
          
     }

     public function adminPersonalStatement($id,$job_id) 
     {   
         $personalstate = PersonalStatement::where('user_id',$id)->where('job_id',$job_id)->first();
         return view('admin.personalstate',compact('personalstate'));
          
     }

      public function adminReferences($id,$job_id) 
     {   
         $reference = Reference::where('user_id',$id)->where('job_id',$job_id)->first();
         return view('admin.reference',compact('reference'));
          
     }

      public function adminWorkingWithChild($id,$job_id) 
     {   
         $workingwith = WorkingWithChildren::where('user_id',$id)->where('job_id',$job_id)->get();
         return view('admin.working-with-children',compact('workingwith'));
          
     }

       public function adminCriminalCon($id,$job_id) 
     {   
         $criminalcon = CriminalConvitions::where('user_id',$id)->where('job_id',$job_id)->first();
         return view('admin.criminal-convention',compact('criminalcon'));
          
     }

      public function adminRegionalAdjustment($id,$job_id) 
     {   
         $reasonal = ReasonalAdjustment::where('user_id',$id)->where('job_id',$job_id)->first();
         return view('admin.reasonal-adjustment',compact('reasonal'));
          
     }

      public function adminUploadDoc($id,$job_id) 
     {   
         $docfile = Document::where('user_id',$id)->where('job_id',$job_id)->get();
         return view('admin.document-upload',compact('docfile'));
          
     }
      public function adminDeclartion($id,$job_id) 
     {   
         $declaration = Declaration::where('user_id',$id)->where('job_id',$job_id)->first();
         return view('admin.declaration',compact('declaration'));
          
     }


    //Display Applied jobs application

     public function AppliedJobApplication()

     {
         $appliedId = AppliedJob::where('archive','<>',1)->get();

         return view('admin.manage-application',compact('appliedId'));
     }

     // Archive jobs
      public function ArchivedJobApplication()

     {
         $appliedId = AppliedJob::where('archive','=',1)->get();

         return view('admin.archive-job',compact('appliedId'));
     }
   
   //Print Jobs

     public function printAppliedJobs()

     {
         $appliedId = AppliedJob::all();

         return view('admin.print-pdf',compact('appliedId'));
     }

     public function updateStatus(Request $request)
     {
          if ($request->ajax()) {
            $userid =  $request->userid;
            $status =  $request->statusvalue;
            $jobid =  $request->jobid;
            $updatestatus = AppliedJob::where('user_id',$userid)->where('job_id',$jobid)->first();
            $updatestatus->status = $status;
           if($updatestatus->save()) {
             echo "1";die;
           } else {
             echo "0";
           }

           

          }
     }

      public function archiveStatus(Request $request)
     {
          if ($request->ajax()) {
            $userid =  $request->userid;
            $archivestatus =  $request->archivestatus;
            $jobid =  $request->jobid;
            $updatestatus = AppliedJob::where('user_id',$userid)->where('job_id',$jobid)->first();
            $updatestatus->archive = $archivestatus;
           if($updatestatus->save()) {
             echo "1";die;
           } else {
             echo "0";
           }

           

          }
     }

      public function printPdfStatus(Request $request)
     {
          if ($request->ajax()) {
            $status =  $request->statusvalue;
            if($status==1)
            {
                 $appliedId = AppliedJob::all();
            }  if($status==2)
            {
                 $appliedId = AppliedJob::where('status',1)->get();
            }  if( $status==3)
            {
                 $appliedId = AppliedJob::where('status',2)->get();
            }
             
             return view('admin.ajax-view',compact('appliedId'));
               //echo  $appliedId;die;      

          }
     }


     public function generatePdf(Request $request)
     {
		$mydata = [];
		$readacted = $request->readacted; 
		$printDoc = $request->archive;
		$allid = $request->alldata;
		$cnt = count($allid);

		$Appliedid = AppliedJob::whereIn('id',$allid)->get()->toArray();
		
		
		$pdfMerger 	= 	new PDFMerger();
		$pageNo 	=	1;

		foreach ($Appliedid as $key => $value) {
			$userid	=	$value['user_id'];
			$jobid	=	$value['job_id'];
			
			$mydata		=	array();
			$mydatad	=	array();
			//Applicant letter
			if($readacted=='1') {
				$applicantLetter	=	AppliedJob::where('user_id',$userid)->where('job_id',$jobid)->get()->toArray();
				array_push($mydata, $applicantLetter);
			} else if($readacted=='2') {
				//$applicantLetter = AppliedJob::where('user_id',$userid)->where('job_id',$jobid)->get()->toArray();
				$applicantLetter = PersonalInformation::where('user_id',$userid)->where('job_id',$jobid)->get()->toArray();
				array_push($mydata, $applicantLetter);
			}

			//Job Title

			$jobtitle = jobs::where('id',$jobid)->get()->toArray();
			array_push($mydata, $jobtitle);

			$profile = PersonalInformation::where('user_id',$userid)->where('job_id',$jobid)->get()->toArray();

			array_push($mydata, $profile);

			$qualificationobtained = Education::where('user_id',$userid)->where('job_id',$jobid)->get()->toArray();
			array_push($mydata, $qualificationobtained);


			$personaldetails = PersonalInformation::where('user_id',$userid)->where('job_id',$jobid)->get()->toArray();

			array_push($mydata, $personaldetails);



			$emphistorydetails = EmploymentHistory::where('user_id',$userid)->where('job_id',$jobid)->get()->toArray();

			array_push($mydata, $emphistorydetails);


			$Educationdetails = Education::where('user_id',$userid)->where('job_id',$jobid)->get()->toArray();

			array_push($mydata, $Educationdetails);


			$personalstatement = PersonalStatement::where('user_id',$userid)->where('job_id',$jobid)->get()->toArray();
			array_push($mydata, $personalstatement);

			$Reference = Reference::where('user_id',$userid)->where('job_id',$jobid)->get()->toArray();

			array_push($mydata, $Reference);

			$WorkingWithChildren = WorkingWithChildren::where('user_id',$userid)->where('job_id',$jobid)->get()->toArray();

			array_push($mydata, $Appliedid);

			$CriminalConvitions = CriminalConvitions::where('user_id',$userid)->where('job_id',$jobid)->get()->toArray();

			array_push($mydata, $CriminalConvitions); 
			$ReasonalAdjustment = ReasonalAdjustment::where('user_id',$userid)->where('job_id',$jobid)->get()->toArray();

			array_push($mydata, $ReasonalAdjustment); 
			
			
			
			$pdfFile1Path = public_path().'/jobid-'.$jobid.'_userid-'.$userid.'.pdf';
			$pdf = PDF::loadView('admin.generatepdf',compact('mydata','cnt'));
			$pdf->save($pdfFile1Path);			
			$pageNo +=	$this->getNumPagesInPDF($pdfFile1Path);		
			$pdfMerger->addPDF($pdfFile1Path, 'all');
			
			
            if($printDoc) {
    			$Documentcount = Document::where('user_id',$userid)->where('job_id',$jobid)->count();
    			if($Documentcount) {
    				$Document = Document::where('user_id',$userid)->where('job_id',$jobid)->get();		
    				foreach($Document as $vv ) {
    					$documents		=	$vv->documents;
    					$pdfFile2Path	=	public_path().'/'.$documents;
    					$pageNo 		+=	$this->getNumPagesInPDF($pdfFile2Path);				
    					$pdfMerger->addPDF($pdfFile2Path, 'all');
    				}
    			}
            }

			$Declarationdetails = Declaration::where('user_id',$userid)->where('job_id',$jobid)->get()->toArray();
			array_push($mydatad, $Declarationdetails); 
			
			
			
			$cnt	=	1;
			$pdfFile3Path = public_path().'/jobid-'.$jobid.'_userid-'.$userid.'-declaration.pdf';		
			$pdf = PDF::loadView('admin.generatepdfdeclaration',compact('mydatad','cnt'));
			$pdf->save($pdfFile3Path);
			$pageNo +=	$this->getNumPagesInPDF($pdfFile3Path);		
			$pdfMerger->addPDF($pdfFile3Path, 'all');
			
			if($pageNo % 2 != 0) {
				$pdfFile4Path = public_path().'/lastpage-'.$jobid.'_userid-'.$userid.'.pdf';		
				$pdf = PDF::loadView('admin.generatepdfblank');
				$pdf->save($pdfFile4Path);
				$pdfMerger->addPDF($pdfFile4Path, 'all');
			}		
			
		}
		$pdfMerger->merge('browser', "mergedpdf".date("Y-m-d H:i:s").".pdf");
			
		unlink($pdfFile1Path);
		unlink($pdfFile3Path);				
		unlink($pdfFile4Path);
	}
	
	function getNumPagesInPDF($file) {
		if(!file_exists($file))return null;
		if (!$fp = @fopen($file,"r"))return null;
		$max=0;
		while(!feof($fp)) {
				$line = fgets($fp,255);
				if (preg_match('/\/Count [0-9]+/', $line, $matches)){
						preg_match('/[0-9]+/',$matches[0], $matches2);
						if ($max<$matches2[0]) $max=$matches2[0];
				}
		}
		fclose($fp);
		return (int)$max;
	}

    public function getJobTitle()
    {
        
    }
}
