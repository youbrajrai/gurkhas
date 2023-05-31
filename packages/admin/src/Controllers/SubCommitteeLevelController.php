<?php

namespace Admin\Controllers;

use Illuminate\Http\Request;
use Admin\Models\CommitteeLevel;
use Illuminate\Validation\Rule;
use Admin\Models\SubCommitteeLevel;
use App\Http\Controllers\CrudController;

class SubCommitteeLevelController extends CrudController
{
    public function __construct(Request $request, SubCommitteeLevel $subcommitteelevel, CommitteeLevel $committeelevel)
    {
        $validation_rule[0] = [
            'title' => [
                'required', Rule::unique('sub_committee_levels')->where(function ($query) use ($request) {
                    $query->where('committee_level_id', $request->committee_level_id);
                })
            ],
            'committee_level_id' => ['required']
        ];
        $validation_rule[1] = [
            'title' => [
                'required', Rule::unique('sub_committee_levels')->where(function ($query) use ($request) {
                    $query->where('committee_level_id', $request->committee_level_id);
                })
            ],
            'committee_level_id' => ['required']
        ];
        parent::__construct($request, 'Admin::subcommitteelevel', $validation_rule, $subcommitteelevel, $committeelevel);
    }
}
