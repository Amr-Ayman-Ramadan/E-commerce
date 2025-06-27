<?php
namespace App\Repositories;

use App\Models\Admin;
use App\Models\Role;

class AdminRepository
{
    protected $admin;
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function get()
    {
       $admins = $this->admin::select(["id", "name", "email", "password","role_id","status","created_at"])->paginate(5);

       return $admins;
    }

    public function store($request)
    {
        $admin = Admin::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "role_id" => $request->role_id,
            "status" => $request->status,
        ]);

        return $admin;
    }

    public function update($request, $admin)
    {
        return $admin->update($request->all());
    }

    public function delete($admin)
    {
        return $admin->delete();
    }

    public function changeStatus($admin)
    {
        $newStatus = $admin->status === 'active' ? 'inactive' : 'active';
        $admin->update(['status' => $newStatus]);
        return $admin;
    }
}
