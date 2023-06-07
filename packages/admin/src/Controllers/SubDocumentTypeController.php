<?php

namespace Admin\Controllers;

use Illuminate\Http\Request;
use Admin\Models\DocumentType;
use Illuminate\Validation\Rule;
use Admin\Models\SubDocumentType;
use App\Http\Controllers\CrudController;

class SubDocumentTypeController extends CrudController
{
    public function __construct(Request $request, SubDocumentType $subdocumenttype, DocumentType $documenttype)
    {
        $validation_rule[0] = [
            'title' => [
                'required', Rule::unique('sub_document_types')->where(function ($query) use ($request) {
                    $query->where('document_type_id', $request->document_type_id);
                })
            ],
            'document_type_id' => ['required']
        ];
        $validation_rule[1] = [
            'title' => [
                'required', Rule::unique('sub_document_types')->where(function ($query) use ($request) {
                    $query->where('document_type_id', $request->document_type_id);
                })
            ],
            'document_type_id' => ['required']
        ];
        parent::__construct($request, 'Admin::subdocumenttype', $validation_rule, $subdocumenttype, $documenttype);
    }
}
