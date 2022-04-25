<?php

namespace App\Http\Controllers;

use App\Models\UsersSession;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'mobile_number' => 'required|min:10|max:10',
        ]);

        $otp = rand(100000, 999999);

        $user_session = new UsersSession();
        $user_session->mobile_number = $request->input('mobile_number');
        $user_session->otp = $otp;
        $user_session->save();

        return response([
            'success' => true,
        ]);
    }

    public function validateOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|min:6|max:6',
        ]);

        $otpData = UsersSession::where('otp', $request->input('otp'))->first();

        if (!is_null($otpData)) {

            $randomString = Str::random(30);

            UsersSession::where('otp', $request->input('otp'))
                ->update([
                    'session' => $randomString,
                ]);

            return response([
                'success' => true,
                'mobile_number' => $otpData->mobile_number,
                'session' => $randomString,
            ]);

        }

        return response([
            'success' => false,
            'error' => 'Please enter a valid otp'
        ]);

    }

}
