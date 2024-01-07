<?php

namespace App\Http\Controllers\API\User\Auth;

use App\CPU\OtpService;
use App\Http\Controllers\Controller;
use App\Models\OTP;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function stepOne(Request $request)
    {
        $request->validate([
            'id_num' => 'required|numeric|digits:10',
        ]);
        $user = User::where('national_id', $request->id_num)->first();
       if(!$user){
           return response()->json(['message' => 'User not found', 'status' => 'error'], 422);
       }
         if($user){
            $hash_session = OtpService::generateOtp($request->id_num, $user->phone, 'login');
              return response()->json(['message'=> 'otp sent', 'status'=> 'success','hash_session' => $hash_session]);
         }
         return response()->json(['message' => 'somthing error', 'status' => 'error'],403);
      
      
    }
    public function stepTwo(Request $request)
    {
        $request->validate([
            'hash_session' => 'required',
            'otp' => 'required|numeric|digits:6',
        ]);
        $otp = OTP::where('hash_session', $request->hash_session)->where('identifier', 'login')->first();
        
        if (!$otp) {
            return response()->json(['message' => 'OTP not found', 'status' => 'error'], 422);
        }
        if ($otp->otp != $request->otp) {
            return response()->json(['message' => 'OTP not correct', 'status' => 'error'], 422);
        }
        if ($otp->otp_expire_at < now()) {
            return response()->json(['message' => 'OTP expired', 'status' => 'error'], 422);
        }
        if ($otp->otp == $request->otp && $otp->otp_expire_at > now()) {
            //login using sanctum
            $user = User::where('national_id', $otp->national_id)->first();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['message' => 'OTP correct', 'status' => 'success', 'token' => $token]);
        }
        return response()->json(['message' => 'somthing error', 'status' => 'error'],403);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'logout success', 'status' => 'success']);
    }
}
