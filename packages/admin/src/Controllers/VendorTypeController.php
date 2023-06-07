<?php

namespace Admin\Controllers;

use App\Http\Controllers\CrudController;
use Illuminate\Http\Request;
use Admin\Models\VendorType;
class VendorTypeController extends CrudController
{
    public function __construct(Request $request,VendorType $vendortype)
    {
        $validation_rule[0] =[
            'title' => ['required','unique:vendor_types'],
        ];
        $validation_rule[1] =[
            'title' => ['required','unique:vendor_types,title,'.$request->route('vendortype')],
        ];
        parent::__construct($request,'Admin::vendortype',$validation_rule,$vendortype);
    }
}
