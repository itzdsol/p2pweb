<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function forgot() {
        $credentials = request()->validate(['email' => 'required|email']);

        Password::sendResetLink($credentials);

        return response()->json(["msg" => 'Reset password link sent on your email id.']);
    }

    public function phone_verification() {

        return response()->json(["msg" => 'phone verification successfully.']);
    }

    public function email_verification() {

        return response()->json(["msg" => 'email verification successfully.']);
    }

    public function otp_check() {

        return response()->json(["msg" => 'otp check successfully.']);
    }

    public function resend_otp() {

        return response()->json(["otp"=>5623,"msg" => 'otp send on email successfully.']);
    }

    public function kyc_sender() {

        return response()->json(["msg" => 'sender kyc uploads successfully.']);
    }

    public function kyc_dealer() {

        return response()->json(["msg" => 'dealer kyc uploads successfully.']);
    }

    public function reset(ResetPasswordRequest $request) {
        $reset_password_status = Password::reset($request->validated(), function ($user, $password) {
            $user->password = $password;
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return $this->respondBadRequest(ApiCode::INVALID_RESET_PASSWORD_TOKEN);
        }

        return $this->respondWithMessage("Password has been successfully changed");
    }
}
