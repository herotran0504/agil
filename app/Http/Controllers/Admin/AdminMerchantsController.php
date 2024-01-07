<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Illuminate\Http\Request;

class AdminMerchantsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function merchantsIndex()
    {
        $merchants = Merchant::all();
        return view('SuperAdmin.merchants.index')->with(['merchants' => $merchants]);
    }

    public function merchantsAdd(Request $request)
    {
        Merchant::create($request->all());
        return redirect()->route('ad_merchant_index');
    }

    public function merchantsEdit($id)
    {
        $merchant = Merchant::find($id);
        return view('SuperAdmin.merchants.edit')->with([
            'merchant' => $merchant,
        ]);
    }

    public function merchantsUpdate(Request $request, $id)
    {
        $merchant = Merchant::find($id);
        $merchant->f_name_ar = $request->f_name_ar;
        $merchant->l_name_ar = $request->l_name_ar;
        $merchant->l_name_en = $request->l_name_en;
        $merchant->f_name_en = $request->f_name_en;
        $merchant->m_name_ar = $request->m_name_ar;
        $merchant->m_name_en = $request->m_name_en;
        $merchant->phone = $request->phone;
        $merchant->business_name = $request->business_name;
        $merchant->commercial_registratio_n = $request->commercial_registratio_n;
        $merchant->save();
        return redirect()->back();
    }

    public function merchantsDelete($id)
    {
        $merchant = Merchant::find($id);
        $merchant->delete();
        return redirect()->route('ad_merchant_index');
    }
}
