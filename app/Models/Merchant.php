<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;
    protected $fillable = [
        'f_name_ar',
        'l_name_ar',
        'l_name_en',
        'f_name_en',
        'm_name_ar',
        'm_name_en',
        'phone',
        'is_active',
        'business_name',
        'commercial_registratio_n',
    ];
    protected $table = 'merchants';
    public function merchant_admins()
    {
        return $this->hasMany(MerchantAdmin::class);
    }
    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
    public function debt_merchants()
    {
        return $this->hasMany(DebtMerchant::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
       
}
