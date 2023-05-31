<?php

namespace Admin\Controllers;

use App\Http\Controllers\CrudController;
use Illuminate\Http\Request;
use Admin\Models\CommitteeLevel;
class CommitteeLevelController extends CrudController
{
    public function __construct(Request $request,CommitteeLevel $committeelevel)
    {
        $validation_rule[0] =[
            'title' => ['required','unique:committee_levels'],
        ];
        $validation_rule[1] =[
            'title' => ['required','unique:committee_levels,title,'.$request->route('committeelevel')],
        ];
        parent::__construct($request,'Admin::committeelevel',$validation_rule,$committeelevel);
    }
}
