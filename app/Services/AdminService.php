<?php

namespace App\Services;

use App\Repositories\AdminRepository;

class AdminService
{
   protected  $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function get()
    {
         return $this->adminRepository->get();
    }

    public function store($request)
    {
        return $this->adminRepository->create($request);
    }

    public function update($request, $admin)
    {
        return  $this->adminRepository->update($request, $admin);
    }

    public function delete($admin)
    {
        return  $this->adminRepository->delete($admin);
    }

    public function changeStatus($admin)
    {
        return  $this->adminRepository->changeStatus($admin);
    }
}
