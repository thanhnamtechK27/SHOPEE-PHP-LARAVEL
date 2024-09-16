<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rate';
    public $timestamps = false;
    protected $fillable = ['rate', 'id_blog', 'id_user']; 
}