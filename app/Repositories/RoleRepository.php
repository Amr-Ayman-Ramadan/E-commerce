<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{
    public function index()
    {
        $roles = Role::select(['id','role','permissions','created_at'])->get();
        return $roles;
    }
    public function store($request)
    {
       $role = Role::create([
            "role"=>["en"=>$request->role['en'],"ar"=>$request->role['ar']],
            "permissions"=>$request->permissions,
        ]);
       return $role;
    }

    public function update($request,$role)
    {
       $role = $role->update([
            "role"=>["en"=>$request->role['en'],"ar"=>$request->role['ar']],
           "permissions" => $request->permissions
        ]);
       return $role;
    }

    public function delete(Role $role)
    {
        $role = $role->delete();
        return $role;
    }
}
