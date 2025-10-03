<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\CountryController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\WelcomeController;
use Illuminate\Support\Facades\Http;
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

                Route::group(["prefix" => "roles", 'as' => 'roles.'], function () {
                    Route::controller(RoleController::class)->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/create', 'create')->name('create');
                        Route::post('/store', 'store')->name('store');
                        Route::get('/{role}/edit', 'edit')->name('edit');
                        Route::put('/{role}/update', 'update')->name('update');
                        Route::delete('/{role}/delete', 'delete')->name('delete');
                    });
                });

                Route::group(["prefix" => "admins", 'as' => 'admins.'], function () {
                    Route::controller(AdminController::class)->group(function () {
                       Route::get('/', 'index')->name('index');
                       Route::get('/create', 'create')->name('create');
                       Route::post('/store', 'store')->name('store');
                       Route::get('/{admin}/edit', 'edit')->name('edit');
                       Route::put('/{admin}/update', 'update')->name('update');
                       Route::delete('/{admin}/delete', 'delete')->name('delete');
                       Route::get('/{admin}/change-status', 'changeStatus')->name('changeStatus');
                    });
                });

                Route::group(["prefix" => "countries", 'as' => 'countries.'], function () {
                    Route::controller(CountryController::class)->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/changeStatus/{country}', 'changeCountryStatus')->name('changeStatus');
                    });
                });
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


 // EndPoint : https://apitest.myfatoorah.com/v2/SendPayment
// method : post
// header : Authorization => Bearer rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL

//    $postFields = [
//        //Fill required data
//        'InvoiceValue'       => $invoiceValue,
//        'CustomerName'       => 'fname lname',
//        'NotificationOption' => 'LNK', //'SMS', 'EML', or 'ALL'
//        //Fill optional data
//        //'DisplayCurrencyIso' => $displayCurrencyIso,
//        //'MobileCountryCode'  => $phone[0],
//        //'CustomerMobile'     => $phone[1],
//        //'CustomerEmail'      => 'email@example.com',
//        //'CallBackUrl'        => 'https://example.com/callback.php',
//        //'ErrorUrl'           => 'https://example.com/callback.php', //or 'https://example.com/error.php'
//        //'Language'           => 'en', //or 'ar'
//        //'CustomerReference'  => 'orderId',
//        //'CustomerCivilId'    => 'CivilId',
//        //'UserDefinedField'   => 'This could be string, number, or array',
//        //'ExpiryDate'         => '', //The Invoice expires after 3 days by default. Use 'Y-m-d\TH:i:s' format in the 'Asia/Kuwait' time zone.
//        //'CustomerAddress'    => $customerAddress,
//        //'InvoiceItems'       => $invoiceItems,
//        //'Suppliers'          => $suppliers,
//    ];




    Route::get("/test", function(){

        $response = Http::withHeaders(['Authorization'=>'Bearer rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL'])
                  ->timeout(30)
                  ->withoutVerifying()
                  ->send("post","https://apitest.myfatoorah.com/v2/SendPayment",[
                      'json'=>[
                            'InvoiceValue'       => 1000,
                            'CustomerName'       => 'Amr',
                            'NotificationOption' => 'LNK', //'SMS', 'EML', or 'ALL'
                            'DisplayCurrencyIso' => "EGP",
                            'MobileCountryCode'  => "+20",
                            'CustomerMobile'     => "01126258745",
                            'CustomerEmail'      => 'email@example.com',
                            'CallBackUrl'        => 'http://127.0.0.1:8001/test/callback',
                            'ErrorUrl'           => 'http://127.0.0.1:8001/test/error',
                            'Language'           => 'en',
                      ]
                  ]);

            return redirect($response['Data']['InvoiceURL']);
    });

    Route::get("/test/callback", function(){
        return request();
    });

    Route::get("/test/error", function(){
        return request();
    });



















