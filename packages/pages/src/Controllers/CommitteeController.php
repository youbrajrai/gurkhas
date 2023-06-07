<?php

namespace Pages\Controllers;

use App\Models\User;
use Pages\Models\Committee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Admin\Models\CommitteeLevel;
use Admin\Models\SubCommitteeLevel;
use App\Http\Controllers\CrudController;

class CommitteeController extends CrudController
{
    public function __construct(Request $request, Committee $committee, CommitteeLevel $committeelevel, SubCommitteeLevel $subcommitteelevel, User $user)
    {
        $validation_rule[0] = [
            'sub_committee_level_id' => ['required'],
            'user_id' => [
                'required',
            ],
            'position' => ['required'],
            'joined_date' => ['required'],

        ];
        $validation_rule[1] = [
            'sub_committee_level_id' => ['required'],
            'user_id' => [
                'required'
            ],
            'position' => ['required'],
            'joined_date' => ['required'],

        ];
        parent::__construct($request, 'Pages::committee', $validation_rule, $committee, $committeelevel, $subcommitteelevel, $user);
    }
    public function findSubCommitteeLevel(Request $request)
    {
        $data = SubCommitteeLevel::select('title', 'id')->where('committee_level_id', $request->id)->get();
        return response()->json($data);
    }
}
