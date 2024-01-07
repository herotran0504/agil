<?php

namespace App\Http\Controllers\MerchantAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MerchantAdminGenelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:merchant_admin');
    }

    public function dashboardPage()
    {
        return view('MerchantAdmin.dashboard');
    }

    public function logout(Request $request)
    {
        auth()->guard('merchant_admin')->logout();
        return redirect()->route('login');
    }
}
