<?php

namespace App\Http\Controllers\API\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\OTP;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use AuthenticatesUsers;
  
    public function stepOne(Request $request){
        $request->validate([
            'id_num' => 'required|numeric|digits:10',
            'phone'=> 'required|numeric|digits:9',
        ]);
        $user = User::where('national_id', $request->id_num)->orWhere('phone', $request->phone)->first();
        if($user){
            return response()->json(['message' => 'User already exists', 'status' => 'error'], 422);
            }
        if(!$user){ 
            //here we shoud make sure that the user is the owner of the phone number by Taheqq
           $otp= OTP::create([
                'national_id' => $request->id_num,
                // 'otp' => rand(100000, 999999),
                'otp' => 123456,
                'phone' => $request->phone,
                'otp_expire_at' => now()->addMinutes(5),
                'hash_session' =>Str::uuid(),
            ]);
            return response()->json(['message'=> 'otp sent', 'status'=> 'success','hash_session' => $otp->hash_session]);
        }
        return response()->json(['message' => 'User created successfully', 'status' => 'success']);
    }
    public function stepTwo(Request $request)
    {
        $request->validate([
            'hash_session' => 'required',
            'otp' => 'required|numeric|digits:6',
        ]);
        $otp = OTP::where('hash_session', $request->hash_session)->first();
        if(!$otp){
            return response()->json(['message' => 'OTP not found', 'status' => 'error'], 422);
        }
        if($otp->otp != $request->otp){
            return response()->json(['message' => 'OTP not correct', 'status' => 'error'], 422);
        }
        if($otp->otp_expire_at < now()){
            return response()->json(['message' => 'OTP expired', 'status' => 'error'], 422);
        }
        if($otp->otp == $request->otp && $otp->otp_expire_at > now()){
            //here we should get user data from the the api 
            $user = User::create([
                'national_id' => $otp->national_id,
                'password' => bcrypt($request->otp),
                'f_name_ar' => 'مستخدم',
                'l_name_ar' => 'جديد',
                'f_name_en' => 'New',
                'l_name_en' => 'User',
                'm_name_ar' => 'مستخدم',
                'm_name_en' => 'User',
                'g_name_ar' => 'مستخدم',
                'g_name_en' => 'User',
                'name' => 'New User',
                'phone' => $otp->phone,
                'is_active' => 1,

            ]);
            // here we run risk engine
            $wallet= $user->wallet()->create([
                'balance' => 5000,
                'user_id' => $user->id,
                'wallet_address' => uniqid().'|'.$user->national_id,
            ]);

            $user->update([
                'risk_engine_score' => 85, //from risk engine
            ]);
            $token = $user->createToken('auth_token')->plainTextToken;


            $otp->delete();
            return response()->json(['message' => 'User created successfully', 'status' => 'success', 'token' => $token]);
        }

    }
 
}
