<?php

namespace Pages\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;
use Pages\Models\Policy;
use App\Models\User;
class PolicyController extends CrudController
{
    public function __construct(Request $request,Policy $policy)
    {
        $validation_rule[0] =[
            'title' => ['required','string','max:255'],
            'description' => ['required','string','max:255'],
            'file' => ['required','mimes:pdf','max:2048']

        ];
        $validation_rule[1] =[
            'title' => ['required','string','max:255'],
            'description' => ['required','string','max:255'],
            'file' => ['mimes:pdf','max:2048']

        ];
        parent::__construct($request,'Pages::policy',$validation_rule,$policy);
    }
}
