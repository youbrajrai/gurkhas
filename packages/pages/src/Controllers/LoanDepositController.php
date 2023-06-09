<?php

namespace Pages\Controllers;

use User\Models\Branch;
use Illuminate\Http\Request;
use Pages\Models\LoanDeposit;
use App\Http\Controllers\CrudController;

class LoanDepositController extends CrudController
{
    public function __construct(Request $request,LoanDeposit $loandeposit, Branch $branch)
    {
        $validation_rule[0] =[
            'branch_id' => ['required','exists:branches,id'],
            'loan_issued' => ['required','min:0'],
            'deposit' => ['required','min:0'],
            'created_date' => ['required']

        ];
        $validation_rule[1] =[
            'branch_id' => ['required','exists:branches,id'],
            'loan_issued' => ['required','min:0'],
            'deposit' => ['required','min:0'],
            'created_date' => ['required']

        ];
        parent::__construct($request,'Pages::loandeposit',$validation_rule,$loandeposit,$branch);
    }
}
