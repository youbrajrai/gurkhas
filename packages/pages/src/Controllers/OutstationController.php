<?php

namespace Pages\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;
use Pages\Models\Outstation;
use App\Models\User;
class OutstationController extends CrudController
{
    public function __construct(Request $request,Outstation $outstation,User $user)
    {
        $validation_rule[0] =[
            'user_id' => ['required'],
            'travel_place' => ['required','string', 'max:255'],
            'outtime' => ['required'],
            'estimated_return_time' => ['required'],
            'actual_return_time' => ['required'],
            'remarks' => ['nullable','string','max:255']

        ];
        $validation_rule[1] =[
            'user_id' => ['required'],
            'travel_place' => ['required','string', 'max:255'],
            'outtime' => ['required'],
            'estimated_return_time' => ['required'],
            'actual_return_time' => ['required'],
            'remarks' => ['nullable','string','max:255']

        ];
        parent::__construct($request,'Pages::outstation',$validation_rule,$outstation,$user);
    }
}
