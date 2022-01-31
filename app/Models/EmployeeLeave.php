<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLeave extends Model
{
    public function user(){
        return $this->belongsTo(User::class,'employee_id','id');
    }

    public function purpose(){
        return $this->belongsTo(LeavePurposes::class,'leave_purposes_id','id');
    }
}
