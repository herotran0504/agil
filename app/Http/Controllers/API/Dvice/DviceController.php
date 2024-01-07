<?php

namespace App\Http\Controllers\API\Dvice;

use App\Http\Controllers\Controller;
use App\Http\Requests\PayRequest;
use App\Models\DebtMerchant;
use App\Models\DebtUser;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DviceController extends Controller
{
    //   'invoice_number',
    //     'invoice_type',
    //     'invoice_status',
    //     'invoice_date',
    //     'invoice_time',
    //     'total',
    //     'items',
    //     'dvice_id',
    //     'user_id',
   public function pay(PayRequest $request){
    // get user 
    $user=User::where('qr_code',$request->user_id)->firstOrFail();
    if (!$user){
        return response()->json([
            'status'=>'error',
            'message'=>'user not found'
        ],404);
    }
    
    //check in riskengine

    $invoices= $request->validated();
    $dvice= auth('dvice')->user();
        //convert items to json
    $items=json_encode($invoices['items']);
        $invoice = Invoice::create([
            'invoice_status'=>'pending',
            // 'invoice_number'=>$invoices['invoice_number'],
            // 'invoice_type'=>$invoices['invoice_type'],
            // 'invoice_date'=>$invoices['invoice_date'],
            // 'invoice_time'=>$invoices['invoice_time'],
            'total'=>$invoices['total'],
            'items'=>$items,
            'dvice_id'=>$dvice->id,
            'user_id'=> $user->id,
        ]);
        for ($i=0; $i <3 ; $i++) { 
            $user_dept= DebtUser::create([
                'user_id'=>$user->id,
                'invoice_id'=>$invoice->id,
                'payment_date'=>now()->addMonths($i),

                'payment_status'=>'pending',
                'amount'=>$invoices['total']/3,
                'dvice_id'=>$dvice->id,
            ]);
        }
        $merchant = $dvice->branch->merchant;
        $merchant= DebtMerchant::create([
            'merchant_id'=> $merchant->id,
            'invoice_id'=>$invoice->id,
            'payment_date'=>now()->addMonths(3),
            'payment_status'=>'pending',
            'amount'=>$invoices['total']-($invoices['total']*$merchant->percentage),
            'dvice_id'=>$dvice->id,
        ]);
        return response()->json([
            'status'=>'success',
            'message'=>'invoice created successfully',
            'data'=>$invoice
        ],201);
        
    
    
   }
}
