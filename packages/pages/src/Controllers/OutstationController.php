<?php

namespace Pages\Controllers;

use App\Http\Controllers\CrudController;
use App\Models\User;
use App\Rules\UniqueUserIdWithinTimeFrame;
use Illuminate\Http\Request;
use Pages\Models\Outstation;

class OutstationController extends CrudController
{
    public function __construct(Request $request, Outstation $outstation, User $user)
    {
        $validation_rule[0] = [
            'user_id' => ['required', new UniqueUserIdWithinTimeFrame($request->outtime, $request->estimated_return_time)],
            'travel_place' => ['required', 'string', 'max:255'],
            'outtime' => ['required'],
            'estimated_return_time' => ['required'],
            'actual_return_time' => ['nullable'],
            'remarks' => ['nullable', 'string', 'max:255']

        ];
        $validation_rule[1] = [
            'user_id' => ['required', new UniqueUserIdWithinTimeFrame($request->outtime, $request->estimated_return_time, $request->route("outstation"))],
            'travel_place' => ['required', 'string', 'max:255'],
            'outtime' => ['required'],
            'estimated_return_time' => ['required'],
            'actual_return_time' => ['nullable'],
            'remarks' => ['nullable', 'string', 'max:255']

        ];
        parent::__construct($request, 'Pages::outstation', $validation_rule, $outstation, $user);
    }
}
