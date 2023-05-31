<?php

namespace Pages\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;
use Pages\Models\Leave;
use App\Models\User;
class LeaveController extends CrudController
{
    public function __construct(Request $request,Leave $leave,User $user)
    {
        $validation_rule[0] =[
            'user_id' => ['required'],
            'leave_from' => ['required'],
            'leave_to' => ['required'],
            'leave_type' => ['required']

        ];
        $validation_rule[1] =[
            'user_id' => ['required'],
            'leave_from' => ['required'],
            'leave_to' => ['required'],
            'leave_type' => ['required']

        ];
        parent::__construct($request,'Pages::leave',$validation_rule,$leave,$user);
    }
}
