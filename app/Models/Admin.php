<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $fillable = ["name","email","password","status","role_id"];

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function hasPermission($config_permission)
    {
        $role = $this->role;

        if(!$role) {
            return false;
        }

        foreach ($role->permissions as $permission) {
            if($permission == $config_permission ?? false) {
                return true;
            }
        }

        return false;
    }
}
