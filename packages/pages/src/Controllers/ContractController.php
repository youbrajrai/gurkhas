<?php

namespace Pages\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;
use Pages\Models\Contract;
class ContractController extends CrudController
{
    public function __construct(Request $request,Contract $contract)
    {
        $validation_rule[0] =[
            'name' => ['required'],
            'agreement_date' => ['required'],
            'expiry_date' => ['required'],
            'remarks' => ['string','max:255']

        ];
        $validation_rule[1] =[
            'name' => ['required'],
            'agreement_date' => ['required'],
            'expiry_date' => ['required'],
            'remarks' => ['string','max:255']

        ];
        parent::__construct($request,'Pages::contract',$validation_rule,$contract);
    }
}
