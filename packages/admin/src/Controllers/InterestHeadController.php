<?php

namespace Admin\Controllers;

use Admin\Models\FiscalYear;
use Illuminate\Http\Request;
use Admin\Models\InterestHead;
use Illuminate\Validation\Rule;
use App\Http\Controllers\CrudController;

class InterestHeadController extends CrudController
{
    public function __construct(Request $request,InterestHead $interesthead,FiscalYear $fiscalyear)
    {
        $validation_rule[0] =[
            'title' => ['required'],
            'month' => ['required',
            Rule::unique('interest_heads')->where(function ($query) use ($request) {
                return $query->where('title', $request->title)
                   ->where('month', $request->month);
                })
            ],
            'fiscal_year_id' => ['required']
        ];
        $validation_rule[1] =[
            'title' => ['required'],
            'month' => ['required',
            Rule::unique('interest_heads')->where(function ($query) use ($request) {
                return $query->where('title', $request->title)
                   ->where('month', $request->month);
                })
            ],
            'fiscal_year_id' => ['required']
        ];
        parent::__construct($request,'Admin::interesthead',$validation_rule,$interesthead,$fiscalyear);
    }
}
