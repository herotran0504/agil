<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','category_id','score','balance'];
    //many to many
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    //many to many
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
