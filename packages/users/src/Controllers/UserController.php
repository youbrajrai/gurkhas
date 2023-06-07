<?php

namespace User\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\CrudController;
use App\Models\User;
use User\Models\Role;
use User\Models\Employee;
use User\Models\Branch;
use User\Models\Department;
use User\Models\Position;

class UserController extends CrudController
{
    public function __construct(Request $request,User $user,Employee $employee,Role $role,Branch $branch,Department $department,Position $position)
    {
        $validation_rule[0] =[
            'employee_code' => ['required','unique:users'],
            'name' => ['required','string', 'max:255'],
            'address' => ['required','string', 'max:255'],
            'file' => ['required','mimes:jpeg,jpg,png'],
            'contact_no' => ['nullable'],
            'mobile_no' => ['required'],
            'joined_date' => ['required'],
            'branch_id' => ['nullable'],
            'position_id' => ['required'],
            'department_id' => ['required'],
            'role_id' => ['required'],
            'order' => ['required'],
            'status' => ['required'],
            'password' => ['required','confirmed', 'min:6'],
            'email' => ['required','email', 'max:255', Rule::unique(User::class)],

        ];
        $validation_rule[1] =[
            'employee_code' => ['required','unique:users,employee_code,'.$request->route('user')],
            'name' => ['required','string', 'max:255'],
            'address' => ['required','string', 'max:255'],
            'file' => ['mimes:jpeg,jpg,png'],
            'contact_no' => ['nullable'],
            'mobile_no' => ['required'],
            'joined_date' => ['required'],
            'branch_id' => ['nullable'],
            'position_id' => ['required'],
            'department_id' => ['required'],
            'role_id' => ['required'],
            'order' => ['required'],
            'status' => ['required'],
            'password' => ['nullable','confirmed', 'min:6'],
            'email' => ['required','email', 'max:255','unique:users,email,'.$request->route('user')],

        ];

        parent::__construct($request,'User::users',$validation_rule,$user,$employee,$role,$branch,$department,$position);

    }
}
