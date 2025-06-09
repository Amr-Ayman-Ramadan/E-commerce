<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ChangePasswordRequest;
use App\Http\Requests\Dashboard\LoginRequest;
use App\Http\Requests\Dashboard\ResetPasswordRequest;
use App\Models\Admin;
use App\Notifications\SendOtpNotify;
use App\Services\Auth\AuthService;
use Ichtrojan\Otp\Otp;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class AuthController extends Controller implements HasMiddleware
{
    public $otp;
    public $authService;

    public function __construct(AuthService $authService)
    {
        $this->otp = new Otp();
        $this->authService = $authService;
    }
    public static function middleware()
    {
        return [
            new Middleware(middleware: 'guest:admin',except: ['logout']),
        ];
    }
    public function loginPage()
    {
        return view('dashboard.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);
        $remember = $request->has('remember') ? true : false;

        if ($this->authService->login($credentials,'admin' ,$remember)) {
            return redirect()->intended(route('dashboard.index'));
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function resetPasswordPage()
    {
        return view('dashboard.auth.reset-password');
    }
    public function resetPassword(ResetPasswordRequest $request)
    {
      $admin =  $this->authService->resetPassword($request->email);

            if ($admin) {
                return   redirect()->route("dashboard.auth.verifyOTPPage",["email"=>$admin->email]);
            }
                return back()->withErrors(["email","email not found"]);
    }

    public function verifyOTPPage($email)
    {
        return view('dashboard.auth.verify-otp',compact('email'));
    }
    public function verifyOTP(ResetPasswordRequest $request)
    {
        $otp = $this->authService->verifyOTP($request->email,$request->otp);

      if (!$otp) {
          return back()->withErrors(["otp"=>"OTP is not valid"]);
      }
      return  redirect()->route("dashboard.auth.changePasswordPage",['email'=>$request->get('email')]);
    }

    public function changePasswordPage($email)
    {
        return view('dashboard.auth.change-password',compact('email'));
    }

    public function changePassword(ChangePasswordRequest $request)
    {
       $admin =  $this->authService->changePassword($request->email,$request->get('password'));

        if (!$admin) {
            return back()->withErrors(["email" => "Email is not valid"]);
        }

        return redirect()->route("dashboard.auth.loginPage");
    }

    public function logout()
    {
        $this->authService->logout('admin');
        return redirect()->route('dashboard.auth.loginPage');
    }
}
