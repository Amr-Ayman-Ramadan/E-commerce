<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Models\Admin;
use App\Models\Role;
use App\Services\AdminService;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        $admins = $this->adminService->get();

        return view('dashboard.admins.index', compact('admins'));
    }

    public function create()
    {
        $roles =  Role::select(["id", "role"])->get();
        return view('dashboard.admins.create', compact('roles'));
    }

    public function store(AdminRequest  $request)
    {
      $admin =  $this->adminService->store($request);
      if(!$admin){
          toast("Admin Created Failed","error");
          return back();
      }
      toast("Admin Created Successfully","success");

      return redirect()->route('dashboard.admins.index');
    }

    public function edit(Admin $admin)
    {
        $roles =  Role::select(["id", "role"])->get();
        return view('dashboard.admins.edit', compact('admin', 'roles'));
    }
    public function update(AdminRequest $request, Admin $admin)
    {
        $admin = $this->adminService->update($request, $admin);
        if(!$admin){
            toast("Admin Updated Failed","error");
            return back();
        }
        toast("Admin Updated Successfully","success");
        return redirect()->route('dashboard.admins.index');
    }

    public function delete(Admin $admin)
    {
        $admin = $this->adminService->delete($admin);
        if(!$admin){
            toast("Admin Deleted Failed","error");
            return back();
        }
        toast("Admin Deleted Successfully","success");
        return redirect()->route('dashboard.admins.index');
    }

    public function changeStatus(Admin $admin)
    {
        $admin = $this->adminService->changeStatus($admin);
        if(!$admin){
            toast("Admin Status Changed Failed","error");
            return back();
        }
        toast("Admin Status Changed Successfully","success");
        return redirect()->route('dashboard.admins.index');
    }
}
