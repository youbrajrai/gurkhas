<?php

namespace Pages\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;
use Pages\Models\Vendor;
use Admin\Models\VendorCategory;
use Admin\Models\VendorType;
class VendorController extends CrudController
{
    public function __construct(Request $request,Vendor $charge,VendorCategory $vendorcategory,VendorType $vendortype)
    {
        $validation_rule[0] =[
            'name' => ['required'],
            'address' => ['required'],
            'vendor_category_id' => ['required'],
            'vendor_type_id' => ['required'],
            'contact_person' => ['required'],
            'contact_details' => ['required'],
            'contract_start_date' => ['required'],
            'contract_expiry_date' => ['required'],
            'file' => ['required','mimes:pdf']

        ];
        $validation_rule[1] =[
            'name' => ['required'],
            'address' => ['required'],
            'vendor_category_id' => ['required'],
            'vendor_type_id' => ['required'],
            'contact_person' => ['required'],
            'contact_details' => ['required'],
            'contract_start_date' => ['required'],
            'contract_expiry_date' => ['required'],
            'file' => ['mimes:pdf']

        ];
        parent::__construct($request,'Pages::vendor',$validation_rule,$charge,$vendorcategory,$vendortype);
    }
}
