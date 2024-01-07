<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dvice;
use App\Models\Branch;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;

class AdminMerchantsDevicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function posIndex(Request $request)
    {
        $devices = Dvice::all();
        $branches = Branch::all();
        $branchName = null;
        if($request->branch){
            $devices = $devices->where('branch_id',$request->branch);
            $branchObj = Branch::find($request->branch);
            if($branchObj){
                $branchName = $branchObj->name_en;
            }
        }
        return view('SuperAdmin.merchants.branches.devices.index',compact('devices','branches','branchName'));
    }

    public function posAdd(Request $request)
    {
        Dvice::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'branch_id' => $request->branch_id,
            'type' => $request->type,
        ]);
        return redirect()->route('ad_pos_index');
    }

    public function posEdit($id)
    {
        $device = Dvice::find($id);
        $branches = Branch::all();
        return view('SuperAdmin.merchants.branches.devices.edit',compact('device','branches'));
    }

    public function posUpdate(Request $request, $id)
    {
        $devic = Dvice::find($id);
        $devic->username = $request->username;
        $devic->password = bcrypt($request->password);
        $devic->branch_id = $request->branch_id;
        $devic->type = $request->ر;
        $devic->save();
        return redirect()->back();
    }

    public function posDelete($id)
    {
        $devic = Dvice::find($id);
        $devic->delete();
        return redirect()->route('ad_pos_index');
    }

    public function posInvoices($id)
    {
        $devic = Dvice::find($id);
        $invoices = Invoice::where('dvice_id',$devic->id)->get();
        $users = User::all();
        \Log::info(print_r($invoices,true));
        return view('SuperAdmin.merchants.branches.devices.invoices_list',compact('devic','invoices','users'));
    }
    public function posInvoicesAdd(Request $request)
    {
        Invoice::create([
            'invoice_number' => $request->invoice_number,
            'invoice_type' => $request->invoice_type,
            'invoice_status' => $request->invoice_status,
            'invoice_date' => $request->invoice_date,
            'invoice_time' => $request->invoice_time,
            'total' => $request->total,
            'items' => json_encode(explode(",", $request->items)),
            'dvice_id' => $request->dvice_id,
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('ad_pos_invoices',['id'=>$request->dvice_id]);
    }
}
