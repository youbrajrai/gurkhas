<?php

namespace Admin\Controllers;

use Admin\Models\FiscalYear;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Admin\Models\StandardTerrifHead;
use App\Http\Controllers\CrudController;

class StandardTerrifHeadController extends CrudController
{
    public function __construct(Request $request,StandardTerrifHead $standardterrifhead,FiscalYear $fiscalyear)
    {
        $validation_rule[0] =[
            'title' => ['required'],
            'month' => ['required',
            Rule::unique('standard_terrif_heads')->where(function ($query) use ($request) {
                return $query->where('title', $request->title)
                   ->where('month', $request->month);
                })
            ],

            'fiscal_year_id' => ['required']
        ];
        $validation_rule[1] =[
            'title' => ['required'],
            'month' => ['required',
            Rule::unique('standard_terrif_heads')->where(function ($query) use ($request) {
                return $query->where('title', $request->title)
                   ->where('month', $request->month);
                })
            ],
            'fiscal_year_id' => ['required']
        ];
        parent::__construct($request,'Admin::standardterrifhead',$validation_rule,$standardterrifhead,$fiscalyear);
    }
}
