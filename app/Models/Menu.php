<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nm_produk',
        'kategori',
        'stok',
        'harga',
        'img',
        'desc',
        'id_user',
    ];
}