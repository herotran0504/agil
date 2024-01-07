<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Dvice extends Authenticatable
{
    use HasFactory , HasApiTokens;
    protected $fillable = [
        'username',
        'password',
        'is_active',
        'remmber_token',
        'branch_id',
    ];
    protected $table = 'dvices';
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
