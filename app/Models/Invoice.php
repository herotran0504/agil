<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_number',
        'invoice_type',
        'invoice_status',
        'invoice_date',
        'invoice_time',
        'total',
        'items',
        'dvice_id',
        'user_id',
    ];
    protected $table = 'invoices';
    public function dvice()
    {
        return $this->belongsTo(Dvice::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function debtUser()
    {
        return $this->hasMany(DebtUser::class);
    }
    public function debtMerchant()
    {
        return $this->hasMany(DebtMerchant::class);
    }
}
