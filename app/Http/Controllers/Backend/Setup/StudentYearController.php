<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearController extends Controller
{
    public function ViewYear(){
        $data['allData'] = StudentYear::all();
        return view('backend.setup.year.view_year',$data);
    }

        // add Year 

        public function StudentYearAdd(){
            return view('backend.setup.year.add_year');
        }

        // store

    public function StudentYearStore(Request $request){

        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name',
            
        ]);
        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Year inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.year.view')->with($notification);

    }

     // edit

     public function StudentYearEdit($id){
        $editData = StudentYear::find($id);
        return view('backend.setup.year.edit_year',compact('editData'));
    }

    // update

    public function StudentYearUpdate(Request $request,$id){

        $data = StudentYear::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name,'.$data->id
            
        ]);
        
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student year Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.year.view')->with($notification);

    }

    //delete

    public function StudentYearDelete($id){
        $user = StudentYear::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Year deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.year.view')->with($notification);


    }
}
