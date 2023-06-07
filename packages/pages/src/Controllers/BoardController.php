<?php

namespace Pages\Controllers;

use App\Models\User;
use Pages\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\CrudController;

class BoardController extends CrudController
{
    public function __construct(Request $request, Board $board, User $user)
    {
        $validation_rule[0] = [
            'user_id' => [
                'required',
                Rule::unique('boards')->where(function ($query) use ($request) {
                    $query->where('user_id', $request->user_id);
                })
            ],
            'joined_date' => ['required'],

        ];
        $validation_rule[1] = [
            'user_id' => [
                'required',
                Rule::unique('boards')->where(function ($query) use ($request) {
                    $query->where('user_id', $request->user_id);
                })->where("id","<>",$request->id)
            ],
            'joined_date' => ['required'],

        ];
        parent::__construct($request, 'Pages::board', $validation_rule, $board, $user);
    }
}
