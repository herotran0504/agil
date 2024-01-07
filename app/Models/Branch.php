<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = ['is_active', 'name_ar', 'name_en', 'is_main', 'merchant_id'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $casts = [
        'is_active' => 'boolean',
        'is_main' => 'boolean',
    ];
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
    
}
