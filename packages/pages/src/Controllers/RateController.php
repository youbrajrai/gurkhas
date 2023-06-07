<?php

namespace Pages\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;
use Pages\Models\Rate;
class RateController extends CrudController
{
    public function __construct(Request $request,Rate $rate)
    {
        $validation_rule[0] =[
            'base_rate' => ['required','min:0'],
            'yield_rate' => ['required','min:0'],
            'spread_rate' => ['required','min:0'],
            'cost_fund' => ['required','min:0'],
            'month' => ['required'],
            'year' => ['required','min:0']

        ];
        $validation_rule[1] =[
            'base_rate' => ['required','min:0'],
            'yield_rate' => ['required','min:0'],
            'spread_rate' => ['required','min:0'],
            'cost_fund' => ['required','min:0'],
            'month' => ['required'],
            'year' => ['required','min:0']

        ];
        parent::__construct($request,'Pages::rate',$validation_rule,$rate);
    }
}
