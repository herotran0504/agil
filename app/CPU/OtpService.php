<?php

namespace App\CPU;
use App\Models\OTP;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Str;

class OtpService
{
    public static function generateOtp($id_num=null, $phone, $identifier='register'){
        $otp = new OTP();
        $otp->national_id = $id_num??null;
        $otp->identifier = $identifier;
        $otp->otp = 123456; // You can replace this with your random OTP generation logic
        $otp->phone = $phone;
        $otp->otp_expire_at = now()->addMinutes(5);
        $otp->hash_session = Str::uuid();
        $otp->save();
        return $otp->hash_session;
    }
    protected function sendOtp($phone, $otp)
    {

    }
    public static function checkOtp($hash_session,$otp,$identifier='register'){
        $otp = OTP::where('hash_session', $hash_session)->where('identifier', $identifier)->first();
        if (!$otp) {
            return response()->json(['message' => 'OTP not found', 'status' => 'error'], 422);
        }
        if ($otp->otp != $otp) {
            return response()->json(['message' => 'OTP not correct', 'status' => 'error'], 422);
        }
        if ($otp->otp_expire_at < now()) {
            return response()->json(['message' => 'OTP expired', 'status' => 'error'], 422);
        }
        if ($otp->otp == $otp && $otp->otp_expire_at > now()) {

            $response=[
                'message' => 'OTP correct',
                'status' => 'success',
                'phone' => $otp->phone,
            ];
            $otp->delete();
            return response()->json($response, 200);
        }

    }
}
