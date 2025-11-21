<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\User\Auth\ForgotPasswordController as UserForgotPasswordController;
use App\Http\Controllers\User\Auth\LoginController as UserLoginController;
use App\Http\Controllers\User\Auth\RegisterController as UserRegisterController;
use App\Http\Controllers\User\Auth\SocialAuthentication;
use App\Http\Controllers\User\AuthorizationController;



Route::name('user.')->group(function(){
    Route::get('login',[UserLoginController::class,"showLoginForm"])->name('login');
    Route::post('login',[UserLoginController::class,"login"])->name('login.submit');

    Route::get('register',[UserRegisterController::class,"showRegistrationForm"])->name('register')->middleware(['user.registration.permission']);
    Route::post('register',[UserRegisterController::class,"register"])->name('register.submit')->middleware(['user.registration.permission']);

    Route::controller(UserForgotPasswordController::class)->prefix("password")->name("password.")->group(function(){
        Route::get('forgot','showForgotForm')->name('forgot');
        Route::post('forgot/send/code','sendCode')->name('forgot.send.code');
        Route::get('forgot/code/verify/form/{token}','showVerifyForm')->name('forgot.code.verify.form');
        Route::post('forgot/verify/{token}','verifyCode')->name('forgot.verify.code');
        Route::get('forgot/resend/code/{token}','resendCode')->name('forgot.resend.code');
        Route::get('forgot/reset/form/{token}','showResetForm')->name('forgot.reset.form');
        Route::post('forgot/reset/{token}','resetPassword')->name('reset');
    });

    Route::controller(AuthorizationController::class)->prefix("authorize")->name('authorize.')->middleware("auth")->group(function(){
        Route::get('mail/{token}','showMailFrom')->name('mail')->middleware(['user.registration.permission']);
        Route::post('mail/verify/{token}','mailVerify')->name('mail.verify')->middleware(['user.registration.permission']);
        Route::get('mail/resend/{token}', 'mailResendToken')->name('mail.resend')->middleware(['user.registration.permission']);
    });
});
