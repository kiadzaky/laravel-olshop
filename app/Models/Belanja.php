<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belanja extends Model
{
    use HasFactory;
    protected $primaryKey = 'belanja_id';
    protected $fillable =[
        'belanja_id',
        'user_id',
        'produk_id',
        'total_harga',
        'status',
        'created_at'
    ];
}