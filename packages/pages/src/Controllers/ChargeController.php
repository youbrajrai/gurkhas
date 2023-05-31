<?php

namespace Pages\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;
use Pages\Models\Charge;
use Admin\Models\ChargeType;
class ChargeController extends CrudController
{
    public function __construct(Request $request,Charge $charge,ChargeType $chargetype)
    {
        $validation_rule[0] =[
            'chargeType_id' => ['required'],
            'title' => ['required'],
            'rate' => ['required'],

        ];
        $validation_rule[1] =[
            'chargeType_id' => ['required'],
            'title' => ['required'],
            'rate' => ['required'],

        ];
        parent::__construct($request,'Pages::charge',$validation_rule,$charge,$chargetype);
    }
}
