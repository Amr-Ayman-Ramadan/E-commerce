<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RoleRequest;
use App\Models\Role;
use App\Services\RoleService;

class RoleController extends Controller
{
    protected  $roleService;
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }
    public function index()
    {
        $roles =  $this->roleService->index();

        return view('dashboard.roles.index',compact('roles'));
    }

    public function create()
    {
        return view('dashboard.roles.create');
    }

    public function store(RoleRequest $request)
    {
        $role = $this->roleService->store($request);
        if($role){
            toast('Role Added Successfully','success');
            return  redirect()->route('dashboard.roles.index');

        }
        toast('Role Creation Failed','error');
        return back();
    }

    public function edit(Role $role)
    {
        return view('dashboard.roles.edit',compact('role'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role = $this->roleService->update($request, $role);
        if($role){
            toast('Role Updated Successfully','success');
            return to_route('dashboard.roles.index');
        }
        toast('Role Updation Failed','error');
        return back();
    }

    public function delete(Role $role)
    {
       $role = $this->roleService->delete($role);
       if($role){
            toast('Role Deleted Successfully','success');
            return to_route('dashboard.roles.index');
       }
       toast('Role Deletion Failed','error');
       return back();
    }
}
