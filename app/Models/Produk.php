<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $primaryKey = 'produk_id';
    protected $fillable = [ 'produk_id',
       'nama_produk', 'harga_produk', 'berat_produk', 'gambar_produk'
    ];
}