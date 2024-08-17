<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cmt extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'cmt';

    protected $fillable = [
        'cmt', 'id_blog', 'id_user', 'avatar', 'name', 'level', 'thoi_gian'
    ];

    // Mỗi comment có thể có nhiều comment con
    public function replies()
    {
        return $this->hasMany(Cmt::class, 'level');
    }

    // Mỗi comment thuộc về một người dùng
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
