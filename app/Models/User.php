<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','password', 'phone', 'identifier',
        'f_name_ar', 'l_name_ar', 'f_name_en', 'l_name_en',
        'm_name_ar', 'm_name_en', 'national_id', 'is_active','qr_code',
        'g_name_ar', 'g_name_en',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
    public function debtUser()
    {
        return $this->hasMany(DebtUser::class);
    }
    public function userCategories()
    {
        return $this->hasMany(UserCategory::class);
    }
}
