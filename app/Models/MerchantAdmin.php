<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class MerchantAdmin extends Authenticatable
{
    use Notifiable, HasRoles;

    public $timestamps = false;

    protected $guard = 'merchant_admin';

    public $guard_name = 'merchant_admin';

    protected $table = 'merchant_admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

}
