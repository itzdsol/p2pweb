<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ForgotPasswordController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);
Route::post('password/email', [ForgotPasswordController::class, 'forgot']);
Route::post('password/reset', [ForgotPasswordController::class, 'reset']);
Route::post('phone/verification', [ForgotPasswordController::class, 'phone_verification']);
Route::post('email/verification', [ForgotPasswordController::class, 'email_verification']);
Route::post('otp/check', [ForgotPasswordController::class, 'otp_check']);
Route::post('kyc/dealer', [ForgotPasswordController::class, 'kyc_dealer']);
Route::post('kyc/sender', [ForgotPasswordController::class, 'kyc_sender']);
Route::post('resend/otp', [ForgotPasswordController::class, 'resend_otp']);

Route::middleware('auth:api')->group(function () {
    Route::resource('posts', PostController::class);
});
