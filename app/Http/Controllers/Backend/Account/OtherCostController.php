<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentYear;
use App\Models\AccountOtherCost;

class OtherCostController extends Controller
{
    //view

    public function OtherCostView(){
        $data['allData'] = AccountOtherCost::orderBy('id','DESC')->get();
        return view('backend.account.other_cost.other_cost_view',$data);
    }

    // add

    public function OtherCostAdd(){
         return view('backend.account.other_cost.other_cost_add');
    }

    // store data

    public function OtherCostStore(Request $request){

        $cost = new AccountOtherCost();
        $cost->date = date('Y-m-d',strtotime($request->date));
        $cost->amount = $request->amount;

        if ($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/cost_images'),$filename );
            $cost['image'] = $filename;
        }

        $cost->description = $request->description;
        $cost->save();

        $notification = array(
            'message' => 'Other Cost Inserted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('other.cost.view')->with($notification);


    }

    // edit

    public function OtherCostEdit($id){

        $data['editData'] = AccountOtherCost::find($id);
        return view('backend.account.other_cost.other_cost_edit',$data);

    }

    // update

    public function OtherCostUpdate(Request $request,$id){

        $cost = AccountOtherCost::find($id);
        $cost->date = date('Y-m-d',strtotime($request->date));
        $cost->amount = $request->amount;

        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/cost_images/'.$cost->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/cost_images'),$filename );
            $cost['image'] = $filename;
        }

        $cost->description = $request->description;
        $cost->save();

        $notification = array(
            'message' => 'Other Cost Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('other.cost.view')->with($notification);

    }



}
