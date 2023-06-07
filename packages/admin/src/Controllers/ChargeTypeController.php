<?php

namespace Admin\Controllers;

use App\Http\Controllers\CrudController;
use Illuminate\Http\Request;
use Admin\Models\ChargeType;
class ChargeTypeController extends CrudController
{
    public function __construct(Request $request,ChargeType $chargetype)
    {
        $validation_rule[0] =[
            'title' => ['required'],
        ];
        $validation_rule[1] =[
            'title' => ['required'],
        ];
        parent::__construct($request,'Admin::chargetype',$validation_rule,$chargetype);
    }
}
