<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\MerchantAdmin;
use Illuminate\Http\Request;

class AdminMerchantsUsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function merchantsAdminsIndex()
    {
        $merchants_admins = MerchantAdmin::all();
        $merchants = Merchant::all();
        return view('SuperAdmin.merchants-admins.index',compact('merchants_admins','merchants'));
    }

    public function merchantsAdminsAdd(Request $request)
    {
        MerchantAdmin::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'merchant_id' => $request->merchant_id,
                'f_name_ar' => $request->f_name_ar,
                'l_name_ar' => $request->l_name_ar,
                'l_name_en' => $request->l_name_en,
                'f_name_en' => $request->f_name_en,
                'm_name_ar' => $request->m_name_ar,
                'm_name_en' => $request->m_name_en,
                'role' => $request->role,
                'password' => bcrypt($request->password),
            ]
        );
        return redirect()->route('ad_merchant_admins_index');
    }

    public function merchantsAdminsEdit($id)
    {
        $merchant_admin = MerchantAdmin::find($id);
        $merchants = Merchant::all();
        return view('SuperAdmin.merchants-admins.edit',compact('merchant_admin','merchants'));
    }

    public function merchantsAdminsUpdate(Request $request, $id)
    {
        $merchant_admin = MerchantAdmin::find($id);
        $merchant_admin->f_name_ar = $request->f_name_ar;
        $merchant_admin->l_name_ar = $request->l_name_ar;
        $merchant_admin->l_name_en = $request->l_name_en;
        $merchant_admin->f_name_en = $request->f_name_en;
        $merchant_admin->m_name_ar = $request->m_name_ar;
        $merchant_admin->m_name_en = $request->m_name_en;
        $merchant_admin->phone = $request->phone;
        $merchant_admin->name = $request->name;
        $merchant_admin->email = $request->email;
        $merchant_admin->role = $request->role;
        $merchant_admin->merchant_id = $request->merchant_id;
        $merchant_admin->password = bcrypt($request->password);
        $merchant_admin->save();
        return redirect()->back();
    }

    public function merchantsAdminsDelete($id)
    {
        $merchant_admin = MerchantAdmin::find($id);
        $merchant_admin->delete();
        return redirect()->route('ad_merchant_admins_index');
    }
}
