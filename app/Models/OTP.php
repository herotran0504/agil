<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    use HasFactory;
    protected $fillable = [
        'otp',
        'national_id',
        'phone',
        'identifier',
        'hash_session',
        'otp_expire_at',
    ];
    protected $casts = [
        'otp_expire_at' => 'datetime',
    ];
    public function scopeOtpNotExpired($query)
    {
        return $query->where('otp_expire_at', '>', now());
    }

}
