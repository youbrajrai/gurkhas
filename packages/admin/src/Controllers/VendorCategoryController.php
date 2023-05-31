<?php

namespace Admin\Controllers;

use App\Http\Controllers\CrudController;
use Illuminate\Http\Request;
use Admin\Models\VendorCategory;
class VendorCategoryController extends CrudController
{
    public function __construct(Request $request,VendorCategory $vendorcategory)
    {
        $validation_rule[0] =[
            'title' => ['required','unique:vendor_categories'],
        ];
        $validation_rule[1] =[
            'title' => ['required','unique:vendor_categories,title,'.$request->route('vendorcategory')],
        ];
        parent::__construct($request,'Admin::vendorcategory',$validation_rule,$vendorcategory);
    }
}
