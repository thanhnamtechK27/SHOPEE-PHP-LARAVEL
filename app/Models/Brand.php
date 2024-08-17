<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'brand'; // Tên của bảng trong cơ sở dữ liệu

    protected $fillable = [
        'brand',
    ];

    // Không sử dụng timestamps
    public $timestamps = false;

    // Các trường cho phép gán
    protected $guarded = [];
}
