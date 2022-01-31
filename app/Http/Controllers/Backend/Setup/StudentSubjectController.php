<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentSubject;
use Illuminate\Http\Request;

class StudentSubjectController extends Controller
{
    public function ViewStudentSubject(){
        $data['allData'] = StudentSubject::all();
        return view('backend.setup.student_subject.view_student_subject',$data);
    } 

    // add subject 

    public function AddStudentSubject(){
        return view('backend.setup.student_subject.add_student_subject');
    }

         // store

    public function StoreStudentSubject(Request $request){

        $validateData = $request->validate([
        'name' => 'required|unique:student_subjects,name',
                    
        ]);
        $data = new StudentSubject();
        $data->name = $request->name;
        $data->save();
        
        $notification = array(
        'message' => 'Subject inserted Successfully',
        'alert-type' => 'success',
        );
        
        return redirect()->route('student.subject.view')->with($notification);
        
    }

    // edit

    public function EditStudentSubject($id){
        $editData = StudentSubject::find($id);
        return view('backend.setup.student_subject.edit_student_subject',compact('editData'));
    }

    // update

    public function UpdateStudentSubject(Request $request,$id){

        $data = StudentSubject::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:student_subjects,name,'.$data->id
            
        ]);
        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Subject Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.subject.view')->with($notification);

    } 

    //delete

    public function DeleteStudentSubject($id){
        $user = StudentSubject::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Subject deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.subject.view')->with($notification);


    }



}
