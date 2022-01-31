<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\StudentSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;


class AssignSubjectController extends Controller
{
    public function ViewAssignSub(){
        // $data['allData'] = AssignSubject::all();
         $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
         return view('backend.setup.assign_subject.view_assign_subject',$data);
     }

    // add

    public function AddAssignSub(){
        $data['subjects'] = StudentSubject::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.assign_subject.add_assign_subject',$data);
    }

    // store

    public function StoreAssignSub(Request $request){
        $subjectCount  = count($request->subject_id);
        if ($subjectCount !=NULL) {
        for ($i=0; $i <$subjectCount ; $i++) { 
            $assign_subject = new AssignSubject();
            $assign_subject->class_id = $request->class_id;
            $assign_subject->subject_id = $request->subject_id[$i];
            $assign_subject->full_mark = $request->full_mark[$i];
            $assign_subject->pass_mark = $request->pass_mark[$i];
            $assign_subject->subjective_mark = $request->subjective_mark[$i];
            $assign_subject->save();
        }
        }

        $notification = array(
            'message' => ' Subject Assign Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('assign.subject.view')->with($notification);
    }  

    // edit 

    public function EditAssignSub($class_id){
        $data['editData'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
       // dd($data['editData']->toArray());
       $data['subjects'] = StudentSubject::all();
       $data['classes'] = StudentClass::all();
    	return view('backend.setup.assign_subject.edit_assign_subject',$data);
    }

     //update
     public function UpdateAssignSub(Request $request,$class_id){
    	if ($request->subject_id == NULL) {
       
        $notification = array(
    		'message' => 'Sorry You do not select any Subject ',
    		'alert-type' => 'error'
    	);

    	return redirect()->route('assign.subject.edit',$class_id)->with($notification);
    		 
    	}else{
    		 
    $countClass = count($request->subject_id);
	AssignSubject::where('class_id',$class_id)->delete(); 
    		for ($i=0; $i <$countClass ; $i++) { 
    			$assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();

    		} // End For Loop	 

    	}// end Else

       $notification = array(
    		'message' => 'Data Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('assign.subject.view')->with($notification);
    } // end Method 
    


        // details 

    public function DetailsAssignSub($class_id){
        $data['detailsData'] = AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        return view('backend.setup.assign_subject.details_assign_subject',$data);
     
        }

}
