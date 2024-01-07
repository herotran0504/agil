<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name_ar','name_en','slug'];
    public function merchant()
    {
        return $this->hasMany(Merchant::class);
    }
    //many to many
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
