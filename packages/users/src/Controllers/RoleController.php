<?php

namespace User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use User\Models\Role;
use User\Models\Permission;
use Gate;
use Symfony\Component\HttpFoundation\Response;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::all();
        $permissions = Permission::all()->pluck('title', 'id');
        return view('User::role.index',compact('roles' , 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::all()->pluck('title', 'id');
        return view('User::role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255','unique:roles'],
            'permissions' => ['required']
        ]);
        $role = Role::create($data);
        if ($role) {
            $role->permissions()->sync($request->input('permissions',[]));
        }
        return redirect()->route('roles.index')->with('msg','Data Saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::all()->pluck('title', 'id');
        $role = Role::with('permissions')->find($role->id);
        return view('User::role.edit',compact('permissions','role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255','unique:roles,title,'.$role->id],
            'permissions' => ['required']
        ]);
        $role->update($data);
        if ($role) {
            $role->permissions()->sync($request->input('permissions',[]));
        }
        return redirect()->route('roles.index')->with('msg','Data updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $role->permissions()->detach();

        $role->users()->detach();
        $role->delete();
        return redirect()->route('roles.index')->with('msg','Data Deleted!');
    }
}
