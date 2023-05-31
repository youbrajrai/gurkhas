<?php

namespace User\Controllers;

use App\Models\User;
use User\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;

class BranchController extends CrudController
{
    public function __construct(Request $request,Branch $branch,User $user)
    {
        $validation_rule[0] =[
            'branch_code' => ['required','unique:branches'],'title' => ['required','unique:branches'],'province' => ['required'],'district' => ['required'],'local_body' => ['required'],'ward_no' => ['required'],'link' => ['required'],'contact_no' => ['required'],'fax_no' => ['required'],'email' => ['required']
        ];
        $validation_rule[1] =[
            'branch_code' => ['required','unique:branches,branch_code,'.$request->route('branch')],'title' => ['required','unique:branches,title,'.$request->route('branch')],'province' => ['required'],'district' => ['required'],'local_body' => ['required'],'ward_no' => ['required'],'link' => ['required'],'contact_no' => ['required'],'fax_no' => ['required'],'email' => ['required']
        ];
        parent::__construct($request,'User::branch',$validation_rule,$branch,$user);
    }
}
