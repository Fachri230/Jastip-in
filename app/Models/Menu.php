<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
     protected $table = 'produk';
    protected $fillable = [
        'id_produk',
        'img',
        'nm_produk',
        'harga',
        'desc',
        'kategori',
        'stok',
    ];
}
