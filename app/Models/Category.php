<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category'; // Tên của bảng trong cơ sở dữ liệu

    protected $fillable = [
        'category',
    ];

    // Không sử dụng timestamps
    public $timestamps = false;

    // Các trường cho phép gán
    protected $guarded = [];
}
