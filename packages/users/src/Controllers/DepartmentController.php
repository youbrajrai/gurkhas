<?php

namespace User\Controllers;

use App\Http\Controllers\CrudController;
use Illuminate\Http\Request;
use User\Models\Department;
class DepartmentController extends CrudController
{
    public function __construct(Request $request,Department $department)
    {
        $validation_rule[0] =[
            'title' => ['required','unique:departments'],
        ];
        $validation_rule[1] =[
            'title' => ['required','unique:departments,title,'.$request->route('department')],
        ];
        parent::__construct($request,'User::department',$validation_rule,$department);
    }
}
