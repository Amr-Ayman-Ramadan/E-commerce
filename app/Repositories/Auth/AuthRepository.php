<?php

namespace App\Repositories\Auth;

use App\Http\Requests\Dashboard\ChangePasswordRequest;
use App\Models\Admin;
use Ichtrojan\Otp\Otp;

class AuthRepository
{
    protected $otp;
    public function __construct()
    {
        $this->otp =  new Otp();

    }

    public function login($credentials,$guard,$remember=false)
    {
        return auth()->guard($guard)->attempt($credentials,$remember);
    }

    public function logout($guard)
    {
      return  auth()->guard($guard)->logout();

    }

    public function resetPassword($email)
    {
        $admin = Admin::where("email",$email)->first();

        return $admin;
    }

    public function verifyOTP($email,$otp)
    {
        $otp =  $this->otp->validate($email,$otp);

        return $otp;
    }

    public function changePassword($email,$password)
    {
        $admin = self::resetPassword($email);

       $admin = $admin->update([
            'password' => bcrypt($password)
        ]);

        return $admin;
    }
}
