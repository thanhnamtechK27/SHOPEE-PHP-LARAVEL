<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts'; // Tên bảng trong cơ sở dữ liệu
    
    protected $fillable = [
        'product_id', // ID của sản phẩm
        'quantity',   // Số lượng sản phẩm trong giỏ hàng
        // Các trường khác nếu có
    ];
    
    // Định nghĩa quan hệ với model Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
