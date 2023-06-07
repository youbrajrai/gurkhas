<?php

namespace Admin\Controllers;

use Admin\Models\FiscalYear;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\CrudController;

class FiscalYearController extends CrudController
{
    public function __construct(Request $request,FiscalYear $fiscalyear)
    {
        $validation_rule[0] =[
            'title' => ['required',Rule::unique('fiscal_years')->where(function($query) use($request){
                $query->where('start_date',$request->start_date)->where('end_date',$request->end_date);
            })],
            'start_date' => ['required'],
            'end_date' => ['required']
        ];
        $validation_rule[1] =[
            'title' => ['required',Rule::unique('fiscal_years')->where(function($query) use($request){
                $query->where('start_date',$request->start_date)->where('end_date',$request->end_date);
            })],
            'start_date' => ['required'],
            'end_date' => ['required']
        ];
        parent::__construct($request,'Admin::fiscalyear',$validation_rule,$fiscalyear);
    }
}
