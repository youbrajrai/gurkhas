<?php

namespace Pages\Controllers;

use Pages\Models\Document;
use Illuminate\Http\Request;
use Admin\Models\DocumentType;
use Admin\Models\SubDocumentType;
use App\Http\Controllers\CrudController;

class DocumentController extends CrudController
{
    public function __construct(Request $request,Document $document,DocumentType $documenttype,SubDocumentType $subdocumenttype)
    {
        $validation_rule[0] =[
            'sub_document_type_id' => ['required'],
            'title' => ['required'],
            'file.*' => ['required','mimes:pdf'],

        ];
        $validation_rule[1] =[
            'sub_document_type_id' => ['required'],
            'title' => ['required'],
            'file.*' => ['mimes:pdf']

        ];
        parent::__construct($request,'Pages::document',$validation_rule,$document,$documenttype,$subdocumenttype);
    }

    public function findSubDocument(Request $request){
        $data  = SubDocumentType::select('title','id')->where('document_type_id',$request->id)->get();
        return response()->json($data);
    }
}
