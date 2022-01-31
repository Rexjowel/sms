<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use PDF;
use DB;

use App\Models\EmployeeSallaryLog;
use App\Models\Designation;

use App\Models\LeavePurposes;
use App\Models\EmployeeLeave;

class EmployeeLeaveController extends Controller
{

    public function LeaveView(){
        $data['allData'] = EmployeeLeave::orderBy('id','DESC')->get();
        return view ('backend.employee.employee_leave.employee_leave_view',$data);
    }

    // add

    public function LeaveAdd(){

        $data['employees'] = User::where('usertype','employee')->get();
        $data['leave_purposes'] = LeavePurposes::all();
        return view ('backend.employee.employee_leave.employee_leave_add',$data);

    }

    // store 

    public function LeaveStore(Request $request){

        if ($request->leave_purposes_id  == "0") {
            $Leavepurpose = new LeavePurposes();
            $Leavepurpose->name = $request->name;
            $Leavepurpose->save();
            $leave_purposes_id = $Leavepurpose->id;
        }else{
             $leave_purposes_id = $request->leave_purposes_id;
        }

        $data = new EmployeeLeave();
        $data->employee_id = $request->employee_id;
        $data->leave_purposes_id = $leave_purposes_id;
        $data->start_date = date('Y-m-d',strtotime($request->start_date));
        $data->end_date = date('Y-m-d',strtotime($request->end_date));
        $data->save();


         $notification = array(
        'message' => 'Employee Leave Data inserted Successfully',
        'alert-type' => 'success',
        );
        
        return redirect()->route('employee.leave.view')->with($notification);

    } 

    // edit

    public function LeaveEdit($id){
        $data['editData'] = EmployeeLeave::find($id);
        $data['employees'] = User::where('usertype','employee')->get();
        $data['leave_purposes'] = LeavePurposes::all();

        return view('backend.employee.employee_leave.employee_leave_edit',$data);
    }


    // update

    public function LeaveUpdate(Request $request,$id){

        if ($request->leave_purposes_id  == "0") {
            $Leavepurpose = new LeavePurposes();
            $Leavepurpose->name = $request->name;
            $Leavepurpose->save();
            $leave_purposes_id = $Leavepurpose->id;
        }else{
             $leave_purposes_id = $request->leave_purposes_id;
        }

        $data = EmployeeLeave::find($id);
        $data->employee_id = $request->employee_id;
        $data->leave_purposes_id = $leave_purposes_id;
        $data->start_date = date('Y-m-d',strtotime($request->start_date));
        $data->end_date = date('Y-m-d',strtotime($request->end_date));
        $data->save();


        $notification = array(
        'message' => 'Employee Leave Data Updated Successfully',
        'alert-type' => 'success',
        );
        
        return redirect()->route('employee.leave.view')->with($notification); 
    }

    // delete

    public function LeaveDelete($id){
        $leave = EmployeeLeave::find($id);
        $leave->delete();

        $notification = array(
        'message' => 'Employee Leave Data Deleted Successfully',
        'alert-type' => 'success',
        );
        
        return redirect()->route('employee.leave.view')->with($notification); 
    }




}
