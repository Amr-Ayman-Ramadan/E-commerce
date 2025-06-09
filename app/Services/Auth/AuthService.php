<?php
namespace App\Services\Auth;

use App\Http\Requests\Dashboard\ResetPasswordRequest;
use App\Notifications\SendOtpNotify;
use App\Repositories\Auth\AuthRepository;

class AuthService
{
    protected $authRepository;
    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }
    public function login($credentials,$guard,$remember)
    {
     return  $this->authRepository->login($credentials,$guard,$remember);

    }

    public function logout($guard)
    {
        return $this->authRepository->logout($guard);
    }

    public function resetPassword($email)
    {
        $admin = $this->authRepository->resetPassword($email);

        if(!$admin){
            return false;
        }
        $admin->notify(new SendOtpNotify());

        return $admin;
    }

    public function verifyOTP($email,$otp)
    {
        $otp = $this->authRepository->verifyOTP($email,$otp);

       return $otp->status;
    }

    public function changePassword($email,$password)
    {
         return $this->authRepository->changePassword($email,$password);
    }

}
