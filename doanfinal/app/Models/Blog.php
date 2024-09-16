<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // use HasFactory;
    protected $table = 'blog';
    public $timestamps = false;
    protected $fillable = ['title', 'avatar', 'description', 'content'];

    // Đảm bảo rằng trường avatar được xử lý như một string
    protected $casts = [
        'avatar' => 'string',
    ];
}
