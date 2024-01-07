<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_ar',
        'question_en',
        'answer_ar',
        'answer_en',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];
    
}
