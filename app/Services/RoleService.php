<?php

namespace App\Services;

use App\Http\Requests\Dashboard\RoleRequest;
use App\Repositories\RoleRepository;

class RoleService
{
     protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $roles = $this->roleRepository->index();
        return $roles;
    }
    public function store($request)
    {
        $role = $this->roleRepository->store($request);
        return $role;
    }

    public function update($request, $role)
    {
        $role = $this->roleRepository->update($request, $role);
        return $role;
    }

    public function delete($role)
    {
        $role = $this->roleRepository->delete($role);
        if(!$role || $role->admins->count() > 0) {
            return false;
        }
        return $role;

    }
}
