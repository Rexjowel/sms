<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function UserView(){

        $data['allData'] = User::all();
        return view('backend.user.view_user',$data);
    }

    // add 

    public function UserAdd(){
        return view('backend.user.add_user');
    }

    // store

    public function UserStore(Request $request){
        $validateData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        $notification = array(
            'message' => 'User inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('user.view')->with($notification);
    }

    // edit

    public function UserEdit($id){
        $editData = User::find($id);
        return view('backend.user.edit_user',compact('editData'));
    }

    // update

    public function UserUpdate(Request $request, $id){
        $data = User::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('user.view')->with($notification);
    }

    //delete

    public function UserDelete($id){
        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'error',
        );

        return redirect()->route('user.view')->with($notification);
    }

}
