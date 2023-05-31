<?php

namespace Admin\Controllers;

use App\Http\Controllers\CrudController;
use Illuminate\Http\Request;
use Admin\Models\DocumentType;
class DocumentTypeController extends CrudController
{
    public function __construct(Request $request,DocumentType $documenttype)
    {
        $validation_rule[0] =[
            'title' => ['required','unique:document_types'],
        ];
        $validation_rule[1] =[
            'title' => ['required','unique:document_types,title,'.$request->route('documenttype')],
        ];
        parent::__construct($request,'Admin::documenttype',$validation_rule,$documenttype);
    }
}
