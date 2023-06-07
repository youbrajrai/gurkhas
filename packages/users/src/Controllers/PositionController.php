<?php

namespace User\Controllers;

use App\Http\Controllers\CrudController;
use Illuminate\Http\Request;
use User\Models\Position;
class PositionController extends CrudController
{
    public function __construct(Request $request,Position $position)
    {
        $validation_rule[0] =[
            'title' => ['required','unique:positions'],
        ];
        $validation_rule[1] =[
            'title' => ['required','unique:positions,title,'.$request->route('position')],
        ];
        parent::__construct($request,'User::position',$validation_rule,$position);
    }
}
