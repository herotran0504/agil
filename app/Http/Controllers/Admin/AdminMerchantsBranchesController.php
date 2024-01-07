<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Merchant;
use Illuminate\Http\Request;

class AdminMerchantsBranchesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function branchesIndex(Request $request)
    {
        $branches = Branch::all();
        $merchants = Merchant::all();
        $merchantName = null;
        if($request->merchant){
            $branches = $branches->where('merchant_id',$request->merchant);
            $merchantObj = Merchant::find($request->merchant);
            if($merchantObj){
                $merchantName = $merchantObj->business_name;
            }
        }
        return view('SuperAdmin.merchants.branches.index',compact('branches','merchants','merchantName'));
    }

    public function branchesAdd(Request $request)
    {
        Branch::create([
            'name_en' => $request->name_en,
            'name_ar' => $request->name_ar,
            'merchant_id' => $request->merchant_id,
            'is_main' => $request->is_main,
        ]);
        return redirect()->route('ad_branch_index');
    }

    public function branchesEdit($id)
    {
        $branch = Branch::find($id);
        $merchants = Merchant::all();
        return view('SuperAdmin.merchants.branches.edit',compact('branch','merchants'));
    }

    public function branchesUpdate(Request $request, $id)
    {
        $branch = Branch::find($id);
        $branch->name_en = $request->name_en;
        $branch->name_ar = $request->name_ar;
        $branch->merchant_id = $request->merchant_id;
        $branch->is_main = $request->is_main;
        $branch->save();
        return redirect()->back();
    }

    public function branchesDelete($id)
    {
        $branch = Branch::find($id);
        $branch->delete();
        return redirect()->route('ad_branch_index');
    }
}
