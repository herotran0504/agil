<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUserData(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
                'data' => null
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'User data',
            'user' => $user->only(['id', 'f_name_ar', 'l_name_ar', 'f_name_en', 'l_name_en', 'm_name_ar', 'm_name_en', 'national_id', 'phone', 'g_name_ar', 'g_name_en',])
        ]);
    }
    public function getQr(Request $request){
        $user = $request->user();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
                'data' => null
            ]);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'User qr',
            'data' => $user->qr_code
        ]);
    }
    public function getInvoices(Request $request){
        $data = $request->validate([
            'start_date'=>'nullable|date',
            'end_date'=>'nullable|date',
        ]);
        $user = $request->user();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
                'data' => null
            ]);
        }
        $invoices = $user->invoices()->where(function($q) use($data){
            if($data['start_date']){
                $q->where('created_at','>=',$data['start_date']);
            }
            if($data['end_date']){
                $q->where('created_at','<=',$data['end_date']);
            }
        })->get();
        return response()->json([
            'status' => 'success',
            'message' => 'User invoices',
            'data' => $invoices
        ]);
        
    }
    public function getUserDept(Request $request){
        $request->validate([
            'invoice_id'=>'required|exists:invoices,id'
        ]);
        $invoice = Invoice::find($request->invoice_id);
        if(!$invoice){
            return response()->json([
                'status' => 'error',
                'message' => 'Invoice not found',
                'data' => null
            ]);
        }
        $user = $request->user();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
                'data' => null
            ]);
        }
        if($invoice->user_id != $user->id){
            return response()->json([
                'status' => 'error',
                'message' => 'Invoice not found',
                'data' => null
            ]);
        }
               
        return response()->json([
            'status' => 'success',
            'message' => 'User dept',
            'data' => $invoice->debtUser
        ]);
    }
    
}
