<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\OTP;
use Auth;
use Session;
class AdminGenelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function otpIndex()
    {
        /*لا يمكن الاعتماد عليها لاحقاً.. للتجربة فقط اي لا يمكن ارسال كود كلما حدث صفحة تسجيل الدخول*/
        $this->addOrUpdateOTP();
        return view('SuperAdmin.otp_view');
    }

    public function otpStore(Request $request)
    {
        $request->validate([
            'code'=>'required',
        ]);

        $find = OTP::where('national_id', auth()->user()->id)
                ->where('otp', $request->code)
                ->where('identifier', 'login')
                ->where('updated_at', '>=', now()->subMinutes(5))
                ->first();

        if (!is_null($find)) {
            Session::put('user_otp', auth()->user()->id);
            return redirect()->route('/');
        }

        return back()->with('error', 'You entered wrong code.');
    }

    public function otpResend()
    {
        $this->addOrUpdateOTP();
        /*try {

        } catch (Exception $e) {
            info("Error: ". $e->getMessage());
        }*/

        return back()->with('success', 'We sent you code on your mobile number.');
    }

    public function addOrUpdateOTP(){
        OTP::updateOrCreate(
            [ 'national_id' => auth()->user()->id ],
            [ 'phone' => auth()->user()->phone,'otp' => '123456','identifier' => 'login','hash_session' => Str::uuid(),'otp_expire_at' => now()->addMinutes(5) ],
        );
    }

    public function dashboardPage()
    {
        return view('SuperAdmin.dashboard');
    }

    public function changeLanguage(Request $request)
    {
        $request->session()->put('locale', $request->locale);
    }

    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();
        return redirect()->route('login');
    }

    public function reportsIndex()
    {
        return view('SuperAdmin.reports');
    }

    public function usersIndex()
    {
        $users = User::all();
        return view('SuperAdmin.users',compact('users'));
    }



}
