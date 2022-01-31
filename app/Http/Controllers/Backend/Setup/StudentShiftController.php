<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function ViewShift(){
        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.view_shift',$data);
    }

    //add 

    public function StudentShiftAdd(){
        return view('backend.setup.shift.add_shift');
    }

    // store

    public function StudentShiftStore(Request $request){

        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
            
        ]);
        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Shift inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.shift.view')->with($notification);

    }

    // edit

    public function StudentShiftEdit($id){
        $editData = StudentShift::find($id);
        return view('backend.setup.shift.edit_shift',compact('editData'));
    }

        // update

        public function StudentShiftUpdate(Request $request,$id){

            $data = StudentShift::find($id);
    
            $validateData = $request->validate([
                'name' => 'required|unique:student_shifts,name,'.$data->id
                
            ]);
            
            $data->name = $request->name;
            $data->save();
    
            $notification = array(
                'message' => 'Student Shift Updated Successfully',
                'alert-type' => 'success',
            );
    
            return redirect()->route('student.shift.view')->with($notification);
    
        }

            //delete

    public function StudentShiftDelete($id){
        $user = StudentShift::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Shift deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.shift.view')->with($notification);


    }
}
