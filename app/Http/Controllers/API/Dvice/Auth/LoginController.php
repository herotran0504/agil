<?php

namespace App\Http\Controllers\API\Dvice\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dvice;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function login(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        // $credentials = $request->only('username', 'password');
        $dvice=Dvice::where('username',$request->username)->first();
        if($dvice){
            if (Hash::check($request->password, $dvice->password)) {
                if ($dvice->is_active == 0) {
                    return response()->json([
                        'message' => 'Dvice is not active',
                    ], 401);
                }
                $token = $dvice->createToken('auth_token', ['dvice:pay'])->plainTextToken;
                return response()->json([
                    'message' => 'success',
                    'token' => $token,
                ], 200);
            }

        }
        return response()->json([
            'message' => 'Invalid login credentials',
        ], 401);
    }
}
