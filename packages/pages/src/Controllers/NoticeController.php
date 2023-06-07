<?php

namespace Pages\Controllers;

use Pages\Models\Notice;
use Admin\Models\NoticeType;
use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;

class NoticeController extends CrudController
{
    public function __construct(Request $request,Notice $notice,NoticeType $noticetype)
    {
        $validation_rule[0] =[
            'notice_type_id' => ['required'],
            'title' => ['required','string','max:255'],
            'description' => ['required','string','max:255'],
            'file' => ['required','mimes:pdf'],
            'on_date' => ['required']

        ];
        $validation_rule[1] =[
            'notice_type_id' => ['required'],
            'title' => ['required','string','max:255'],
            'description' => ['required','string','max:255'],
            'file' => ['mimes:pdf'],
            'on_date' => ['required']

        ];
        parent::__construct($request,'Pages::notice',$validation_rule,$notice,$noticetype);
    }
}
