<?php

namespace Admin\Controllers;

use App\Http\Controllers\CrudController;
use Illuminate\Http\Request;
use Admin\Models\NoticeType;
class NoticeTypeController extends CrudController
{
    public function __construct(Request $request,NoticeType $noticetype)
    {
        $validation_rule[0] =[
            'title' => ['required','unique:notice_types'],
        ];
        $validation_rule[1] =[
            'title' => ['required','unique:notice_types,title,'.$request->route('noticetype')],
        ];
        parent::__construct($request,'Admin::noticetype',$validation_rule,$noticetype);
    }
}
