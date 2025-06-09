<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\WelcomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::group(["prefix" => "dashboard", "as" => "dashboard."], function(){

            Route::group(["middleware" => ["auth:admin"]], function(){
                Route::get('/',[WelcomeController::class,'index'])->name('index');
                Route::post('/logout',[AuthController::class,'logout'])->name('logout');
            });

            Route::group(['prefix' => 'auth', 'as' => 'auth.'], function() {
                Route::controller(AuthController::class)->group(function() {
                    // Authentication routes
                    Route::get('/login', 'loginPage')->name('loginPage');
                    Route::post('/login', 'login')->name('login');

                    // Password reset
                    Route::get('/reset-password', 'resetPasswordPage')->name('resetPasswordPage');
                    Route::post('/reset-password', 'resetPassword')->name('resetPassword');

                    // OTP verification
                    Route::get('/verify-otp/{email}', 'verifyOTPPage')->name('verifyOTPPage');
                    Route::post('/verify-otp', 'verifyOTP')->name('verifyOTP');

                    // Password change
                    Route::get('/change-password/{email}', 'changePasswordPage')->name('changePasswordPage');
                    Route::post('/change-password', 'changePassword')->name('changePassword');
                });
            });

        });
});
