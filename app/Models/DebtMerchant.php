<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebtMerchant extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'payment_method',
        'payment_status',
        'payment_date',
        'payment_time',
        'payment_number',
        'payment_note',
        'invoice_id',
        'merchant_id',
        'details',
        'refrence_id',
    ];
    protected $table = 'debt_merchants';
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
