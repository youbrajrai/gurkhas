<?php

namespace Pages\Controllers;

use User\Models\Branch;
use Pages\Models\Insurance;
use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;

class InsuranceController extends CrudController
{
    public function __construct(Request $request,Insurance $insurance,Branch $branch)
    {
        $validation_rule[0] =[
            'name' => ['required'],
            'insurance_start_date' => ['required'],
            'insurance_expiry_date' => ['required'],
            'insurance_company' => ['required','string','max:255'],
            'insurance_amount' => ['required'],
            'branch_id' => ['required'],
            'file' => ['required','mimes:pdf,jpg,jpeg,png','max:2048']

        ];
        $validation_rule[1] =[
            'name' => ['required'],
            'insurance_start_date' => ['required'],
            'insurance_expiry_date' => ['required'],
            'insurance_company' => ['required','string','max:255'],
            'insurance_amount' => ['required'],
            'branch_id' => ['required'],
            'file' => ['mimes:pdf,jpg,jpeg,png','max:2048']

        ];
        parent::__construct($request,'Pages::insurance',$validation_rule,$insurance,$branch);
    }
}
