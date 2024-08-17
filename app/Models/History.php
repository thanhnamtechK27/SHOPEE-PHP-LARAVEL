<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'history';

    protected $fillable = [
        'email', 'phone', 'name', 'id_user', 'price',
    ];

    // Khai báo quan hệ với bảng Users
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
