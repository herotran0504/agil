<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebtUser extends Model
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
        'details',
        'user_id',
    ];
    protected $table = 'debt_users';
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
