<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'tenhoa',
        'hinhanh',
        'mieuta',
        'soluong',
        'gia',
        'status',
    ];
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
