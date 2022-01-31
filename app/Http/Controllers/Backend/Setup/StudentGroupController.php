<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function ViewGroup(){
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group',$data);
    }

    //add 

    public function StudentGroupAdd(){
        return view('backend.setup.group.add_group');
    }

    // store

    public function StudentGroupStore(Request $request){

        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name',
            
        ]);
        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Group inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('student.group.view')->with($notification);

    }

    // edit

    public function StudentGroupEdit($id){
        $editData = StudentGroup::find($id);
        return view('backend.setup.group.edit_group',compact('editData'));
    }

        // update

        public function StudentGroupUpdate(Request $request,$id){

            $data = StudentGroup::find($id);
    
            $validateData = $request->validate([
                'name' => 'required|unique:student_groups,name,'.$data->id
                
            ]);
            
            $data->name = $request->name;
            $data->save();
    
            $notification = array(
                'message' => 'Student Group Updated Successfully',
                'alert-type' => 'success',
            );
    
            return redirect()->route('student.group.view')->with($notification);
    
        }

            //delete

    public function StudentGroupDelete($id){
        $user = StudentGroup::find($id);
        $user->delete();

        $notification = array(
            'message' => 'Student Group deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('student.group.view')->with($notification);


    }

}
